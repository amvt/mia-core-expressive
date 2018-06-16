<?php namespace Mobileia\Expressive\Diactoros;

class MiaJsonResponse extends \Zend\Diactoros\Response\JsonResponse
{
    public function __construct($data) {
        parent::__construct(array(
            'success' => true,
            'response' => $data
        ));
    }
}