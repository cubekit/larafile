<?php namespace Cubekit\Larafile;

use Cubekit\Larafile\Contracts\FilePresenter;
use Cubekit\Larafile\Contracts\PresentableFile;

class DefaultFilePresenter implements FilePresenter {

    /**
     * @var string
     */
    private $rootUrl;
    /**
     * @var PresentableFile
     */
    private $file;

    public function __construct(PresentableFile $file)
    {
        $this->rootUrl = str_finish( config('cubekit.larafile.root_url'), '/' );

        $this->file = $file;
    }

    /**
     * @return string
     */
    public function url()
    {
        return $this->rootUrl . $this->file->getName();
    }
}