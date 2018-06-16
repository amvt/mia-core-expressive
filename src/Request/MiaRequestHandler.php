<?php namespace Mobileia\Expressive\Request;

abstract class MiaRequestHandler implements \Psr\Http\Server\RequestHandlerInterface
{
    /**
     * Obtener parametro sin importar de donde provenga.
     */
    protected function getParam(ServerRequestInterface $request, $key, $default = null)
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
}