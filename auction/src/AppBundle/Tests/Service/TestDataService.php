<?php

namespace tests\AppBundle\Service;



use AppBundle\Service\DateService;
use PHPUnit\Framework\TestCase;

class TestDataService extends TestCase
{
    public function testGetDay()
    {
        $dateService = new DateService();

        $this->assertEquals(19, $dateService->getDay(new \DateTime("2017-01-19")),"Powinno być 19");
    }
}