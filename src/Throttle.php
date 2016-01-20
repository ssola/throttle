<?php

namespace Throttle;

use Throttle\Backend\BackendInterface;
use Throttle\Request\RequestInterface;

class Throttle
{
    /**
     * @var BackendInterface
     */
    private $backend;

    /**
     * @param BackendInterface $backend
     */
    public function __construct(BackendInterface $backend)
    {
        $this->backend = $backend;
    }

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public function check(RequestInterface $request)
    {
        return $this->backend->check($request);
    }

    /**
     * @param RequestInterface $request
     * @return bool
     */
    public function hit(RequestInterface $request)
    {
        return $this->backend->hit($request);
    }
}
