<?php

namespace Mobileia\Expressive\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Description of GoogleStorageMiddleware
 *
 * @author matiascamiletti
 */
class GoogleStorageMiddleware implements MiddlewareInterface
{
    /**
     * @var \Mobileia\Expressive\Google\Storage
     */
    private $storage;

    public function __construct(\Mobileia\Expressive\Google\Storage $storage) {
        $this->storage = $storage;
    }
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        // Enviar servicio como atributo
        return $handler->handle($request->withAttribute('GoogleStorage', $this->storage));
    }
}