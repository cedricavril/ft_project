Ok bon travail, du moins j'espère. Je veux donc : 
un *flash message* dianst que quand on a plus de 150 offres, toutes les offres ne sont pas affichées, et qu'il faut filtrer les résultats pour avoir un contenu exhaustif.
un *thème sombre*, *user friendly*, et pas moche.
pour chaque offre, un lien direct vers celle-ci, après le champ *description*.
*description* : les sauts de lignes ne sont pas faits, il faut sans doute utiliser nl2br.

Pour les *filtres*, un formulaire en haut de la page. Les filtres API seront :
- département,
- Code ROME,
- Contrat,
- Expérience,
- mots clés.
un *splash screen* transparent sera affiché pendant que les résultats sont *en cours de récupération* après un clic sur le bouton *submit*.

On utilisera les sessions ou/et les cookies pour enregistrer les filtres.

Il faut que pour chaque filtre, on ait une liste déroulante listant les réponses possibles, et :
- chaque élément *département* aura pour titre le numéro de département suivi de son nom,
- chaque *code ROME* sera suivi de son intitulé,
- et pour le filtre *mots clés*, stipuler que le moteur de recherche de FT est peu user friendly, peu UX.

L'affichage des résutats sera sous forme de formulaire, dont le corps sera celui qu'on a actuellement. Ici, on a un numéro pour chaque élément de résultat. Il faut qu'il soit remplacé par *son intitulé*, suivi de son *lieuTravail* si existant.
Chaque offre pourra être cochée, et on aura un bouton envoyer, qui enverra toutes les infos de l'offre par mail à cedric_avril_pro@hotmail.fr. Les boutons supplémentaires : 
    on aura un bouton toggle qui affichera tout ou uniquement les offres cochées, 
    un bouton toggle qui collapsera ou rétractera les offres,
    un bouton qui enregistre les offres cochées dans une bdd.

Merci de me dire si tu vois quelque chose de pertinent qu'il faudrait ajouter à ce backlog.

--

👉 te générer la structure HTML/CSS du thème sombre  
👉 te générer le formulaire complet des filtres  
👉 te générer le squelette PHP  
👉 te générer le JS pour le splash screen + toggles  
👉 te générer la BDD (SQL)

--

