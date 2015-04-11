<?php namespace Cubekit\Larafile\Database;

use Cubekit\Larafile\Contracts\PresentableFile;
use Cubekit\Larafile\Models\Traits\FileModel;
use Illuminate\Database\Eloquent\Model;

class File extends Model implements PresentableFile {

    use FileModel;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
