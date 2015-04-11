<?php namespace Cubekit\Larafile\Database\Relations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HasOneFile extends HasOne {

    public function upload(UploadedFile $file)
    {
        $this->delete();

        $file = call_user_func([$this->getQuery()->getModel(), 'upload'], $file);

        return $this->save($file);
    }

} 