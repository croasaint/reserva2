<?php

function get_cached_filename($file_name){
    // Remove the root path ('/') from the full file name.
    // This will be added back when function returns the
    // modified file name.
    
    if(substr($file_name, 0, 1) == '/'){
        $file_name = substr($file_name, 1);
    }
    $root_path = '/reservas/';
    $last_mod = filemtime($file_name);
    if($last_mod){
        $path_parts = pathinfo($file_name);
        return $root_path.$path_parts['dirname'].'/'.$path_parts['filename'].'.'.$path_parts['extension'];
    }

    return $root_path.$file_name;
}
?>