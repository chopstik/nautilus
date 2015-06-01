<?php

/**
 * nautilus - ALL IN ONE, IMAGE UPLOAD/MANIPULATE. 
 * 
 * @category nautilus
 * @license  Free / Luke 3:11
 * @version  1.0.0
 * @link     https://github.com/samayo/nautilus
 * @author   samayo. ~ The force is strong with this one.
 *
 */

// Require the main src file. 
require_once   "../src/nautilus.php";

// Require the HTML form. 
require_once   "form.html";

// Create an instance of nautilus
$nautilus = new Image\nautilus;

try{


/**
 * SIMPLE & DEFAULT UPLOAD
 *
 * This is the simplest way to upload an image. It will use the default methods of the class. 
 * Which means it will: 
 * > upload an image with (jpg, png, gif, jpeg) extensions only. 
 * > It will only upload file with sizes in-between 1Kb to 30Kb. 
 * > It will upload the images in a folder called "uploads", if you don't have such folder
 *   then it will be created with permission/chmod of '666'. 
 * > Uploaded image will also be given a unique & random name
 */

if($_FILES){
  echo $nautilus
  	->upload($_FILES['picture']);
}

/* If you want to rename uploaded image, please pass a second argument 
 * to upload like ->upload($_FILES['picture'], 'new-name-here');
 */

 /* Always use the try/catch block to handle errors */
 }catch(\Image\ImageException $e){
     echo $e->getMessage();
 }


