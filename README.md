# Laravel and PHP-Thumbnail-Module --Super Easy Thumbnails

Small module to create thumbnails 
Formats: PNG, JPEG, GIF, and GD.



# Laravel Manual
## For LARAVEL use only the class from the [ Laravel ] folder


  Put Thumby.php class into models folder.
  Then into your eg. models/Post.php add:
  
  > use App\Models\Thumby;    // Insert these in any file where you will use Thumby
  
  ... and then in some method of controller or models use...

  > $thumb = new Thumby(
      $request->image,                
      "storage/thumbnails/",          
      100                             
    );
    
   ...to affect the image.
 
   -- $request->image is the resource
   -- "storage/thumbnails/"  is the path to destination folder, by default it is set to lead into the [ Public ] . "your path here".
   -- 100 is the max size of the thumbnail

    
   
  
# PHP Basic Manual
## For Bascic PHP use only the class from the [ Thumby ] folder


  >$thumb = new Thumby(
    'index.png',           
    "Thumby/thumbs/",       
    100                     
  );
     
  -- $request->image is the resource image , may require path if it is in another folder than the script
  -- "Thumby/thumbs/"  is the path to destination folder
  -- 100 is the max size of the thumbnail

    
    -NOTE!
    If you are using HTML forms or any other data transfer to Thumby module then
    path in function needs to be $data["tmp_name"].
