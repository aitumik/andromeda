<?php
$server = new Server("localhost",80);

$server->listen(function (Request $request) {
    return new Response("Hello Dude");
});

