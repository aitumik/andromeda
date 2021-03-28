<?php

namespace Response;

class Response
{
    protected static $statusCodes = [
        // Informational 1xx
        100 => "Continue",
        101 => "Switching Protocols",

        // Success 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No content',
        206 => 'Partial Content',

        //Redirection 3xx
        300 => 'Multiple Choices'
    ];
}

