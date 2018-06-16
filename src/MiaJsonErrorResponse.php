<?php namespace Mobileia\Expressive\Diactoros;

class MiaJsonErrorResponse extends \Zend\Diactoros\Response\JsonResponse
{
    public function __construct($data) {
        parent::__construct(array(
            'success' => false,
            'response' => $data
        ));
    }
}