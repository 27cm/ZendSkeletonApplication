<?php

namespace ZendSkeletonApplicationTest;

use ZendSkeletonApplicationTest\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testSample()
    {
        $this->assertInstanceOf('Zend\Di\LocatorInterface', $this->getLocator());
    }
}
