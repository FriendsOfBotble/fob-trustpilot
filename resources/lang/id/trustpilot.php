<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'Pengaturan Trustpilot',
        'description' => 'Konfigurasi integrasi widget Trustpilot untuk situs web Anda',
        'alert' => 'Untuk menggunakan widget Trustpilot, Anda perlu memiliki akun bisnis Trustpilot. Kunjungi https://business.trustpilot.com untuk mendaftar dan mendapatkan Business Unit ID Anda.',
        'enable' => 'Aktifkan Integrasi Trustpilot',
        'configure_button' => 'Konfigurasi Pengaturan Trustpilot',

        'business_unit_id' => 'ID Unit Bisnis',
        'business_unit_id_helper' => 'ID Unit Bisnis Trustpilot unik Anda (string hex 24 karakter). Temukan di akun Trustpilot Business Anda di bawah Pengaturan → API → Business Unit ID, atau gunakan endpoint API: GET https://api.trustpilot.com/v1/business-units/find?name=domainanda.com',

        'verification_id' => 'ID Verifikasi Domain',
        'verification_id_helper' => 'Opsional: Kode verifikasi domain Trustpilot. Tambahkan ini untuk memverifikasi kepemilikan domain. Dapat dihapus setelah verifikasi selesai.',

        'locale' => 'Bahasa/Lokal',
        'theme' => 'Tema',

        'display_position' => 'Posisi Tampilan',
        'display_position_helper' => 'Pilih di mana widget ditampilkan secara otomatis. Pilih "Hanya Widget/Shortcode" untuk menampilkan hanya melalui widget atau shortcode.',

        'widget_template' => 'Template Widget',
        'widget_template_helper' => 'Pilih template spesifik untuk widget Anda, atau biarkan kosong untuk menggunakan template default.',
        'use_default_template' => '-- Gunakan Template Default --',

        'stars_color' => 'Warna Bintang',
        'stars_color_helper' => 'Opsional: Warna kustom untuk bintang (contoh: #FFD700)',

        'text_color' => 'Warna Teks',

        'font_family' => 'Jenis Font',

        'custom_styles' => 'Gaya Kustom (JSON)',
        'custom_styles_helper' => 'Opsional: Tambahkan gaya kustom dalam format JSON',
    ],

    'widget_types' => [
        'micro_review_count' => 'Jumlah Ulasan Mikro (Gratis)',
        'review_collector' => 'Pengumpul Ulasan (Gratis)',
        'mini' => 'Mini TrustBox',
        'micro_star_rating' => 'Rating Bintang Mikro',
        'carousel' => 'Korsel Ulasan',
        'mini_carousel' => 'Korsel Mini',
    ],

    'templates' => [
        'micro_review_count' => 'Jumlah Ulasan Mikro Standar',
        'micro_review_count_dark' => 'Jumlah Ulasan Mikro Gelap',
        'review_collector' => 'Pengumpul Ulasan Standar',
        'mini' => 'Mini TrustBox Standar',
        'mini_dark' => 'Mini TrustBox Gelap',
        'micro_star_rating' => 'Rating Bintang Mikro Standar',
        'carousel' => 'Korsel Ulasan Standar',
        'carousel_full' => 'Korsel Ulasan Lebar Penuh',
        'mini_carousel' => 'Korsel Mini Standar',
    ],

    'themes' => [
        'light' => 'Terang',
        'dark' => 'Gelap',
    ],

    'positions' => [
        'after_footer' => 'Setelah Footer (Otomatis)',
        'floating' => 'Mengambang Kanan Bawah (Otomatis)',
        'widget_only' => 'Hanya Widget/Shortcode (Manual)',
    ],

    'shortcode' => [
        'name' => 'Widget Trustpilot',
        'description' => 'Tampilkan widget Trustpilot',
    ],

    'widget' => [
        'name' => 'Ulasan Trustpilot',
        'description' => 'Tampilkan widget ulasan Trustpilot di situs web Anda',
        'custom_class' => 'Kelas CSS Kustom',
        'custom_class_helper' => 'Tambahkan kelas CSS kustom ke kontainer widget',
    ],

    'validation' => [
        'business_unit_id_required' => 'Business Unit ID diperlukan saat Trustpilot diaktifkan.',
        'business_unit_id_format' => 'Business Unit ID harus berupa string heksadesimal yang valid dengan 16-24 karakter.',
        'invalid_template' => 'Silakan pilih template yang valid dari daftar.',
        'color_format' => 'Silakan masukkan warna hex yang valid (contoh: #FF5733 atau #F53).',
        'font_family_format' => 'Jenis font mengandung karakter yang tidak valid. Gunakan hanya huruf, angka, spasi, koma, tanda hubung, dan tanda kutip.',
        'json_format' => 'Gaya kustom harus dalam format JSON yang valid.',
    ],
];