<?php

namespace Throttle\Backend;

use Throttle\Request\RequestInterface;

class ArrayBackend implements  BackendInterface
{
    private $storage = [];

    /**
     * @inheritdoc
     */
    public function hit(RequestInterface $request)
    {
        if (!isset($this->storage[$request->getIdentifier()])) {
            $this->storage[$request->getIdentifier()] = 0;
        }

        $this->storage[$request->getIdentifier()]++;

        return true;
    }

    /**
     * @inheritdoc
     */
    public function count(RequestInterface $request)
    {
        if (!isset($this->storage[$request->getIdentifier()])) {
            return 0;
        }

        return $this->storage[$request->getIdentifier()];
    }

    /**
     * @inheritdoc
     */
    public function check(RequestInterface $request, $limit)
    {
        if ($this->storage[$request->getIdentifier()] > $limit) {
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function clear(RequestInterface $request)
    {
        if (isset($this->storage[$request->getIdentifier()])) {
            unset($this->storage[$request->getIdentifier()]);

            return true;
        }

        return false;
    }
}
