<?php

class SampleTest extends PHPUnit\Framework\TestCase
{
//    public function testGoogle()
//    {
//        $sites = [
//            "veriprtroutg.com",
//            "notify-system.com",
//            "special-offers.online",
//            "tirsmile.pro",
//        ];
//        $expected = ["tirsmile.pro"];
//        $unsafe = \Zver\GoogleSafeBrowsing::getUnsafeSites($sites, '--secret--');
//        $this->assertEquals($unsafe, $expected);
//    }

    public function testAlexarank()
    {
        $rank = \Zver\AlexaRank::getSiteGlobalRank('pornhub.com');
        $this->assertEquals(46, $rank);
    }
}