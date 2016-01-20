<?php

namespace Throttle\Request;

class Request implements RequestInterface
{
    private $identifier;
    private $resource;

    /**
     * @inheritdoc
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @inheritdoc
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @inheritdoc
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @inheritdoc
     */
    public function getResource()
    {
        return $this->resource;
    }
}