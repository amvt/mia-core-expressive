<?php namespace Mobileia\Expressive\Request;

abstract class MiaRequestHandler implements \Psr\Http\Server\RequestHandlerInterface
{
    /**
     * Verifica el tipo de respuesta que el cliente quiere ejecutar
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param mixed $data
     * @return \Mobileia\Expressive\Diactoros\MiaCsvResponse|\Mobileia\Expressive\Diactoros\MiaJsonResponse
     */
    public function response(\Psr\Http\Message\ServerRequestInterface $request, $data)
    {
        $export = $this->getParam($request, 'export', '');
        if($export == 'csv'){
            return new \Mobileia\Expressive\Diactoros\MiaCsvResponse($data);
        }
        
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($data);
    }
    /**
     * Obtener parametro sin importar de donde provenga.
     */
    public function getParam(\Psr\Http\Message\ServerRequestInterface $request, $key, $default = null)
    {
        // Obtener parametros
        $params = $request->getParsedBody();
        // verificar si fue enviado
        if(array_key_exists($key, $params)){
            return $params[$key];
        }
        // Obtener Querys
        $querys = $request->getQueryParams();
        if(array_key_exists($key, $querys)){
            return $querys[$key];
        }
        return $default;
    }
    
    /**
     * Obtener todos los parametros
     */
    public function getAllParam(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtener parametros
        return array_merge($request->getQueryParams(), $request->getParsedBody());
    }
}