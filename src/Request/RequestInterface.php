<?php

namespace Throttle\Request;

/**
 * Interface RequestInterface
 * @package Throttle\Request
 */
interface RequestInterface
{
    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier);

    /**
     * @return string
     */
    public function getIdentifier();

    /**
     * @param string $resource
     */
    public function setResource($resource);

    /**
     * @return string
     */
    public function getResource();
}
