# PHP-Thumbnail-Module
Small module to create thumbnails, file will have uniq file name.

# Purpose 

  Create thumbnails for your site and reduce page load.
  From PNG, JPEG, GIF, and GD.
  
  
# Manual

  Implement script in your project and use main class Thumby to create Thumbnails.
  
  -Example
  
  >$thumb = new Thumby(
  >'index.png', 
  >  "Thumby/thumbs/", 
  >  100
  >);
  
  -Description
  
    $thumb = new Thumby(
    >  "Image file name", 
    >  "path where thumbnail will be stored.", 
    >  Integer max size(width and height will be less than.)
    >);
    
    -NOTE!
    If you are using HTML forms or any other data transfer to Thumby module then
    path in function needs to be $data["tmp_name"].
