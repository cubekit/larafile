<?php namespace Cubekit\Larafile\Database\Traits;

use Cubekit\Larafile\Contracts\FilePresenter;
use Symfony\Component\HttpFoundation\File\UploadedFile;

trait FileModel {

    /**
     * @var FilePresenter
     */
    private $filePresenter;

    protected static function bootFileModel()
    {
        static::deleting(function($model)
        {
            $manager = app()->make('Cubekit\Larafile\Contracts\FileManager');

            $manager->destroy($model->name);
        });
    }

    /**
     * @return FilePresenter
     */
    public function present()
    {
        if ( ! $this->filePresenter) {
            $this->filePresenter = app()->make('Cubekit\Larafile\Contracts\FilePresenter', [$this]);
        }

        return $this->filePresenter;
    }

    /**
     * Upload the given instance if UploadedFile and return instance of the
     * model.
     *
     * @param UploadedFile $file
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function upload(UploadedFile $file)
    {
        $manager = app()->make('Cubekit\Larafile\Contracts\FileManager');

        $instance = new static;

        $instance->name = $manager->upload($file);

        return $instance;
    }

    /**
     * Generate URL for the file
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->present()->url();
    }

}