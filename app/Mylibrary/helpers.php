<?php
use App\Mylibrary\Facades\Tool;
if(!function_exists('get_thumbnail')){
    function get_thumbnail($filename,$suffix=''){
        return Tool::getThumbnail($filename,$suffix);
    }
}