<?php namespace Cubekit\Larafile\Contracts;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface NameBuilder {

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function build(UploadedFile $file);

}