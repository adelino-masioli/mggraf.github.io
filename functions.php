<?php

function base_url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    //return $protocol . "://" . $_SERVER['HTTP_HOST'].'/';
    return 'http://localhost:8484/';
    //return 'http://www.mggraf.com/';
}

function set_qr(){
    $protect_url = array('', 'sobre', 'servicos', 'produtos', 'contato', 'cartao-de-visita', 'banners', 'panfletos', 'livretos', 'vinil-adesivo', 'folders');
    return $protect_url;
}

function get_qr(){
    //$url =  basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $url =  substr(strrchr($_SERVER['REQUEST_URI'], "/"), 1);
    return $url;
}

function validate_qr(){
    $url       =  get_qr();
    if($url){
        if(in_array($url, set_qr())){
            include_once('pages/'.$url.'.php');
        }else{ 
            include_once('pages/404.php');
        }
    }else{
        include_once('home.php');
    }
}

function title_site($default=null){
    if($default!=null){
       return $default;
    }else{
        return "MG Graf";
    }
}
function title_site_description($default=null){
    if($default!=null){
        return $default;
    }else{
        return "MG Graf.";
    }
}
function title_site_author($default=null){
    if($default!=null){
        return $default;
    }else{
        return "Junior Ferreira - www.juniorferreira.com.br";
    }
}
function generator($default=null){
    if($default!=null){
        return $default;
    }else{
        return "PHPStorm, HTML5, CSS3, JavaScript, PHP";
    }
}

function active_menu($menu=null){
    if(get_qr() == $menu){
        return 'active';
    }
}

function active_menu_array($menu=null){
    if(in_array(get_qr(), $menu)){
        return 'active';
    }
}

function select_banner($banner_image, $banner_title){
    $banner = null;

    $banner .= '<section class="no-padding" id="box1"><div class="container-fluid">';
            $banner .= '<div class="row no-padding">';
                $banner .= '<div class="col-md no-padding">';
                        $banner .= '<img class="img-responsive wow fadeIn" data-wow-delay=".3s" src="'.$banner_image.'" alt="'.$banner_title.'">';
                $banner .= '</div>';
            $banner .= '</div>';
        $banner .= '</div>';
    $banner .= '</section>';


    return $banner;
}