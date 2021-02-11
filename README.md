# Laravel and PHP-Thumbnail-Module --Super Easy Thumbnails

Small module to create thumbnails 
Formats: PNG, JPEG, GIF, and GD.


# Manuals

# Laravel
# For LARAVEL use only the class from the [ Laravel ] folder


  Put Thumby.php class into models folder.
  Then into your eg. models/Post.php add:
  
  > use App\Models\Thumby;    // Insert these in any file where you will use Thumby
  
  ... and then in some method of controller or models use...

  > $thumb = new Thumby(
      $request->image,                //resource
      "storage/thumbnails/",          // path to destination folder
      100                             // Max size of the thumbnail
    );
    
   ...to affect the image.
   
  
# PHP Basic
# For Bascic PHP use only the class from the [ Thumby ] folder


  >$thumb = new Thumby(
    'index.png',            // image , may require path if it is in another folder than the script
    "Thumby/thumbs/",       //destination folder
    100                     // max size
  );
  
    
    -NOTE!
    If you are using HTML forms or any other data transfer to Thumby module then
    path in function needs to be $data["tmp_name"].
