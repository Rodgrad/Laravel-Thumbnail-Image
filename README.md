# Laravel and PHP-Thumbnail-Module 
<br/>
Small module to create thumbnails super easy.<br/>
Formats: PNG, JPG, JPEG, and GIF.

<br/><br/><br/>

# Laravel Manual
## For LARAVEL use only the class from the [ Laravel ] folder

<br/>
  Put Thumby.php class into models folder.<br/>
  Then into your eg. models/Post.php add:<br/>
  
   > // Insert this in any file where you will use Thumby, like controllers or models, etc.<br/>
   > use App\Models\Thumby;<br/>    
  
  ... and then in some method of controller or models use...<br/>

  > $thumb = new Thumby(
      $request->image,                
      "app/public/portfolio/thumbnail/",          
      100                             
    );
    
   ...to affect the image.<br/>
 
   -- $request->image is the resource <br/>
   -- "app/public/portfolio/thumbnail/"  is the path to destination folder, by default it is set to lead into the [ Storage ] . "your path here".<br/>
      For production best use Storage, or it could return 405 error.
   -- 100 is the max size of the thumbnail<br/>
<br/><br/><br/>
    
   
  
# PHP Basic Manual
## For Bascic PHP use only the class from the [ Thumby ] folder


  >$thumb = new Thumby(
    'index.png',           
    "Thumby/thumbs/",       
    100                     
  );
     
  -- $request->image is the resource image , may require path if it is in another folder than the script<br/>
  -- "Thumby/thumbs/"  is the path to destination folder<br/>
  -- 100 is the max size of the thumbnail<br/>

    
    -NOTE!
    If you are using HTML forms or any other data transfer to Thumby module then
    path in function needs to be $data["tmp_name"].
