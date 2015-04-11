<?php namespace Cubekit\Larafile\Contracts;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileUploader {

    /**
     * This method should save the given file to a persistent storage and
     * return its new name.
     *
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file);

}

