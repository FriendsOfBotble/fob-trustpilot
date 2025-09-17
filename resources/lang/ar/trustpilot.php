<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'إعدادات Trustpilot',
        'description' => 'تكوين تكامل أداة Trustpilot لموقع الويب الخاص بك',
        'alert' => 'لاستخدام أدوات Trustpilot، تحتاج إلى حساب أعمال Trustpilot. قم بزيارة https://business.trustpilot.com للتسجيل والحصول على معرف وحدة الأعمال.',
        'enable' => 'تمكين تكامل Trustpilot',
        'configure_button' => 'تكوين إعدادات Trustpilot',

        'business_unit_id' => 'معرف وحدة الأعمال',
        'business_unit_id_helper' => 'معرف وحدة أعمال Trustpilot الفريد الخاص بك (سلسلة سداسية عشرية من 24 حرفًا). ابحث عنه في حساب Trustpilot Business ضمن الإعدادات → API → معرف وحدة الأعمال، أو استخدم نقطة نهاية API: GET https://api.trustpilot.com/v1/business-units/find?name=yourdomain.com',

        'verification_id' => 'معرف التحقق من النطاق',
        'verification_id_helper' => 'اختياري: رمز التحقق من نطاق Trustpilot. أضف هذا للتحقق من ملكية النطاق. يمكن إزالته بعد اكتمال التحقق.',

        'locale' => 'اللغة/اللغة المحلية',
        'theme' => 'السمة',

        'display_position' => 'موضع العرض',
        'display_position_helper' => 'اختر مكان عرض الأداة تلقائيًا. حدد "الأداة/الرمز المختصر فقط" للعرض فقط عبر الأدوات أو الرموز المختصرة.',

        'widget_template' => 'قالب الأداة',
        'widget_template_helper' => 'حدد قالبًا محددًا لأداتك، أو اتركه فارغًا لاستخدام القالب الافتراضي.',
        'use_default_template' => '-- استخدام القالب الافتراضي --',

        'stars_color' => 'لون النجوم',
        'stars_color_helper' => 'اختياري: لون مخصص للنجوم (مثال: #FFD700)',

        'text_color' => 'لون النص',

        'font_family' => 'نوع الخط',

        'custom_styles' => 'أنماط مخصصة (JSON)',
        'custom_styles_helper' => 'اختياري: إضافة أنماط مخصصة بتنسيق JSON',
    ],

    'widget_types' => [
        'micro_review_count' => 'عدد المراجعات الصغير (مجاني)',
        'review_collector' => 'جامع المراجعات (مجاني)',
        'mini' => 'صندوق الثقة الصغير',
        'micro_star_rating' => 'تقييم النجوم الصغير',
        'carousel' => 'عرض المراجعات المتحرك',
        'mini_carousel' => 'العرض المتحرك الصغير',
    ],

    'templates' => [
        'micro_review_count' => 'عدد المراجعات الصغير القياسي',
        'micro_review_count_dark' => 'عدد المراجعات الصغير الداكن',
        'review_collector' => 'جامع المراجعات القياسي',
        'mini' => 'صندوق الثقة الصغير القياسي',
        'mini_dark' => 'صندوق الثقة الصغير الداكن',
        'micro_star_rating' => 'تقييم النجوم الصغير القياسي',
        'carousel' => 'عرض المراجعات المتحرك القياسي',
        'carousel_full' => 'عرض المراجعات المتحرك بالعرض الكامل',
        'mini_carousel' => 'العرض المتحرك الصغير القياسي',
    ],

    'themes' => [
        'light' => 'فاتح',
        'dark' => 'داكن',
    ],

    'positions' => [
        'after_footer' => 'بعد التذييل (تلقائي)',
        'floating' => 'عائم أسفل اليمين (تلقائي)',
        'widget_only' => 'الأداة/الرمز المختصر فقط (يدوي)',
    ],

    'shortcode' => [
        'name' => 'أداة Trustpilot',
        'description' => 'عرض أداة Trustpilot',
    ],

    'widget' => [
        'name' => 'مراجعات Trustpilot',
        'description' => 'عرض أداة مراجعات Trustpilot على موقع الويب الخاص بك',
        'custom_class' => 'فئة CSS مخصصة',
        'custom_class_helper' => 'إضافة فئات CSS مخصصة إلى حاوية الأداة',
    ],

    'validation' => [
        'business_unit_id_required' => 'معرف وحدة الأعمال مطلوب عند تمكين Trustpilot.',
        'business_unit_id_format' => 'يجب أن يكون معرف وحدة الأعمال سلسلة سداسية عشرية صالحة من 16-24 حرفًا.',
        'invalid_template' => 'يرجى تحديد قالب صالح من القائمة.',
        'color_format' => 'يرجى إدخال لون سداسي عشري صالح (مثال: #FF5733 أو #F53).',
        'font_family_format' => 'يحتوي نوع الخط على أحرف غير صالحة. استخدم الأحرف والأرقام والمسافات والفواصل والشرطات وعلامات الاقتباس فقط.',
        'json_format' => 'يجب أن تكون الأنماط المخصصة بتنسيق JSON صالح.',
    ],
];