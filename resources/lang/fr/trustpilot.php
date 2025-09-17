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
    ],
];