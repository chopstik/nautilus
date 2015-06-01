<?php
namespace Image;

require_once(dirname(__FILE__).'/../src/nautilus.php');

use Image\nautilus;

class nautilusOverride extends nautilus
{
    public function isUploadedFile($file)
    {
        return file_exists($file);
    }

    public function moveUploadedFile($uploaded_file, $new_file) {
        return copy($uploaded_file,$new_file);
    }
}