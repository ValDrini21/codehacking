<?php 

use Illuminate\Support\Str;

function media_name_manipulation($file_path_name, $folder_name) {
    $media_name =  Str::after($file_path_name, $folder_name);
    $media_length = Str::length($media_name); 
    $file_name = Str::substr($media_name, 10, $media_length); 
    
    return $file_name;
}

?>