<?php

return [
    'menu_title' => 'Trustpilot',

    'settings' => [
        'title' => 'Cài đặt Trustpilot',
        'description' => 'Cấu hình tích hợp widget Trustpilot cho trang web của bạn',
        'alert' => 'Để sử dụng widget Trustpilot, bạn cần có tài khoản doanh nghiệp Trustpilot. Truy cập https://business.trustpilot.com để đăng ký và lấy Business Unit ID.',
        'enable' => 'Bật tích hợp Trustpilot',
        'configure_button' => 'Cấu hình cài đặt Trustpilot',

        'business_unit_id' => 'Business Unit ID',
        'business_unit_id_helper' => 'ID đơn vị kinh doanh Trustpilot duy nhất của bạn (chuỗi hex 24 ký tự). Tìm trong tài khoản Trustpilot Business tại Cài đặt → API → Business Unit ID, hoặc dùng API endpoint: GET https://api.trustpilot.com/v1/business-units/find?name=yourdomain.com',

        'verification_id' => 'ID xác minh tên miền',
        'verification_id_helper' => 'Tùy chọn: Mã xác minh tên miền Trustpilot. Thêm mã này để xác minh quyền sở hữu tên miền. Có thể xóa sau khi hoàn tất xác minh.',

        'locale' => 'Ngôn ngữ/Ngôn ngữ địa phương',
        'theme' => 'Giao diện',

        'display_position' => 'Vị trí hiển thị',
        'display_position_helper' => 'Chọn vị trí widget hiển thị tự động. Chọn "Chỉ Widget/Shortcode" để hiển thị thủ công qua widget hoặc shortcode.',

        'widget_template' => 'Mẫu widget',
        'widget_template_helper' => 'Chọn mẫu cụ thể cho widget của bạn, hoặc để trống để dùng mẫu mặc định.',
        'use_default_template' => '-- Sử dụng mẫu mặc định --',

        'stars_color' => 'Màu sao',
        'stars_color_helper' => 'Tùy chọn: Màu tùy chỉnh cho sao (ví dụ: #FFD700)',

        'text_color' => 'Màu chữ',

        'font_family' => 'Phông chữ',

        'custom_styles' => 'Kiểu tùy chỉnh (JSON)',
        'custom_styles_helper' => 'Tùy chọn: Thêm kiểu tùy chỉnh dưới định dạng JSON',
    ],

    'widget_types' => [
        'micro_review_count' => 'Số lượng đánh giá nhỏ (Miễn phí)',
        'review_collector' => 'Thu thập đánh giá (Miễn phí)',
        'mini' => 'Mini TrustBox',
        'micro_star_rating' => 'Xếp hạng sao nhỏ',
        'carousel' => 'Băng chuyền đánh giá',
        'mini_carousel' => 'Băng chuyền nhỏ',
    ],

    'templates' => [
        'micro_review_count' => 'Số lượng đánh giá nhỏ tiêu chuẩn',
        'micro_review_count_dark' => 'Số lượng đánh giá nhỏ tối',
        'review_collector' => 'Thu thập đánh giá tiêu chuẩn',
        'mini' => 'Mini TrustBox tiêu chuẩn',
        'mini_dark' => 'Mini TrustBox tối',
        'micro_star_rating' => 'Xếp hạng sao nhỏ tiêu chuẩn',
        'carousel' => 'Băng chuyền đánh giá tiêu chuẩn',
        'carousel_full' => 'Băng chuyền đánh giá toàn màn hình',
        'mini_carousel' => 'Băng chuyền nhỏ tiêu chuẩn',
    ],

    'themes' => [
        'light' => 'Sáng',
        'dark' => 'Tối',
    ],

    'positions' => [
        'after_footer' => 'Sau chân trang (Tự động)',
        'floating' => 'Nổi góc dưới phải (Tự động)',
        'widget_only' => 'Chỉ Widget/Shortcode (Thủ công)',
    ],

    'shortcode' => [
        'name' => 'Widget Trustpilot',
        'description' => 'Hiển thị widget Trustpilot',
    ],

    'widget' => [
        'name' => 'Đánh giá Trustpilot',
        'description' => 'Hiển thị widget đánh giá Trustpilot trên trang web của bạn',
        'custom_class' => 'Lớp CSS tùy chỉnh',
        'custom_class_helper' => 'Thêm lớp CSS tùy chỉnh vào container widget',
    ],

    'validation' => [
        'business_unit_id_required' => 'Business Unit ID là bắt buộc khi Trustpilot được bật.',
        'business_unit_id_format' => 'Business Unit ID phải là chuỗi hex hợp lệ 16-24 ký tự.',
        'invalid_template' => 'Vui lòng chọn mẫu hợp lệ từ danh sách.',
        'color_format' => 'Vui lòng nhập màu hex hợp lệ (ví dụ: #FF5733 hoặc #F53).',
        'font_family_format' => 'Phông chữ chứa ký tự không hợp lệ. Chỉ dùng chữ, số, khoảng trắng, dấu phẩy, gạch ngang và dấu ngoặc kép.',
        'json_format' => 'Kiểu tùy chỉnh phải ở định dạng JSON hợp lệ.',
    ],
];