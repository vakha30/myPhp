<?php

class ImageManager {

    function upload($image) {
        $upload_dir = "uploads/";
        $image_name = uniqid() . ".png";
        $upload_file = $upload_dir . $image_name;
        $file = move_uploaded_file($image['tmp_name'], $upload_file);
        return $image_name;
    }

    function delete($path) {
        
    }
}
