<?php

namespace Cants\PHPServer;

class Request {

    protected $method = null;
    protected $uri = null;
    protected $headers = [];
    protected $parameters = [];

    public function withHeaderString($header)
    {
        $lines = explode("\n",$header);

        //extract the method and the uri
        @list($method,$uri) = explode(' ',array_shift($lines));

        $headers = [];

        foreach ($lines as $line)
        {
            $line = trim($line);
            if( strpos($line,": ") !== false)
            {
                list($key,$value) = explode(": ",$line);
                $headers[$key] = $value;
            }
        }

        return new static($method,$uri,$headers);
    }

    public function __construct($method,$uri,$headers=[])
    {
        $this->headers = $headers;
        $this->method = strtoupper($method);

        //split uri and parameters string
        @list($this->uri,$params) = explode('?',$uri);

        parse_str($params,$this->parameters);
    }

    public function method()
    {
        return $this->method;
    }

    public function uri()
    {
        return $this->uri;
    }

    public function header($key,$default)
    {
        if (!isset($this->headers[$key]))
        {
            return $default;
        }

        return $this->headers[$key];
    }
}
