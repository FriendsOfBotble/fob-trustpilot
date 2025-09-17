<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'การตั้งค่า Trustpilot',
        'description' => 'กำหนดค่าการผสานรวมวิดเจ็ต Trustpilot สำหรับเว็บไซต์ของคุณ',
        'alert' => 'ในการใช้วิดเจ็ต Trustpilot คุณต้องมีบัญชีธุรกิจ Trustpilot เยี่ยมชม https://business.trustpilot.com เพื่อลงทะเบียนและรับ Business Unit ID ของคุณ',
        'enable' => 'เปิดใช้งานการผสานรวม Trustpilot',
        'configure_button' => 'กำหนดค่าการตั้งค่า Trustpilot',

        'business_unit_id' => 'ID หน่วยธุรกิจ',
        'business_unit_id_helper' => 'ID หน่วยธุรกิจ Trustpilot ที่ไม่ซ้ำกันของคุณ (สตริงฐาน 16 จำนวน 24 ตัวอักษร) ค้นหาในบัญชี Trustpilot Business ของคุณภายใต้การตั้งค่า → API → Business Unit ID หรือใช้ API endpoint: GET https://api.trustpilot.com/v1/business-units/find?name=yourdomain.com',

        'verification_id' => 'ID การยืนยันโดเมน',
        'verification_id_helper' => 'ทางเลือก: รหัสการยืนยันโดเมน Trustpilot เพิ่มสิ่งนี้เพื่อยืนยันความเป็นเจ้าของโดเมน สามารถลบได้หลังจากการยืนยันเสร็จสิ้น',

        'locale' => 'ภาษา/ท้องถิ่น',
        'theme' => 'ธีม',

        'display_position' => 'ตำแหน่งการแสดงผล',
        'display_position_helper' => 'เลือกตำแหน่งที่วิดเจ็ตแสดงอัตโนมัติ เลือก "เฉพาะวิดเจ็ต/ช็อตโค้ด" เพื่อแสดงผ่านวิดเจ็ตหรือช็อตโค้ดเท่านั้น',

        'widget_template' => 'เทมเพลตวิดเจ็ต',
        'widget_template_helper' => 'เลือกเทมเพลตเฉพาะสำหรับวิดเจ็ตของคุณ หรือเว้นว่างเพื่อใช้เทมเพลตเริ่มต้น',
        'use_default_template' => '-- ใช้เทมเพลตเริ่มต้น --',

        'stars_color' => 'สีดาว',
        'stars_color_helper' => 'ทางเลือก: สีที่กำหนดเองสำหรับดาว (เช่น #FFD700)',

        'text_color' => 'สีข้อความ',

        'font_family' => 'แบบอักษร',

        'custom_styles' => 'สไตล์ที่กำหนดเอง (JSON)',
        'custom_styles_helper' => 'ทางเลือก: เพิ่มสไตล์ที่กำหนดเองในรูปแบบ JSON',
    ],

    'widget_types' => [
        'micro_review_count' => 'จำนวนรีวิวขนาดเล็ก (ฟรี)',
        'review_collector' => 'ตัวรวบรวมรีวิว (ฟรี)',
        'mini' => 'มินิ TrustBox',
        'micro_star_rating' => 'การให้คะแนนดาวขนาดเล็ก',
        'carousel' => 'ภาพหมุนรีวิว',
        'mini_carousel' => 'ภาพหมุนขนาดเล็ก',
    ],

    'templates' => [
        'micro_review_count' => 'จำนวนรีวิวขนาดเล็กมาตรฐาน',
        'micro_review_count_dark' => 'จำนวนรีวิวขนาดเล็กแบบมืด',
        'review_collector' => 'ตัวรวบรวมรีวิวมาตรฐาน',
        'mini' => 'มินิ TrustBox มาตรฐาน',
        'mini_dark' => 'มินิ TrustBox แบบมืด',
        'micro_star_rating' => 'การให้คะแนนดาวขนาดเล็กมาตรฐาน',
        'carousel' => 'ภาพหมุนรีวิวมาตรฐาน',
        'carousel_full' => 'ภาพหมุนรีวิวเต็มความกว้าง',
        'mini_carousel' => 'ภาพหมุนขนาดเล็กมาตรฐาน',
    ],

    'themes' => [
        'light' => 'สว่าง',
        'dark' => 'มืด',
    ],

    'positions' => [
        'after_footer' => 'หลังส่วนท้าย (อัตโนมัติ)',
        'floating' => 'ลอยที่มุมล่างขวา (อัตโนมัติ)',
        'widget_only' => 'เฉพาะวิดเจ็ต/ช็อตโค้ด (แมนนวล)',
    ],

    'shortcode' => [
        'name' => 'วิดเจ็ต Trustpilot',
        'description' => 'แสดงวิดเจ็ต Trustpilot',
    ],

    'widget' => [
        'name' => 'รีวิว Trustpilot',
        'description' => 'แสดงวิดเจ็ตรีวิว Trustpilot บนเว็บไซต์ของคุณ',
        'custom_class' => 'คลาส CSS ที่กำหนดเอง',
        'custom_class_helper' => 'เพิ่มคลาส CSS ที่กำหนดเองไปยังคอนเทนเนอร์วิดเจ็ต',
    ],

    'validation' => [
        'business_unit_id_required' => 'ต้องระบุ Business Unit ID เมื่อเปิดใช้งาน Trustpilot',
        'business_unit_id_format' => 'Business Unit ID ต้องเป็นสตริงเลขฐาน 16 ที่ถูกต้อง 16-24 ตัวอักษร',
        'invalid_template' => 'กรุณาเลือกเทมเพลตที่ถูกต้องจากรายการ',
        'color_format' => 'กรุณาใส่สีเลขฐาน 16 ที่ถูกต้อง (เช่น #FF5733 หรือ #F53)',
        'font_family_format' => 'แบบอักษรมีอักขระที่ไม่ถูกต้อง ใช้เฉพาะตัวอักษร ตัวเลข ช่องว่าง เครื่องหมายจุลภาค ขีดกลาง และเครื่องหมายคำพูด',
        'json_format' => 'สไตล์ที่กำหนดเองต้องอยู่ในรูปแบบ JSON ที่ถูกต้อง',
    ],
];