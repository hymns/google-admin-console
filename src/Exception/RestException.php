<?php

namespace Hymns\GoogleAdminConsole\Exception;

class RestException extends \Exception
{   public function __construct($message, $code = 0, \Exception $previous = null)
    {
        $json = json_decode($message);
        parent::__construct($json->error->message, $code, $previous);
    }
}
