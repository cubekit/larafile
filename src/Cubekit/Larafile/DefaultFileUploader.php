<?php namespace Cubekit\Larafile;

use Cubekit\Larafile\Contracts\FileUploader;

use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Cubekit\Larafile\Contracts\NameBuilder;

class DefaultFileUploader implements FileUploader {

    /**
     * @var NameBuilder
     */
    private $nameBuilder;

    public function __construct(NameBuilder $nameBuilder)
    {
        $this->nameBuilder = $nameBuilder;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file)
    {
        $name = $this->nameBuilder->build($file);

        $this->getDisk()->put($name, $this->getContent($file));

        return $name;
    }

    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    private function getDisk()
    {
        return Storage::disk( config('larafile.disk', 'local') );
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function getContent(UploadedFile $file)
    {
        return file_get_contents($file->getPathname());
    }

}
