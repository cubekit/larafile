<?php namespace Cubekit\Larafile\Database\Traits;


trait Thumbnailable {

    public function thumbnail($params)
    {
        return thumbnail($this->name, $params);
    }

}