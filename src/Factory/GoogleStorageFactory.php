<?php namespace Mobileia\Expressive\Factory;

use Psr\Container\ContainerInterface;

/**
 * Description of GoogleStorageFactory
 *
 * @author matiascamiletti
 */
class GoogleStorageFactory
{
    public function __invoke(ContainerInterface $container) : \Mobileia\Expressive\Google\Storage
    {
        // Obtenemos configuracion
        $config = $container->get('config')['google'];
        // creamos libreria
        return new \Mobileia\Expressive\Google\Storage($config);
    }
}