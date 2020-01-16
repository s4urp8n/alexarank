<?php

class SampleTest extends PHPUnit\Framework\TestCase
{
    public function testSample()
    {
        $rank = \Zver\AlexaRank::getSiteGlobalRank('pornhub.com');
        $this->assertEquals(46, $rank);
    }
}