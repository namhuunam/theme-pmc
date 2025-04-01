@extends('themes::layout')

@php
    $menu = \Ophim\Core\Models\Menu::getTree();
@endphp

@push('header')
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500&amp;display=swap' rel='stylesheet' type='text/css'>
    
    <!-- Tải trước CSS quan trọng nhất -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/pmc/bootstrap/css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('/themes/pmc/bootstrap/css/bootstrap.min.css') }}"></noscript>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('/themes/pmc/css/mainpmchill.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('/themes/pmc/css/mainpmchill.css') }}"></noscript>
    
    <!-- CSS ít quan trọng hơn, tải trễ -->
    <link rel="preload" type="text/css" href="{{ asset('/themes/pmc/css/can-toggle.css?v=1.0') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('/themes/pmc/css/font-awesome.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('/themes/pmc/css/responsive.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" type="text/css" href="{{ asset('/themes/pmc/css/page_index.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- Thêm CSS cho lazy loading -->
    <style>
        /* CSS cho lazy loading ảnh */
        .lazyload,
        .lazyloading {
            opacity: 0;
        }
        .lazyloaded {
            opacity: 1;
            transition: opacity 300ms;
        }
        
        /* CSS cho lazy loading background */
        .image.lazyload {
            background-image: none !important;
            background-color: #141414;
        }
        .image.lazyloaded {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            transition: opacity 300ms;
        }
        
        /* Định dạng ảnh cố định cho các phần tử ảnh để tránh CLS */
        .list-film .item img, #list-film-realted img {
            aspect-ratio: 2/3;
            object-fit: cover;
        }
        
        /* Hiển thị phim trong top-slide */
        #film-hot .item img {
            aspect-ratio: 16/9;
            object-fit: cover;
        }
    </style>
    
    <!-- Load script cấu hình và lazysizes trước -->
    <script>
        // Cấu hình lazySizes
        window.lazySizesConfig = window.lazySizesConfig || {};
        lazySizesConfig.expand = 300; // Tải ảnh khi chúng trong vòng 300px của viewport
        lazySizesConfig.loadMode = 2; // Tải ảnh ngay sau khi trang đã tải hoàn tất
        lazySizesConfig.init = false; // Không khởi tạo ngay lập tức
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/plugins/unveilhooks/ls.unveilhooks.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" defer></script>

    <!-- DNS prefetch và preconnect cho các domain bên ngoài -->
    <link rel='dns-prefetch' href='https://fonts.googleapis.com/' />
    <link rel='dns-prefetch' href='https://cdnjs.cloudflare.com/' />
    <link href='https://fonts.gstatic.com/' crossorigin rel='preconnect' />
    <link href='https://cdnjs.cloudflare.com/' crossorigin rel='preconnect' />
    
    <!-- jQuery cần được tải trước các script khác -->
    <script type="text/javascript" src="{{ asset('/themes/pmc/js/jquery-1.11.1.min.js') }}"></script>

    <!-- Script bootstrap và script trang tải sau khi xử lý DOM -->
    <script defer type="text/javascript" src="{{ asset('/themes/pmc/bootstrap/js/bootstrap.min.js') }}"></script>
@endpush

@section('body')
    @include('themes::themepmc.inc.header')
    <div id="main-content">
        @if (get_theme_option('ads_header'))
            {!! get_theme_option('ads_header') !!}
        @endif
        <div id="content">
            @yield('content')
        </div>
    </div>
    {!! get_theme_option('tag_box') !!}
@endsection

@section('footer')
    {!! get_theme_option('footer') !!}

    @if (get_theme_option('ads_catfish'))
        {!! get_theme_option('ads_catfish') !!}
    @endif

    <script>
        // Khởi tạo lazySizes khi DOM đã sẵn sàng
        document.addEventListener('DOMContentLoaded', function() {
            lazySizes.init();
            
            // Xử lý lazy load cho background images
            document.addEventListener('lazybeforeunveil', function(e) {
                var bg = e.target.getAttribute('data-bg');
                if (bg) {
                    e.target.style.backgroundImage = 'url(' + bg + ')';
                }
            });
        });

        var $menu = $("#menu-mobile");
        var $over_lay = $('#overlay_menu');
        var hw = $(window).height();

        function set_height_menu() {}

        function open_menu() {
            $('body').addClass('menu-active');
            $menu.addClass('expanded');
            set_height_menu();
            $(".btn-humber").addClass('active');
        }

        function close_menu() {
            $('body').removeClass('menu-active');
            $menu.removeClass('expanded');
            var w_scroll_top = $(window).scrollTop();
            if (w_scroll_top >= 50) {
                pos_top_menu = 0;
            } else {
                pos_top_menu = w_scroll_top;
            }
            set_height_menu();
            $(".btn-humber").removeClass('active');
        }
        $(document).ready(function() {
            $(".btn-humber").click(function() {
                if ($menu.hasClass('expanded')) {
                    close_menu();
                } else {
                    open_menu();
                }
            });
            $(window).scroll(function() {
                set_height_menu();
            });
            $(".parent-menu").click(function(e) {
                e.preventDefault();
                $this = $(this);
                $arrow = $this.find('.fa');
                if ($arrow.length && event.target.className != 'sub-menu-link') {
                    if ($arrow.hasClass('fa-angle-down')) {
                        $arrow.removeClass('fa-angle-down').addClass('fa-angle-up');
                    } else {
                        $arrow.addClass('fa-angle-down').removeClass('fa-angle-up');
                    }
                    $this.find('.sub-menu').toggle();
                    return false;
                } else {
                    var href = event.target.href;
                    window.location.href = href;
                }
            });
        });
    </script>

    {!! setting('site_scripts_google_analytics') !!}
@endsection