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
        \Google\Cloud\ErrorReporting\Bootstrap::init();
        // Devolver cualquier objeto
        return new StackDriverErrorMiddleware();
    }
}
