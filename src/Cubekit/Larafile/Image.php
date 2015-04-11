<?php namespace Cubekit\Larafile;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image extends File {

    public static function upload(UploadedFile $file)
    {
        FileUtils::checkIsImage($file);

        return parent::upload($file);
    }


}
