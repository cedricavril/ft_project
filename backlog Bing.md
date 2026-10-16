Explorateur d’Offres France Travail
(Version initiale — Dark Theme, UX améliorée, filtres avancés, gestion des offres)

🎨 1. Interface & Thème
    Thème sombre moderne (gris anthracite, accents bleu/vert).
    Typographie lisible (Inter / Roboto).
    Mise en page responsive.
    Cartes (cards) pour chaque offre.
    Boutons arrondis, hover states, transitions douces.

🔍 2. Formulaire de filtres (en haut de page)
Filtres API disponibles :
    Département
        Liste déroulante
        Format : 33 – Gironde, 75 – Paris, etc.
    Code ROME
        Liste déroulante
        Format : M1805 – Développement informatique
    Type de contrat
        Liste déroulante
        CDI, CDD, MIS, SAI, FRI, LIB, DIN
    Expérience
        Liste déroulante
        Débutant accepté, 1 an, 2 ans, 3 ans, 5 ans, 10 ans
    Mots‑clés
        Champ texte
Message UX :
    Note : le moteur de recherche France Travail n’est pas strict.
    Pour un filtrage précis, utilisez plusieurs mots‑clés.
Persistance des filtres
    Sauvegarde via sessions et/ou cookies.
    Restauration automatique des filtres au rechargement.

🌀 3. Splash Screen (chargement)
Overlay semi‑transparent (fond noir 60%).
Spinner CSS.
Texte : “Récupération des offres…”
Affiché au clic sur Rechercher, masqué à réception des résultats.

⚠️ 4. Flash Message (limite des 150 résultats)
Affiché si :
    total > 150, ou
    count(resultats) == 150
Message :
    ⚠️ France Travail limite l’affichage à environ 150 offres.
Pour obtenir une liste exhaustive, veuillez affiner vos filtres.

📄 5. Affichage des résultats (sous forme de formulaire)
Chaque offre contient :
    Checkbox (sélection)
    Titre (intitulé)
    Lieu de travail (si présent)
    Description
        Formatée avec nl2br()
        Collapsable / expandable
    Lien direct vers l’offre
    Informations clés :
        Contrat
        Entreprise
        Salaire
        Date de publication
Boutons globaux
    Toggle : afficher toutes les offres / seulement les cochées
    Toggle : collapse / expand toutes les offres
    Bouton : enregistrer les offres cochées dans une BDD
    Bouton : envoyer les offres cochées par mail pour le destinataire : cedric_avril_pro@hotmail.fr

💾 6. Système de cache (recommandation intégrée)
    Cache JSON ou SQLite.
    Durée configurable (1h ou 24h).
    Permet :
        stabilité des résultats
        réduction des appels API
        cohérence entre rechargements

🔢 7. Indicateur du nombre total d’offres (recommandation intégrée)
Affichage :
    42 offres trouvées (sur un maximum de 150 affichées)

🗄️ 8. Base de données (offres enregistrées)
Stockage des offres cochées :
    ID de l’offre
    Date d’enregistrement
    Filtres utilisés
    Statut éventuel (à contacter, déjà vu, etc.)