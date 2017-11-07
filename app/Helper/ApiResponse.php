<?php
/**
 * @author David Bezalel Laoli <davidbezalel94@gmail.com>
 *
 * @since 11/6/17
 */

namespace App\Helper;


class ApiResponse
{

    public $data;
    public $code;
    public $message;

    public function __construct()
    {
        $this->data = new \stdClass();
        $this->message = '';
    }
}