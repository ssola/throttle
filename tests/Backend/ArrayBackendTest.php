<?php

namespace Tests\Throttle\Backend;

use Throttle\Backend\ArrayBackend;
use Throttle\Request\Request;

class ArrayBackendTest extends \PHPUnit_Framework_TestCase
{
    public function testCountReturns0AfterBuildTheBackend()
    {
        $adapter = new ArrayBackend();
        $request = $this->createRequest();

        $this->assertEquals(0, $adapter->count($request));
    }

    public function testCountIncrementsAfterAHit()
    {
        $adapter = new ArrayBackend();
        $request = $this->createRequest();

        $this->assertEquals(0, $adapter->count($request));

        $adapter->hit($request);
        $this->assertEquals(1, $adapter->count($request));
    }

    public function testCounterIsRestartedAfterAClear()
    {
        $adapter = new ArrayBackend();
        $request = $this->createRequest();

        $adapter->hit($request);
        $this->assertEquals(1, $adapter->count($request));

        $adapter->clear($request);

        $this->assertEquals(0, $adapter->count($request));
    }

    public function createRequest()
    {
        $request = new Request();
        $request->setIdentifier('80:20:21:10');
        $request->setResource('test');

        return $request;
    }
}
