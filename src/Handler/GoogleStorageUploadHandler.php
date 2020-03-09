<?php namespace Mobileia\Expressive\Handler;

/**
 * Description of GoogleStorageUploadHandler
 *
 * @author matiascamiletti
 */
class GoogleStorageUploadHandler extends \Mobileia\Expressive\Request\MiaRequestHandler
{
    protected $bucketName = '';
    
    public function __construct($bucket)
    {
        $this->bucketName = $bucket;
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener servicio de Google
        /* @var $storage \Mobileia\Expressive\Google\Storage */
        $storage = $request->getAttribute('GoogleStorage');
        // Nombre del archivo
        $generatedName = '';
        // recorremos archivos enviadoss
        foreach($request->getUploadedFiles() as $file){
            // Generamos nombre
            $generatedName = 'file_'. time() . $this->getExtension($file->getClientMediaType());
            // Subimos archivo a Storage
            $storage->uploadFile($this->bucketName, $generatedName, $file->getStream()->detach());
        }
        if($generatedName == ''){
            // No se subio el archivo
            return new \Mobileia\Expressive\Diactoros\MiaJsonErrorResponse(-2, 'No se ha podido subir el archivo');
        }
        // Devolvemos respuesta
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse(array(
            'name' => $generatedName
        ));
    }
    
    /**
     * 
     * @param string $mimetype
     * @return string
     */
    protected function getExtension($mimetype)
    {
        if($mimetype == 'text/csv'){
            return '.csv';
        }else if($mimetype == 'image/png'){
            return '.png';
        }else if($mimetype == 'image/jpeg'){
            return '.jpg';
        }else if($mimetype == 'image/gif'){
            return '.gif';
        }else if($mimetype == 'image/webp'){
            return '.webp';
        }
    }
}
