<?php

namespace Zver;

class AlexaRank
{
    public static function getSiteGlobalRank($site)
    {
        $url = "https://www.alexa.com/siteinfo/" . $site;
        $response = Curl::get($url);
        if ($response->getResponseCode() !== 200) {
            return null;
        }
        $matches = [];
        preg_match_all('/"siteinfo"\s*:\s*{\s*"rank"\s*:\s*{\s*"global"\s*:\s*\d+/', $response->getContent(), $matches);
        if (empty($matches[0][0])) {
            return null;
        }
        $matches = explode(':', $matches[0][0]);
        $matches = array_pop($matches);
        return trim($matches);
    }
}