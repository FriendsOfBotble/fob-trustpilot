<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'Trustpilot सेटिंग्स',
        'description' => 'अपनी वेबसाइट के लिए Trustpilot विजेट एकीकरण कॉन्फ़िगर करें',
        'alert' => 'Trustpilot विजेट का उपयोग करने के लिए, आपके पास Trustpilot व्यापार खाता होना आवश्यक है। साइन अप करने और अपना Business Unit ID प्राप्त करने के लिए https://business.trustpilot.com पर जाएं।',
        'enable' => 'Trustpilot एकीकरण सक्षम करें',
        'configure_button' => 'Trustpilot सेटिंग्स कॉन्फ़िगर करें',

        'business_unit_id' => 'व्यापार इकाई आईडी',
        'business_unit_id_helper' => 'आपका अद्वितीय Trustpilot व्यापार इकाई आईडी (24-वर्ण हेक्स स्ट्रिंग)। अपने Trustpilot Business खाते में सेटिंग्स → API → Business Unit ID के तहत खोजें, या API एंडपॉइंट का उपयोग करें: GET https://api.trustpilot.com/v1/business-units/find?name=yourdomain.com',

        'verification_id' => 'डोमेन सत्यापन आईडी',
        'verification_id_helper' => 'वैकल्पिक: Trustpilot डोमेन सत्यापन कोड। डोमेन स्वामित्व सत्यापित करने के लिए इसे जोड़ें। सत्यापन पूर्ण होने के बाद हटाया जा सकता है।',

        'locale' => 'भाषा/स्थानीय',
        'theme' => 'थीम',

        'display_position' => 'प्रदर्शन स्थिति',
        'display_position_helper' => 'चुनें कि विजेट स्वचालित रूप से कहाँ प्रदर्शित हो। केवल विजेट या शॉर्टकोड के माध्यम से प्रदर्शित करने के लिए "केवल विजेट/शॉर्टकोड" चुनें।',

        'widget_template' => 'विजेट टेम्प्लेट',
        'widget_template_helper' => 'अपने विजेट के लिए विशिष्ट टेम्प्लेट चुनें, या डिफ़ॉल्ट टेम्प्लेट उपयोग के लिए खाली छोड़ें।',
        'use_default_template' => '-- डिफ़ॉल्ट टेम्प्लेट उपयोग करें --',

        'stars_color' => 'तारों का रंग',
        'stars_color_helper' => 'वैकल्पिक: तारों के लिए कस्टम रंग (उदा: #FFD700)',

        'text_color' => 'टेक्स्ट रंग',

        'font_family' => 'फ़ॉन्ट परिवार',

        'custom_styles' => 'कस्टम स्टाइल्स (JSON)',
        'custom_styles_helper' => 'वैकल्पिक: JSON प्रारूप में कस्टम स्टाइल्स जोड़ें',
    ],

    'widget_types' => [
        'micro_review_count' => 'माइक्रो समीक्षा गणना (निःशुल्क)',
        'review_collector' => 'समीक्षा संग्राहक (निःशुल्क)',
        'mini' => 'मिनी TrustBox',
        'micro_star_rating' => 'माइक्रो स्टार रेटिंग',
        'carousel' => 'समीक्षा कैरोसेल',
        'mini_carousel' => 'मिनी कैरोसेल',
    ],

    'templates' => [
        'micro_review_count' => 'मानक माइक्रो समीक्षा गणना',
        'micro_review_count_dark' => 'डार्क माइक्रो समीक्षा गणना',
        'review_collector' => 'मानक समीक्षा संग्राहक',
        'mini' => 'मानक मिनी TrustBox',
        'mini_dark' => 'डार्क मिनी TrustBox',
        'micro_star_rating' => 'मानक माइक्रो स्टार रेटिंग',
        'carousel' => 'मानक समीक्षा कैरोसेल',
        'carousel_full' => 'पूर्ण चौड़ाई समीक्षा कैरोसेल',
        'mini_carousel' => 'मानक मिनी कैरोसेल',
    ],

    'themes' => [
        'light' => 'लाइट',
        'dark' => 'डार्क',
    ],

    'positions' => [
        'after_footer' => 'फुटर के बाद (स्वचालित)',
        'floating' => 'नीचे दाएं कोने में तैरता (स्वचालित)',
        'widget_only' => 'केवल विजेट/शॉर्टकोड (मैनुअल)',
    ],

    'shortcode' => [
        'name' => 'Trustpilot विजेट',
        'description' => 'Trustpilot विजेट प्रदर्शित करें',
    ],

    'widget' => [
        'name' => 'Trustpilot समीक्षाएं',
        'description' => 'अपनी वेबसाइट पर Trustpilot समीक्षा विजेट प्रदर्शित करें',
        'custom_class' => 'कस्टम CSS क्लास',
        'custom_class_helper' => 'विजेट कंटेनर में कस्टम CSS क्लास जोड़ें',
    ],

    'validation' => [
        'business_unit_id_required' => 'Trustpilot सक्षम होने पर Business Unit ID आवश्यक है।',
        'business_unit_id_format' => 'Business Unit ID 16-24 वर्ण की वैध हेक्साडेसिमल स्ट्रिंग होनी चाहिए।',
        'invalid_template' => 'कृपया सूची से वैध टेम्प्लेट चुनें।',
        'color_format' => 'कृपया वैध हेक्स रंग दर्ज करें (उदा: #FF5733 या #F53)।',
        'font_family_format' => 'फ़ॉन्ट परिवार में अमान्य वर्ण हैं। केवल अक्षर, संख्या, स्थान, अल्पविराम, हाइफ़न और उद्धरण चिह्न का उपयोग करें।',
        'json_format' => 'कस्टम स्टाइल्स वैध JSON प्रारूप में होनी चाहिए।',
    ],
];