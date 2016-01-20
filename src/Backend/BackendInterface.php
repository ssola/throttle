<?php

namespace Throttle\Backend;

use Throttle\Request\RequestInterface;

interface BackendInterface
{
    /**
     * @param RequestInterface $request
     * @return boolean
     */
    public function hit(RequestInterface $request);

    /**
     * @param RequestInterface $request
     * @return integer
     */
    public function count(RequestInterface $request);

    /**
     * @param RequestInterface $request
     * @return boolean
     */
    public function check(RequestInterface $request, $limit);

    /**
     * @param RequestInterface $request
     * @return boolean
     */
    public function clear(RequestInterface $request);
}
