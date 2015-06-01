<?php
// Trying to come up with ways how to test this thing. 
// if anyone can provide any idea, it would help a lot

class nautilusTest extends \PHPUnit_Framework_TestCase 
{
    public function test_if_all_visible_class_methods_exist(){
    	$Image = new Image\nautilus; 

    	$classMethod = get_class_methods($Image);

    	$result = array_diff(
    		array(
    		'fileTypes',
    		'limitSize',
    		'limitDimension',   	
    		'uploadDir',    
    		'watermark',    		
    		'shrink',    		
    		'crop',    	
    		'change',
    		'deleteFile',
    		'upload',
    		), $classMethod);

    	$this->assertTrue(empty($result));
    }

    // define funny + trivial test :)
    public function test_if_files_exists(){
    	$nautilusFileExists = file_exists(__DIR__.'/../src/nautilus.php');
        /* more to follow (including examples, and dummy images )*/
    	$this->assertTrue($nautilusFileExists);
    }	

}