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
 * RESIZE IMAGES BY PIXELS. 
 *
 * This simply will shrink the image, to the given size in the 'shrink()' method 
 */

if($_FILES){
	echo $nautilus
		->fileTypes(array("gif", "jpg", "jpeg", "png"))
		->limitSize(array("min"=>1, "max"=>2122000))
		->shrink(array("width"=>30, "height"=>30))
		->upload($_FILES['picture']);
}



 /* Always use the try/catch block to handle errors */
 }catch(\Image\ImageException $e){
     echo $e->getMessage();
 }


