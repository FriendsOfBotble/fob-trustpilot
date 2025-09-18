<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'Paramètres Trustpilot',
        'description' => 'Configurer l\'intégration du widget Trustpilot pour votre site web',
        'alert' => 'Pour utiliser les widgets Trustpilot, vous devez avoir un compte professionnel Trustpilot. Visitez https://business.trustpilot.com pour vous inscrire et obtenir votre ID d\'unité commerciale.',
        'enable' => 'Activer l\'intégration Trustpilot',
        'configure_button' => 'Configurer les paramètres Trustpilot',

        'business_unit_id' => 'ID d\'unité commerciale',
        'business_unit_id_helper' => 'Votre ID d\'unité commerciale Trustpilot unique (chaîne hexadécimale de 24 caractères). Trouvez-le dans votre compte Trustpilot Business sous Paramètres → API → ID d\'unité commerciale, ou utilisez le point de terminaison API : GET https://api.trustpilot.com/v1/business-units/find?name=votredomaine.com',

        'verification_id' => 'ID de vérification du domaine',
        'verification_id_helper' => 'Optionnel : Code de vérification du domaine Trustpilot. Ajoutez ceci pour vérifier la propriété du domaine. Peut être supprimé après la vérification.',

        'locale' => 'Langue/Paramètres régionaux',
        'theme' => 'Thème',

        'display_position' => 'Position d\'affichage',
        'display_position_helper' => 'Choisissez où le widget s\'affiche automatiquement. Sélectionnez "Widget/Shortcode uniquement" pour afficher uniquement via des widgets ou des shortcodes.',

        'widget_template' => 'Modèle de widget',
        'widget_template_helper' => 'Sélectionnez un modèle spécifique pour votre widget, ou laissez vide pour utiliser le modèle par défaut.',
        'use_default_template' => '-- Utiliser le modèle par défaut --',

        'token' => 'Jeton du widget',
        'token_helper' => 'Optionnel : Jeton pour le widget de collecte d\'avis. Obtenez-le à partir de la configuration du widget dans votre compte Trustpilot Business.',

        'stars' => 'Étoiles à collecter',
        'stars_helper' => 'Liste séparée par des virgules des notes étoilées (ex : 1,2,3,4,5). Par défaut : toutes les notes.',

        'widget_height' => 'Hauteur du widget',
        'widget_height_helper' => 'Hauteur personnalisée pour le widget (ex : 450px, 100%, auto). Laissez vide pour utiliser la hauteur par défaut du modèle sélectionné.',

        'widget_max_width' => 'Largeur maximale du widget',
        'widget_max_width_helper' => 'Largeur maximale pour le conteneur du widget (ex : 1200px, 90%, none). Définir sur "none" pour aucune limite. Laissez vide pour la largeur complète.',

        'widget_alignment' => 'Alignement du widget',
        'widget_alignment_helper' => 'Comment aligner le widget dans son conteneur.',

        'widget_margin_x' => 'Marge horizontale (Gauche/Droite)',
        'widget_margin_x_helper' => 'Espacement horizontal sur les côtés gauche et droit (ex : 20px, 5%, auto, 0).',

        'widget_margin_y' => 'Marge verticale (Haut/Bas)',
        'widget_margin_y_helper' => 'Espacement vertical en haut et en bas (ex : 30px, 2rem, 0).',

        'widget_padding_x' => 'Rembourrage horizontal (Gauche/Droite)',
        'widget_padding_x_helper' => 'Espacement horizontal intérieur sur les côtés gauche et droit (ex : 15px, 1rem, 0).',

        'widget_padding_y' => 'Rembourrage vertical (Haut/Bas)',
        'widget_padding_y_helper' => 'Espacement vertical intérieur en haut et en bas (ex : 10px, 1rem, 0).',

        'stars_color' => 'Couleur des étoiles',
        'stars_color_helper' => 'Optionnel : Couleur personnalisée pour les étoiles (ex : #FFD700)',

        'text_color' => 'Couleur du texte',

        'font_family' => 'Police de caractères',

        'custom_styles' => 'Styles personnalisés (JSON)',
        'custom_styles_helper' => 'Optionnel : Ajouter des styles personnalisés au format JSON',
    ],

    'widget_types' => [
        'micro_review_count' => 'Compteur d\'avis micro (Gratuit)',
        'review_collector' => 'Collecteur d\'avis (Gratuit)',
        'mini' => 'Mini TrustBox',
        'micro_star_rating' => 'Évaluation par étoiles micro',
        'carousel' => 'Carrousel d\'avis',
        'mini_carousel' => 'Mini carrousel',
    ],

    'templates' => [
        'micro_review_count' => 'Compteur d\'avis micro standard',
        'micro_review_count_dark' => 'Compteur d\'avis micro sombre',
        'review_collector' => 'Collecteur d\'avis standard',
        'mini' => 'Mini TrustBox standard',
        'mini_dark' => 'Mini TrustBox sombre',
        'micro_star_rating' => 'Évaluation par étoiles micro standard',
        'carousel' => 'Carrousel d\'avis standard',
        'carousel_full' => 'Carrousel d\'avis pleine largeur',
        'mini_carousel' => 'Mini carrousel standard',
    ],

    'themes' => [
        'light' => 'Clair',
        'dark' => 'Sombre',
    ],

    'alignments' => [
        'start' => 'Gauche',
        'center' => 'Centre',
        'end' => 'Droite',
    ],

    'positions' => [
        'after_footer' => 'Après le pied de page (Automatique)',
        'floating' => 'Flottant en bas à droite (Automatique)',
        'widget_only' => 'Widget/Shortcode uniquement (Manuel)',
    ],

    'shortcode' => [
        'name' => 'Widget Trustpilot',
        'description' => 'Afficher le widget Trustpilot',
    ],

    'widget' => [
        'name' => 'Avis Trustpilot',
        'description' => 'Afficher le widget d\'avis Trustpilot sur votre site web',
        'custom_class' => 'Classe CSS personnalisée',
        'custom_class_helper' => 'Ajouter des classes CSS personnalisées au conteneur du widget',
    ],

    'validation' => [
        'business_unit_id_required' => 'L\'ID d\'unité commerciale est requis lorsque Trustpilot est activé.',
        'business_unit_id_format' => 'L\'ID d\'unité commerciale doit être une chaîne hexadécimale valide de 16 à 24 caractères.',
        'invalid_template' => 'Veuillez sélectionner un modèle valide dans la liste.',
        'color_format' => 'Veuillez entrer une couleur hexadécimale valide (ex : #FF5733 ou #F53).',
        'font_family_format' => 'La police contient des caractères non valides. Utilisez uniquement des lettres, chiffres, espaces, virgules, tirets et guillemets.',
        'json_format' => 'Les styles personnalisés doivent être au format JSON valide.',
        'token_format' => 'Le jeton doit être au format UUID valide (ex : f6ae086f-2599-41bd-976a-196733ead805).',
        'stars_format' => 'Les étoiles doivent être des nombres séparés par des virgules entre 1 et 5 (ex : 1,2,3,4,5).',
        'height_format' => 'La hauteur doit être une valeur CSS valide (ex : 450px, 100%, 2em, auto).',
        'max_width_format' => 'La largeur maximale doit être une valeur CSS valide (ex : 1200px, 90%, none).',
        'alignment_format' => 'Veuillez sélectionner une option d\'alignement valide.',
        'margin_format' => 'La marge doit être une valeur CSS valide (ex : 20px, 5%, 0, auto).',
        'padding_format' => 'Le rembourrage doit être une valeur CSS valide (ex : 15px, 1rem, 0).',
    ],
];