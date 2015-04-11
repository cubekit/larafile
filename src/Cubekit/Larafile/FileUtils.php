<?php namespace Cubekit\Larafile;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUtils {

    public static function isImage(UploadedFile $file)
    {
        return in_array($file->guessExtension(), ['jpeg', 'png', 'gif', 'bmp', 'svg']);
    }

}

