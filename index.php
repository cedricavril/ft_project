<?php

session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// protect
$_SESSION['csrf'] = bin2hex(random_bytes(32));

$_SESSION['user_mail'] = 'cedric_avril_pro@hotmail.fr';

include_once("database.php");

$db = new DataBase();
$db->getConnection(); 

if (isset($_GET['delete'])) {
    if ($db->alert_delete($_GET['delete'])) {
        echo "<div id='flash-message'><pre class='info-message-fair'>Alerte supprimée.</pre></div>";
    }
    else echo "<div id='flash-message'><pre class='error-message'>Erreur de suppression</pre></div>";
}

/*todo : htaccess dès que le cron fonctionne bien.*/

/* ============================================================
   Filters loading (POST, session, cookie)
   (comments in English only)
============================================================ */
function load_filters() {
    $defaults = [
        'departement'   => '',
        'romeInput'     => '',
        'codeROME'      => '',
        'contrat'       => '',
        'typeContrat'   => '',
        'experience'    => '',
        'motsCles'      => '',
        'commune'       => '',
        'range'         => '',
    ];

    $filters = $defaults;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($defaults as $key => $value) {
            $filters[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
        }

        $_SESSION['filters'] = $filters;
        setcookie('filters', json_encode($filters), time() + 86400 * 30, '/');

        return $filters;
    }

    if (isset($_SESSION['filters'])) {
        return $_SESSION['filters'];
    }

    if (isset($_COOKIE['filters'])) {
        $cookie = json_decode($_COOKIE['filters'], true);
        if (is_array($cookie)) {
            return $cookie;
        }
    }

    return $defaults;
}

/* ============================================================
   Main
============================================================ */
$filters = load_filters();
$offresData = ['resultats' => [], 'total' => 0];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Generate cache key
    $cache_key_data = get_cache_key($filters);

    // Try loading cache
    $offresData = $ENABLE_CACHE_DATA ? load_cache($cache_key_data) : false;

    if (!$offresData) {
        $cached_url = build_api_url($filters);
        // Call France Travail API normally
        $offresData = fetch_offres($cached_url);
        if (!$offresData) {
            unset($_SESSION['token']);
            echo '<p class="error-message">' . 'Récupération des offres depuis l\'API FT vide, peut être à cause d\'un token périmé. Token supprimé, rechargez la page.' . '</p>';

            return;
        } else $_SESSION['offresData'] = $offresData;
        // Save result to cache only if API returned valid data
        if ($offresData && $ENABLE_CACHE_DATA) save_cache($cache_key_data, $offresData);
    }

    if (!empty($error_message)): ?>
        <p class="error-message"><?= $error_message ?></p>
    <?php endif;
}

$resultats = $offresData['resultats'] ?? [];
$total     = $offresData['total'] ?? count($resultats);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Explorateur d’offres France Travail</title>
    <link rel="stylesheet" type="text/css" href="ft_project/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="splash">
    <div class="splash-inner">
        <div class="spinner"></div>
        <div id="splash-message"></div>
    </div>
</div>

<div id="flash-message"></div>

<form id="email-form" class="modal" style="display: none;" onsubmit="

event.preventDefault();
hideModal();

email = this.getElementsByTagName('input')[0].value 

/*showSplash('Création de l\'alerte pour ' + email + ' ' + freq)
createAlert(email, freq)*/
getTemplate(email);
"


>

  <div class="modal-content">
    <h3>E-mail du destinataire</h3>

            <label>Email :</label>
            <input type="email" id="eMail" onkeyup="
                document.getElementById('sendEmail').disabled = (this.value == '');
                if (this.value) document.getElementById('sendEmail').classList.remove('disabled')
                else document.getElementById('sendEmail').classList.add('disabled')
                ">
            <div class="btn-row">
                <button type="submit" id="sendEmail" class="btn btn-primary disabled" disabled>Envoyer</button>
                <button type="button" id="sendCancel" class="btn btn-primary" onclick="hideModal()">Annuler</button>
            </div>
            <input type="hidden" id="csrf" value="<?= $_SESSION['csrf'] ?>">
  </div>
</form>

<form id="alert-form" class="modal" style="display: none;" onsubmit="

event.preventDefault();
hideModal(); 

email = this.getElementsByTagName('input')[0].value
freq = document.getElementById('alertFreq').value

showSplash('Création de l\'alerte pour ' + email + ' ' + freq)
createAlert(email, freq)
">

  <div class="modal-content">
    <h3>Créer une alerte email</h3>

            <label>Email :</label>
            <input type="email" id="alertEmail" onkeyup="
                document.getElementById('alertSave').disabled = (this.value == '');
                if (this.value) document.getElementById('alertSave').classList.remove('disabled')
                else document.getElementById('alertSave').classList.add('disabled')
                ">

            <label>Fréquence :</label>
            <select id="alertFreq">
              <option value="daily">Quotidienne</option>
              <option value="weekly">Hebdomadaire</option>
            </select>

            <div class="btn-row">
                <button type="submit" id="alertSave" class="btn btn-primary disabled" disabled>Enregistrer</button>
                <button type="button" id="alertCancel" class="btn btn-primary" onclick="hideModal()">Annuler</button>
            </div>
  </div>
</form>

<div class="container">
    <h1>Explorateur d’offres France Travail</h1>
    <div class="subtitle">Thème sombre, filtres avancés, sélection et gestion des offres.</div>

    <!-- Filters form -->
    <form method="post" id="filters-form" onsubmit="showSplash('Récupération des offres…')">
        <div class="card">
            <div class="filters-grid">

                <div>
                    <label for="departement">Département</label>
                    <select name="departement" id="departement">
                        <option value="">Tous</option>
<?php include "departements.php"; ?>
                    </select>
                </div>

                <div id="romeArea">
                    <label for="romeInput">Code ROME</label>
                    <input type="text" name="romeInput" id="romeInput" value="<?= $filters['romeInput']; ?>">
                    <div id="autocompleteList" class="autocomplete-list"></div>
<div id="tooltiptext"></div>

                    <input type="hidden" id="codeROME" name="codeROME" value="<?= $filters['codeROME']; ?>">
                </div>

                <div>
                    <label for="contrat">Contrat</label>
                    <select name="contrat" id="contrat">
                        <option value="">Tous</option>
                        <option value="CDI" <?= $filters['contrat']==='CDI'?'selected':''; ?>>CDI</option>
                        <option value="CDD" <?= $filters['contrat']==='CDD'?'selected':''; ?>>CDD</option>
                        <option value="MIS" <?= $filters['contrat']==='MIS'?'selected':''; ?>>Intérim (MIS)</option>
                        <option value="SAI" <?= $filters['contrat']==='SAI'?'selected':''; ?>>Saisonnier (SAI)</option>
                    </select>
                </div>

                <div>
                    <label for="experience">Expérience</label>
                    <select name="experience" id="experience">
                        <option value="">Toutes</option>
                        <option value="0" <?= $filters['experience']==='0'?'selected':''; ?>>Débutant accepté</option>
                        <option value="1" <?= $filters['experience']==='1'?'selected':''; ?>>1 an</option>
                        <option value="2" <?= $filters['experience']==='2'?'selected':''; ?>>2 ans</option>
                        <option value="3" <?= $filters['experience']==='3'?'selected':''; ?>>3 ans</option>
                        <option value="5" <?= $filters['experience']==='5'?'selected':''; ?>>5 ans</option>
                        <option value="10" <?= $filters['experience']==='10'?'selected':''; ?>>10 ans</option>
                    </select>
                </div>

                <div>
                    <label for="motsCles">Mots‑clés (à séparer par des virgules)</label>
                   <input type="text" name="motsCles" id="motsCles" value="<?= $filters['motsCles']; ?>">
                    <div class="note">
                        Le moteur France Travail est peu strict : combinez plusieurs mots pour un meilleur ciblage.
                    </div>
                </div>

            </div>

            <div class="btn-row">
                <button type="submit" class="btn btn-primary" name="search" value="search" >Rechercher</button>
            </div>
        </div>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'):
            $_SESSION['total'] = (int)$total; ?>
        <?php if ($total > 0): ?>
            <div class="count">
                <?= $_SESSION['total']; ?> offres trouvées (maximum 150 affichées).
            </div>
        <?php endif; ?>

        <?php if ($total >= 150): ?>
            <div class="flash">
                <span>⚠️</span>
                <div>
                    <strong>Attention :</strong> France Travail limite l’affichage à environ 150 offres.<br>
                    Pour obtenir une liste exhaustive, veuillez affiner vos filtres.
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($resultats)): ?>
            <form method="post" class="offers-form" id="offers-form">
                <div class="toolbar">
                    <button type="button" class="btn" id="toggle-checked">
                        Afficher uniquement les offres cochées
                    </button>
                    <button type="button" class="btn" id="toggle-collapse">
                        Rétracter toutes les offres
                    </button>
<!--                     <button type="button" class="btn btn-primary" id="mailit" onclick="showModal('alertEmail'); document.getElementById('alertEmail').focus();">Envoyer par mail</button> -->
                    <button type="button" class="btn btn-primary" id="mailit" onclick="showModal('eMail'); document.getElementById('alertEmail').focus();">Envoyer par mail</button>
                </div>

                <?php 

                foreach ($resultats as $offre): 
                    
                    $id    = $offre['id'] ?? uniqid('offre_', true);
                    $titre = highlight_keywords($offre['intitule'], $_POST['motsCles']) ?? '(Sans intitulé)';
                    $lieu  = highlight_keywords($offre['lieuTravail']['libelle'], $_POST['motsCles']) ?? '';
                    $desc  = highlight_keywords($offre['description'], $_POST['motsCles']) ?? '';
                    $contrat = $offre['typeContrat'] ?? '';
                    $entreprise = $offre['entreprise']['nom'] ?? '';
                    $datePub = $offre['dateCreation'] ?? '';
$dt = new DateTime($datePub);
$dt->setTimezone(new DateTimeZone('Europe/Paris'));
$datePub = $dt->format('d/m/Y à H:i');
                    $urlOffre = $offre['origineOffre']['urlOrigine'] ?? '';
                    ?>
                    <div class="card offer" data-offer-id="<?= $id; ?>">
                        <div class="offer-header">
                            <input type="checkbox" class="checkbox offer-check">
                            <div class="offer-title" onclick='this.previousElementSibling.checked = !this.previousElementSibling.checked'>
                                <?= $titre; ?>
                                <?php if ($lieu !== ''): ?>
                                    <span class="offer-location"> — <?= $lieu; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="offer-meta">
                            <?php if ($entreprise !== ''): ?>
                                <span>Entreprise : <?= $entreprise; ?></span> ·
                            <?php endif; ?>
                            <?php if ($contrat !== ''): ?>
                                <span>Contrat : <?= $contrat; ?></span> ·
                            <?php endif; ?>
                            <?php if ($datePub !== ''): ?>
                                <span>Publiée le : <?= $datePub; ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="offer-description">
                            <?= nl2br($desc); ?>
                        </div>
                        <div class="offer-actions">
                            <?php if ($urlOffre !== ''): ?>
                                <a class="offer-link" href="<?= htmlspecialchars($urlOffre); ?>" target="_blank" rel="noopener">
                                    Voir l’offre complète
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
           </form>
        <?php else: ?>
            <div class="card">
                Aucune offre trouvée avec ces filtres (ou API non branchée).
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

    <script src="ft_project/app.js"></script>
    <script src="app.js"></script>

</body>
</html>
