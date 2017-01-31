<?
  include 'class.image.php';
  if ((isset($_FILES['nom_du_fichier']['tmp_name']))) 
  {     
    $chemin_destination = '../images/dvd/';     
    $file_destination = $chemin_destination.str_replace('.jpg','_tmp.jpg',$_FILES['nom_du_fichier']['name']);
    $name = str_replace('.jpg','',$_FILES['nom_du_fichier']['name']);
    move_uploaded_file($_FILES['nom_du_fichier']['tmp_name'], $file_destination);
    list($width, $height, $type, $attr) = getimagesize($file_destination);
    $ratio = $width/$height;
    if($ratio<0.66)
    {
      $source_image = $file_destination;
      $target_image = $file_destination;
      $pos = ($height - $width*1.50);
      $new_height = ($height-$pos);
      $crop_area = array('top' => 0, 'left' => 0, 'height' => $new_height, 'width' => $width);
      cropImage($source_image, $target_image, $crop_area);
    }
    //big
    $thumb = new Image($file_destination);
    $thumb->name($name);
    $thumb->dir($chemin_destination.'big/');
    $thumb->width(300);
    $thumb->save();
    
    //thumb
    $thumb = new Image($file_destination); 
    $thumb->name($name);
    $thumb->dir($chemin_destination.'thumb/');
    $thumb->width(60);
    $thumb->save();
    //mobile
    $thumb = new Image($file_destination); 
    $thumb->name($name);
    $thumb->dir($chemin_destination.'mobile/');
    $thumb->width(40);
    $thumb->save();
    
    unlink($file_destination);
    #move_uploaded_file($_FILES['nom_du_fichier']['tmp_name'], $file_destination);     
  }
  echo 'ok';
  
  function cropImage($source_image, $target_image, $crop_area)
  {
      // detect source image type from extension
      $source_file_name = basename($source_image);
      $source_image_type = substr($source_file_name, -3, 3);

      // create an image resource from the source image  
      switch(strtolower($source_image_type))
      {
          case 'jpg':
              $original_image = imagecreatefromjpeg($source_image);
              break;

          case 'gif':
              $original_image = imagecreatefromgif($source_image);
              break;

          case 'png':
              $original_image = imagecreatefrompng($source_image);
              break;    

          default:
              trigger_error('cropImage(): Invalid source image type', E_USER_ERROR);
              return false;
      }

      // create a blank image having the same width and height as the crop area
      // this will be our cropped image
      $cropped_image = imagecreatetruecolor($crop_area['width'], $crop_area['height']);

      // copy the crop area from the source image to the blank image created above
      imagecopy($cropped_image, $original_image, 0, 0, $crop_area['left'], $crop_area['top'], 
                $crop_area['width'], $crop_area['height']);

      // detect target image type from extension
      $target_file_name = basename($target_image);
      $target_image_type = substr($target_file_name, -3, 3);

      // save the cropped image to disk
      switch(strtolower($target_image_type))
      {
          case 'jpg':
              imagejpeg($cropped_image, $target_image, 100);
              break;

          case 'gif':
              imagegif($cropped_image, $target_image);
              break;

          case 'png':
              imagepng($cropped_image, $target_image, 0);
              break;    

          default:
              trigger_error('cropImage(): Invalid target image type', E_USER_ERROR);
              imagedestroy($cropped_image);
              imagedestroy($original_image);
              return false;
      }

      // free resources
      imagedestroy($cropped_image);
      imagedestroy($original_image);

      return true;
  }


  // using the function to crop an image
  
?>