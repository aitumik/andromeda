<?php

namespace Cants\PHPServer;


class Request {
    protected $method = null;
    protected $uri = null;
    protected $headers = [];
    protected $parameters = [];

    public function withHeadings($header)
    {
        $lines = implode("\n",$header);

        $method = null;

        $headers = [];

        foreach ($lines as $line)
        {
            $line = trim($line);
        }

        return new static($method);
    }

    public function method()
    {

    }
}
