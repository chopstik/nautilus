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
 * UPLOAD WITH A SPECIFIC SIZE 
 * 
 * This will check the size of the image (in bytes), as specified in the 'limitSize()' method.
 * Pass values in bytes, and don't forget "min", "max". 
 * remember. 1 kb ~ 1000 bytes. In this example, only an image less than 42Kb can be uploaded
 *
 */

if($_FILES){
	echo $nautilus
		->limitSize(array("min"=>1, "max"=>42000))
		->upload($_FILES['picture'], "cars_picture");
}





 /* Always use the try/catch block to handle errors */
 }catch(\Image\ImageException $e){
     echo $e->getMessage();
 }


