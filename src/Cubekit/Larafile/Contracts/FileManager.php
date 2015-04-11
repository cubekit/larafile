<?php namespace Cubekit\Larafile\Contracts;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileManager {

    /**
     * This method should save the given file to a persistent storage and
     * return its new name.
     *
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file);

    /**
     * This method should destroy file with the given name from a persistent
     * storage.
     *
     * @param string $fileName
     */
    public function destroy($fileName);

}

