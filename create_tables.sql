CREATE TABLE ft_alerte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    filtre JSON NOT NULL,
    frequence ENUM('weekly', 'monthly') DEFAULT 'weekly',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE `ft_alerte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

CREATE TABLE ft_old_offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    num_offer VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

ALTER TABLE ft_old_offers
ADD UNIQUE KEY unique_email_num_offer (email, num_offer);


/* le reste ci dessous pas encore traité, peut être yagni*/
/* ============================================================
   Table: offres_selectionnees
   Purpose: store all offers manually selected by the user
============================================================ */
CREATE TABLE IF NOT EXISTS offres_selectionnees (
    id INT AUTO_INCREMENT PRIMARY KEY,

    /* Unique France Travail offer ID */
    offre_id VARCHAR(255) NOT NULL,

    /* Offer metadata */
    intitule VARCHAR(255) NOT NULL,
    lieu VARCHAR(255) DEFAULT NULL,
    entreprise VARCHAR(255) DEFAULT NULL,
    contrat VARCHAR(50) DEFAULT NULL,
    date_publication VARCHAR(50) DEFAULT NULL,

    /* JSON filters used when saving the offer */
    filtres JSON NULL,

    /* Timestamp */
    date_enregistrement DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    /* Prevent duplicates */
    UNIQUE KEY unique_offre (offre_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/* ============================================================
   Table: filtres_utilises
   Purpose: optional table to store filter presets or history
============================================================ */
CREATE TABLE IF NOT EXISTS filtres_utilises (
    id INT AUTO_INCREMENT PRIMARY KEY,

    /* JSON object containing all filters */
    filtres JSON NOT NULL,

    /* Timestamp */
    date_enregistrement DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/* ============================================================
   Indexes for performance
============================================================ */
CREATE INDEX idx_offre_id ON offres_selectionnees (offre_id);
CREATE INDEX idx_date_enregistrement ON offres_selectionnees (date_enregistrement);

