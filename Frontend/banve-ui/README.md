
# Banve-UI

Đây là dự án Laravel cho frontend của Bán vé sự kiện.

## Hướng dẫn cài đặt và chạy dự án

### Yêu cầu hệ thống
PHP >= 7.3, Composer, MySQL hoặc bất kỳ cơ sở dữ liệu nào được hỗ trợ bởi Laravel.

### Các bước cài đặt và run project

1. **Clone dự án từ repository**:
   ```sh
   git clone https://github.com/Vanniee007/UDPT_Banve_N4.git
   cd UDPT_Banve_N4/Frontend/banve-ui
2. **Cài đặt các gói phụ thuộc với Composer**:
   composer install
3. **Tạo file môi trường: Sao chép file .env.example thành .env**:
   cp .env.example .env
4. **Tạo application key: Chạy lệnh sau để tạo application key**:
   php artisan key:generate
5. **Chạy server: Chạy lệnh sau để khởi động server Laravel**:
   php artisan serve

