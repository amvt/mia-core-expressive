<?php namespace Mobileia\Expressive\Diactoros;

class MiaJsonErrorResponse extends \Zend\Diactoros\Response\JsonResponse
{
    public function __construct($code, $message) {
        parent::__construct(array(
            'success' => false,
            'error' => array(
                'code' => $code,
                'message' => $message
            )
        ));
    }
}