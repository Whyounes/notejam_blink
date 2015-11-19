<?php

namespace app\tests;


use blink\http\Request;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $response = $this->app->handleRequest(new Request(['path' => '/']));
        $this->assertEquals('Hello world, Blink.', $response->content());
    }
}
