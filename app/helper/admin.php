<?php

if (!function_exists('Admin')):
    function Admin(){
        return auth()->guard('admin');
    }
endif;


if (!function_exists('aurl')):
    function aurl($url = null){
        return url('/admin') . '/' . $url;
    }
endif;