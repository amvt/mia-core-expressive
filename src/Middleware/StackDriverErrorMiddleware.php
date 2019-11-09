<?php

namespace Mobileia\Expressive\Middleware;

use Psr\Container\ContainerInterface;

/**
 * Description of StackDriverErrorMiddleware
 *
 * @author matiascamiletti
 */
class StackDriverErrorMiddleware
{
    public function __invoke(ContainerInterface $container): \Mobileia\Expressive\StackDriver\StackDriverResponseGenerator
    {
        // Iniciar reporting
        if (isset($_SERVER['GAE_SERVICE'])) {
            \Google\Cloud\ErrorReporting\Bootstrap::init();
        }
        // Devolver cualquier objeto
        return new \Mobileia\Expressive\StackDriver\StackDriverResponseGenerator();
    }
}
