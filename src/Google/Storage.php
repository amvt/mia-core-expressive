<?php namespace Mobileia\Expressive\Google;

/**
 * Description of Storage
 *
 * @author matiascamiletti
 */
class Storage
{
    /**
     *
     * @var \Google\Cloud\Storage\StorageClient 
     */
    protected $service = null;
    
    public function __construct($config)
    {
        $this->service = new \Google\Cloud\Storage\StorageClient($config);
    }
    /**
     * 
     * @param string $fileBucketName
     * @return any
     */
    public function getFile($fileBucketName)
    {
        // Registramos stream
        $this->service->registerStreamWrapper();
        // Devolvemos archivo
        return file_get_contents($fileBucketName);
    }
    /**
     * 
     * @param string $fileBucketName
     * @return any
     */
    public function openFile($fileBucketName)
    {
        // Registramos stream
        $this->service->registerStreamWrapper();
        // Devolvemos archivo
        return fopen($fileBucketName, "r");
    }
    /**
     * 
     * @param string $fileBucketName
     * @param File $source
     * @return type
     */
    public function uploadFile($bucketName, $fileBucketName, $source)
    {
        $bucket = $this->service->bucket($bucketName);
        return $bucket->upload($source, [
            'name' => $fileBucketName
        ]);
    }
    /**
     * 
     */
    public function register()
    {
        // Registramos stream
        $this->service->registerStreamWrapper();
    }
}
