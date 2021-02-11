<?php



class Thumby extends Resize{

    /*----------------------------------------------------------------
    Class will create thumbnail from file, and save it to thumbPath 
    resized under limits of max_size
    If you set max_size  100, the thumbnail will range 0-100 x 0-100px.
    ------------------------------------------------------------------*/

    function __construct($filename, $thumbPath, $max_size){    

        $T = $this;
        $dump = getimagesize($filename);
        list($width, $height) = getimagesize($filename);
        $orginal_size = array('width'=>$width, 'height'=>$height);
        $extension =  $T->find_file_extension($dump['mime']);
        $fname = explode(".", $filename);
        $uniq_name = uniqid($fname[0] . "_", true) . ".". $extension;
        $thumbPath = $thumbPath . $uniq_name; 



        $T->return_resource(
                $thumbPath,
                $T->resize_image(
                    $extension, 
                    $orginal_size, 
                    $max_size,
                    $filename
            )
        );
    }


    function find_file_extension($mime){

        /* --------------------------------------------------------------
            Returns only part of mime for extension as .jpeg, .png .etc
        ----------------------------------------------------------------*/
        $data = explode("/", $mime);
        var_dump($mime);
        var_dump($data);
        return $data[1];
    }


    function return_resource($pathDestinationThumbnail, $thumb ){

        /*---------------------------------------------------------------
            Return resource to path directory
        ----------------------------------------------------------------*/
        // Create uniq name
        copy($pathDestinationThumbnail, imagejpeg($thumb, $pathDestinationThumbnail));
        imagedestroy($thumb);

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



$thumb = new Thumby(
    'index.png', 
    "/home/luka/php_project/var/www/mine_project/Thumby/thumbs/", 
    100
);
?>
