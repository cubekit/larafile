<?php namespace Cubekit\Larafile\Database\Relations;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HasOneFile extends HasOne {

    /**
     * @return bool
     */
    public function delete()
    {
        // The FileModel trait automatically deletes a real file from a
        // persistent storage when the "deleting" event is triggered. So
        // we need call the "delete" method directly on the model instance
        // instead of on query (as by default) to trigger this event.

        if ($models = $this->getQuery()->getModels()) {
            return head($models)->delete();
        }

        return false;
    }

    /**
     * Upload file and save its model as related. Previous model will be
     * deleted from database. NOTE: if related model uses the "FileModel"
     * trait, then its file also will be deleted.
     *
     * @param UploadedFile $file
     * @return Model
     */
    public function upload(UploadedFile $file)
    {
        $this->delete();

        $file = call_user_func([$this->getQuery()->getModel(), 'upload'], $file);

        return $this->save($file);
    }

    /**
     * It's a helper method created to prevent checking of file existence
     * every time before trying to upload it.
     *
     * @example
     *
     * // This method
     * $post->uploadIfExists($this->featuredImage);
     *
     * // Is a full equivalent of this code
     * if ($this->featuredImage) {
     *     $post->upload($this->featuredImage);
     * }
     *
     * @param UploadedFile $file
     * @return bool|Model
     */
    public function uploadIfExists(UploadedFile $file = null)
    {
        if ($file) {
            return $this->upload($file);
        }

        return false;
    }

} 