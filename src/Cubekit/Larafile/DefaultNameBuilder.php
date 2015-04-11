<?php namespace Cubekit\Larafile;

use Cubekit\Larafile\Contracts\NameBuilder;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultNameBuilder implements NameBuilder {

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function build(UploadedFile $file)
    {
        return $this->getPrefix().time().'-'.$file->getClientOriginalName();
    }

    /**
     * @return string
     */
    private function getPrefix()
    {
        return str_finish( config('cubekit.larafile.prefix', ''), '/' );
    }
}