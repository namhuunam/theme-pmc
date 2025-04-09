# THEME - PMC 2022 - OPHIM CMS

## Install
1. Cài đặt package
```bash
composer config repositories.theme-pmc vcs https://github.com/namhuunam/theme-pmc.git
```
1. Tại thư mục của Project: `composer require namhuunam/theme-pmc`
2. Kích hoạt giao diện trong Admin Panel

## Update
1. Tại thư mục của Project: `composer update ophimcms/theme-pmc`
2. Re-Activate giao diện trong Admin Panel

## Note
- Một vài lưu ý quan trọng của các nút chức năng:
    + `Activate` và `Re-Activate` sẽ publish toàn bộ file js,css trong themes ra ngoài public của laravel.
    + `Reset` reset lại toàn bộ cấu hình của themes
    
## Document
### List

- Trang chủ:
```bash
Phim Mới Cập Nhật||is_copyright|0|updated_at|desc|12|/danh-sach/phim-moi|section_poster_1
Phim Chiếu Rạp||is_shown_in_theater|1|updated_at|desc|12|/danh-sach/phim-chieu-rap|section_poster_1
Phim lẻ mới||type|single|updated_at|desc|12|/danh-sach/phim-le|section_poster_1
Phim bộ mới||type|series|updated_at|desc|12|/danh-sach/phim-bo|section_poster_1
Phim thịnh hành||is_copyright|0|view_week|desc|7||section_poster_1
```

### Custom View Blade
- File blade gốc trong Package: `/vendor/ophimcms/theme-pmc/resources/views/themepmc`
- Copy file cần custom đến: `/resources/views/vendor/themes/themepmc`
