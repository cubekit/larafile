<?php namespace Cubekit\Larafile\Contracts;

interface FilePresenter {

    /**
     * @param PresentableFile $file
     * @return FilePresenter
     */
    public function __construct(PresentableFile $file);

    /**
     * @return string
     */
    public function url();

}