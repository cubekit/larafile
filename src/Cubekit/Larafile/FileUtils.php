<?php namespace Cubekit\Larafile;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Cubekit\Larafile\Exceptions\IsNotImage;

class FileUtils {

    public static function isImage(UploadedFile $file)
    {
        return in_array($file->guessExtension(), ['jpeg', 'png', 'gif', 'bmp', 'svg']);
    }

    public static function checkIsImage(UploadedFile $file)
    {
        if ( ! static::isImage($file)) { throw new IsNotImage; }
    }

}

