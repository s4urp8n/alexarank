<?php

namespace Zver;

class AlexaRank
{
    public static function getSiteGlobalRank($site)
    {
        $url = "https://www.alexa.com/siteinfo/" . $site;
        $response = Curl::get($url)->getContent();
        $matches = [];
        preg_match_all('/"siteinfo"\s*:\s*{\s*"rank"\s*:\s*{\s*"global"\s*:\s*\d+/', $response, $matches);
        if (empty($matches[0][0])) {
            return false;
        }
        $matches = explode(':', $matches[0][0]);
        $matches = array_pop($matches);
        return trim($matches);
    }
}