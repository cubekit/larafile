<?php namespace Cubekit\Larafile\Database\Traits;

use Cubekit\Larafile\Database\Relations\HasOneFile;

trait HasFiles {

    public function hasFile($related, $foreignKey = null, $localKey = null)
    {
        $foreignKey = $foreignKey ?: $this->getForeignKey();
        $instance = new $related();
        $localKey = $localKey ?: $this->getKeyName();

        return new HasOneFile($instance->newQuery(), $this, $instance->getTable() . '.' . $foreignKey, $localKey);
    }

}