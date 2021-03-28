<?php

namespace ClanCats\Station\PHPServer;

class Server
{
    protected $host = null;
    protected $port = null;
    protected $socket = null;

    protected function createSocket()
    {
        $this->socket = socket_create(AF_INET,SOCK_STREAM,1);
    }

    protected function bind()
    {
        if(!socket_bind($this->socket,$this->host,$this->port)) {
            throw new \Exception(sprintf("Could not bind %s:%s%s", $this->host, $this->port, socket_strerror(socket_last_error())));
        }
    }

    public function __construct($host,$port)
    {
        $this->port = (int) $port;
        $this->host = $host;

        $this->createSocket();
        //bind the socket
        $this->bind();
    }
}

