<?php

namespace Mobileia\Expressive\Factory;

use Psr\Container\ContainerInterface;

/**
 * Description of GoogleStorageMiddlewareFactory
 *
 * @author matiascamiletti
 */
class GoogleStorageMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : \Mobileia\Expressive\Middleware\GoogleStorageMiddleware
    {
        // Creamos servicio
        $service   = $container->get(\Mobileia\Expressive\Google\Storage::class);
        // Generamos el handler
        return new \Mobileia\Expressive\Middleware\GoogleStorageMiddleware($service);
    }
}