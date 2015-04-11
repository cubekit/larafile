<?php namespace Cubekit\Larafile;

use Cubekit\Larafile\Contracts\FileManager;

use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Cubekit\Larafile\Contracts\NameBuilder;

class DefaultFileManager implements FileManager {

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
        $fileName = $this->nameBuilder->build($file);

        $this->getDisk()->put($fileName, $this->getContent($file));

        return $fileName;
    }

    /**
     * This method should destroy file with the given name from a persistent
     * storage.
     *
     * @param string $fileName
     */
    public function destroy($fileName)
    {
        $disk = $this->getDisk();

        if ($disk->exists($fileName)) { $disk->delete($fileName); }
    }

    /**
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    private function getDisk()
    {
        return Storage::disk( config('cubekit.larafile.disk', 'local') );
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
