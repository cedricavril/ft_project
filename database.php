<?php

include_once "functions.php";

class Database
{
    private $pdo;

    public function __construct() {
        $this->pdo = null;
    }


    public function getConnection(): PDO
    {
        $config = parse_ini_file(__DIR__ . '/config.ini', true);
        $isLocal = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true);
        $environment = $isLocal ? 'local' : 'remote';
        $DBconfig = $config[$environment];

        if ($this->pdo === null) {
            try {
                    $this->pdo = new PDO(
                        "mysql:host={$DBconfig['db_host']};dbname={$DBconfig['db_name']};charset=utf8mb4",
                        $DBconfig['db_user'],
                        $DBconfig['db_password'],
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        ]
                    );                } catch (PDOException $e) {
                    die("Database connection failed (cavril_db1): " . $e->getMessage());
                }
            }

        return $this->pdo;
    }

    public function alerte_create($email = null, $filtre = null, $offersIndexToSend = null, $update = false, $frequence = 'weekly') {

        // validation
        $error_msg = false;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error_msg = '- adresse e-mail invalide ';
        if (!isset($offersIndexToSend)) $error_msg .= '- aucune offre sélectionnée ';
        if (!$filtre) $error_msg .= '- filtre absent ';
        elseif (!array_key_exists("departement", $filtre) ||
        !array_key_exists("codeROME", $filtre) ||
        !array_key_exists("contrat", $filtre) ||
        !array_key_exists("typeContrat", $filtre) ||
        !array_key_exists("experience", $filtre) ||
        !array_key_exists("motsCles", $filtre) ||
        !array_key_exists("commune", $filtre) ||
        !array_key_exists("range", $filtre)) $error_msg .= '- filtre invalide ';
        if ($frequence != 'weekly' && $frequence != 'daily') $error_msg .= '- fréquence invalide ';
        if (!is_bool($update)) $error_msg .= '- type invalide ';

        /*if ($error_msg) return "<pre class='error-message'>$error_msg</pre>";*/
        if ($error_msg) {
            http_response_code(500);
            return "<pre class='error-message'>$error_msg</pre>";
        }
        // \validation

        // otherwise, check email
        // check if email exists, will ask to confirm overwriting - Cf. app.js
        if($this->email_exists($email) && !$update) return "email_exists";

        // UPSERT ft_alerte
        $stmt = $this->pdo->prepare(
            "INSERT INTO ft_alerte (email, filtre, frequence, created_at)
            VALUES (:email, :filtre, :frequence, CURRENT_TIMESTAMP)
            ON DUPLICATE KEY UPDATE filtre = VALUES(filtre), frequence = VALUES(frequence), created_at = VALUES(created_at)");

        if (!$stmt->execute([
                    ':email'     => $email,
                    ':filtre'    => json_encode($filtre),
                    ':frequence' => $frequence
        ])) {
            http_response_code(500);
            return '<pre class=\'error-message\'>Création de l\'alerte échouée</pre>';
        }

        // if update is confirmed from front-end
        if($update) {

            $num = [];

            foreach ($_SESSION['offresData']['resultats'] as $value) {
                $num[] = $value['id'];
            }

            $values = [];
            $params = [];

            foreach ($num as $i => $numOffer) {
                $values[] = "(:email_$i, :num_offer_$i, CURRENT_TIMESTAMP)";

                $params[":email_$i"] = $email;
                $params[":num_offer_$i"] = $numOffer;
            }

            // UPSERT ft_old_offers
            $sql = "
                INSERT INTO ft_old_offers (email, num_offer, created_at)
                VALUES " . implode(', ', $values) . "
                ON DUPLICATE KEY UPDATE email = email
            ";

            $stmt = $this->pdo->prepare($sql);
            if (!$stmt->execute($params)) {
                http_response_code(500);
                return "<pre class='error-message'>Mise à jour échouée.</pre>";
            }
            return "<pre class='info-message-fair'>Alerte mise à jour.</pre>";
        }
        return "<pre class='info-message-fair'>Alerte créée.</pre>";
    }

    public function alerte_get_all() {
        return $this->pdo->query("SELECT * FROM ft_alerte ORDER BY created_at DESC")->fetchAll();
    }

    public function alerte_get_all_by_freq($freq) {
        return $this->pdo->query("SELECT * FROM ft_alerte WHERE frequence='$freq' ORDER BY created_at DESC")->fetchAll();
    }

    public function alerte_get_all_emails() {
        return $this->pdo->query("SELECT email FROM ft_alerte ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function alerte_get_emails_by_freq($freq) {
        return $this->pdo->query("SELECT email FROM ft_alerte WHERE frequence = '$freq' ORDER BY created_at DESC")->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function email_exists($email) {
        return (bool) $this->pdo->query("SELECT email FROM ft_alerte WHERE email='$email'")->fetchColumn();
    }

    public function alerte_update($email, $filtre, $freq) {
        $stmt = $this->pdo->prepare("UPDATE ft_alerte SET filtre=?, frequence=?, created_at=NOW() WHERE email=?");
        return $stmt->execute([json_encode($filtre), $freq, $email]);
    }

    public function alert_delete($email) {
        $stmt = $this->pdo->prepare("DELETE FROM ft_alerte WHERE email=?");
        $stmt2 = $this->pdo->prepare("DELETE FROM ft_old_offers WHERE email=?");

        return $stmt->execute([$email]) && $stmt2->execute([$email]);
    }

    public function alert_get_old_offers($freq) {
        return $this->pdo->query("SELECT ft_alerte.email, num_offer FROM ft_old_offers INNER JOIN ft_alerte 
ON ft_alerte.email = ft_old_offers.email WHERE ft_alerte.frequence='$freq' ORDER BY ft_old_offers.created_at DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function alert_get_all_old_offers() {
        return $this->pdo->query("SELECT * FROM ft_old_offers")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function alert_update_old_offers($email, $newOffers) {
        if (count($newOffers) === 0) return false;

        $values = [];
        $params = [];

        foreach ($newOffers as $i => $numOffer) {
            $values[] = "(:email_$i, :num_offer_$i, CURRENT_TIMESTAMP)";

            $params[":email_$i"] = $email;
            $params[":num_offer_$i"] = $numOffer;
        }
        // UPSERT ft_old_offers
        $sql = "
            INSERT INTO ft_old_offers (email, num_offer, created_at)
            VALUES " . implode(', ', $values) . "
            ON DUPLICATE KEY UPDATE email = email
        ";

        $stmt = $this->pdo->prepare($sql);
        if (!$stmt->execute($params)) {
            $subject = 'erreur alert_update_old_offers';
            mail_using_PHPMailer('cedric_avril_pro@hotmail.fr', $subject, 'Cf database.php');
        }
    }

    public function monthly_purge() {
        $this->pdo->query("DELETE FROM ft_old_offers WHERE created_at < NOW() - INTERVAL 30 DAY");
    }

    public function yearly_purge() {
        // todo : avertir l'user par son email une semaine avant, 
        //puis avertir que son alerte est supprimée juste après suppression ci dessous

// continuer ici Cf. GPT
$stmt = $this->pdo->query("
    SELECT
        email,
        CASE
            WHEN created_at < NOW() - INTERVAL 1 YEAR
                THEN 'already_expired'
            ELSE 'expires_next_week'
        END AS situation
    FROM ft_alerte
    WHERE created_at < DATE_SUB(
        DATE_ADD(NOW(), INTERVAL 1 WEEK),
        INTERVAL 1 YEAR
    )
");

$alerts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$emailsAlreadyExpired = [];
$emailsExpiringNextWeek = [];

foreach ($alerts as $alert) {
    if ($alert['situation'] === 'already_expired') {
        $emailsAlreadyExpired[] = $alert['email'];
    } else {
        $emailsExpiringNextWeek[] = $alert['email'];
    }
}

// todo : retourner les 2 tableaux

// Delete expired alerts
// $stmt = $this->pdo->query("
//     DELETE FROM ft_alerte
//     WHERE created_at < NOW() - INTERVAL 1 YEAR
// ");




        // $perempted_emails = $this->pdo->query("SELECT email FROM ft_alerte WHERE created_at < NOW() - INTERVAL 11 MONTH");
        

        // $this->pdo->query("DELETE FROM ft_alerte WHERE created_at < NOW() - INTERVAL 1 YEAR");
    }
}
