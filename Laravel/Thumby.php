<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;

class Thumby extends Resize{

    /*----------------------------------------------------------------
    Class will create thumbnail from file, and save it to thumbPath 
    resized under limits of max_size
    If you set max_size  100, the thumbnail will range 0-100 x 0-100px.
    ------------------------------------------------------------------*/

    function __construct($filename, $name, $path, $max_size){    
        $T = $this;
        /* 
            [$thumbpath] will lead to laravel app env and public dir,
            you just need to specify which extra folder in [$path] you want to hold your
            thumbnails. 

            Saving outside  { public } folder
                Just replace storage with desired destination, and add $path.
                In production, best use storage with symbolic links to public for getters.
        */
        $thumbPath = storage_path($path);
        

        $dump = getimagesize($filename);
        list($width, $height) = getimagesize($filename);
        $orginal_size = array('width'=>$width, 'height'=>$height);
        $extension =  $T->find_file_extension($dump['mime']);
        $thumbPath = $thumbPath . $name; 

        $T->return_resource($thumbPath,
                $T->resize_image($extension, $orginal_size, $max_size, $filename)
        );
    }


    function find_file_extension($mime){
        /* --------------------------------------------------------------
            Returns only part of mime for extension as .jpeg, .png .etc
        ----------------------------------------------------------------*/
        $data = explode("/", $mime);
        return $data[1];
    }


    function return_resource($pathDestinationThumbnail, $thumb ){
        /*---------------------------------------------------------------
            Return resource to path directory
        ----------------------------------------------------------------*/
        imagejpeg($thumb, $pathDestinationThumbnail);
    }

}



class Resize{


    function resize_image($extension, $orginal, $max_size, $file){

        /* --------------------------------------------------------------
            Returns only part of mime for extension as .jpeg, .png .etc
        ----------------------------------------------------------------*/
        $coef   = 0.5;
        $width  = $orginal['width'];
        $height = $orginal['height'];
        $n_width  = $width * $coef;
        $n_height = $height * $coef;
        while($n_height > $max_size || $n_width > $max_size){
            $n_width  = $n_width * $coef;
            $n_height = $n_height * $coef;
        }

        $thumb = imagecreatetruecolor($n_width, $n_height) or die("Failed to create imagecreatetrue.");
        $source = $this->image_create_from_extension($extension, $file);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
        return $thumb;
    }




    function image_create_from_extension($extension, $file){

        /* --------------------------------------------------------------
            Returns appropriate .etc
        ----------------------------------------------------------------*/
        switch ($extension){
            case "jpeg":
                return imagecreatefromjpeg($file);
                break;
            case "jpg":
                return imagecreatefromjpeg($file);
                break;
            case "png":
                return imagecreatefrompng($file);
                break;
            case "gif":
                return imagecreatefromgif($file);
                break;
            case "gd":
                return imagecreatefromgd($file);
                break;
            default:
                echo("Failed to create thumbnail from files type.");
                exit();
        }
    }


}

?>
