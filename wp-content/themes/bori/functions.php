<?php

    function bori_theme_support() {
        # c : header.php에 보면 <title></title>이 있어야하지만 이 method가 그부분을 자동적으로 해결해줌
        # Adds dynamic title tag support 
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
    }
    add_action('after_setup_theme', 'bori_theme_support');

    function bori_menus() {

        $locations = array(
            'primary' => "Desktop Primary Left Sidebar",
            'footer'  => "Footer Menu Items"

        );

        register_nav_menus($locations);
    }
    add_action('init','bori_menus');

    function bori_register_styles() {

        # c : 이부분을 통해 bori/style.css의 맨위에 선언해둔 테마 정보 중 version의 값을 가져온다.
        $version = wp_get_theme() -> get( 'Version' );

        # c : 여기 array()함수 안에, bori-bootstrap을 넣음으로써, 이 행은 bootstrap을 의존한다는 것을 의미, 다시말해, wp_head()에 의해 이 부분이 load될때, bootstarp이 로드되고, 그 다음으로 나의 css파일이 로드됨을 의미
        wp_enqueue_style('bori-style', get_template_directory_uri() . "/style.css", array('bori-bootstrap'), $version, 'all'); 
        wp_enqueue_style('bori-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
        wp_enqueue_style('bori-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

    }
    # c : Wordpress가 아래 hook을 실행하면, 내가 위에 만든 function인 bori_register_styles를 실행시킨다는 의미
    add_action( 'wp_enqueue_scripts', 'bori_register_styles');

    function bori_register_scripts() {

        # c : 마지막 param을 true로 설정하면 해당 값을 footer에서 include ( default는 false인데 그럴 경우, wp_head()부에 include된다. )
        wp_enqueue_script('bori-jquery',"https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
        wp_enqueue_script('bori-popper',"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
        wp_enqueue_script('bori-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '3.4.1', true);
        wp_enqueue_script('bori-main',get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);

    }
    # c : Wordpress가 아래 hook을 실행하면, 내가 위에 만든 function인 bori_register_scripts를 실행시킨다는 의미
    add_action( 'wp_enqueue_scripts', 'bori_register_scripts');

?>