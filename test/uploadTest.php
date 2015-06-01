<?php

class uploadTest extends \PHPUnit_Framework_TestCase
{
    /*Test if the upload method uploads image with default settings */
    public $nautilus;
    public $testingImage;
    public $imageSize = array();

    function __construct()
    {
        $this->nautilus = new \Image\nautilusOverride();
        $this->testingImage = __DIR__ . '/monkey_pic.jpg';
    }


    function testSimpleUpload()
    {
        $image = array('name' => $this->testingImage,
                'type' => 'image/jpg',
                'size' => 542,
                'tmp_name' => $this->testingImage,
                'error' => 0
            );
        $upload = $this->nautilus
            ->uploadDir('/tmp')
            ->upload($image,'nautilus_test_image');
        $this->assertEquals('/tmp/nautilus_test_image.jpeg',$upload);
    }

    /* test if it accepts image type rules as declared*/
    function testFileTypes()
    {
        $nautilus = $this->nautilus->uploadDir('/tmp');
        $image = array('name' => $this->testingImage,
                       'type' => 'image/jpeg',
                       'size' => 542,
                       'tmp_name' => $this->testingImage,
                       'error' => 0
        );

        /* should not accept gif*/
        $nautilus->fileTypes(array('gif'));
        $this->setExpectedException('Image\ImageException',' This is not allowed file type!
             Please only upload ( gif ) file types');
        $upload = $nautilus->upload($image,'nautilus_test_image');


        /* should not accept png*/
        $nautilus->fileTypes(array('png'));
        $this->setExpectedException('Image\ImageException',' This is not allowed file type!
             Please only upload ( png ) file types');
        $upload = $nautilus->upload($image,'nautilus_test_image');

        /* shouldn't accept this file */
        $nautilus->fileTypes(array('exe'));
        $this->setExpectedException('Image\ImageException',' This is not allowed file type!
             Please only upload ( exe ) file types');
        $upload = $nautilus->upload($image,'nautilus_test_image');

        /* example file is actually jpeg, not jpg */
        $nautilus->fileTypes(array('png', 'jpeg'));
        $upload = $nautilus->upload($image,'nautilus_test_image');
        $this->assertEquals('uploads/nautilus_test_image.jpeg',$upload);
    }


    /* test if it accepts image size rules as declared */
    function testImageSize()
    {
        $nautilus = $this->nautilus->uploadDir('/tmp');
        $nautilus->limitSize(array("min" => 1, "max" => 33122));
        $image = array('name' => $this->testingImage,
                       'type' => 'image/jpeg',
                       'size' => 542,
                       'tmp_name' => $this->testingImage,
                       'error' => 0
        );
        $upload = $nautilus->upload($image,'nautilus_test_image');
        $this->assertEquals('/tmp/nautilus_test_image.jpeg',$upload);

        /*give it invalid 'max' size*/
        $nautilus = $this->nautilus;
        $nautilus->limitSize(array("min" => 1, "max" => 22));
        $image = array('name' => $this->testingImage,
                       'type' => 'image/jpeg',
                       'size' => 542,
                       'tmp_name' => $this->testingImage,
                       'error' => 0
        );
        $this->setExpectedException('Image\ImageException','File sizes must be between 1 to 22 bytes');
        $upload = $nautilus->upload($image,'nautilus_test_image');

    }
}