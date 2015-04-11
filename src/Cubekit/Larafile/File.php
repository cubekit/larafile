<?php namespace Cubekit\Larafile;

use Cubekit\Larafile\Contracts\PresentableFile;
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
