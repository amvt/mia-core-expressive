<?php

namespace Mobileia\Expressive\Middleware;

/**
 * Description of StackDriverErrorMiddleware
 *
 * @author matiascamiletti
 */
class StackDriverErrorMiddleware
{
    public function __invoke($container)
    {
        // Iniciar reporting
        if (isset($_SERVER['GAE_SERVICE'])) {
            \Google\Cloud\ErrorReporting\Bootstrap::init();
        }
        // Devolver cualquier objeto
        return new StackDriverErrorMiddleware();
    }
}
