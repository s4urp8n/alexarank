<?php

namespace Zver;

class GoogleSafeBrowsing
{
    public static function getUnsafeSites(array $sites, $apiKey)
    {
        $url = "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=" . $apiKey;
        $data = [
            "threatInfo" => [
                "threatTypes"      => [
                    "MALWARE",
                    "SOCIAL_ENGINEERING",
                    "UNWANTED_SOFTWARE",
                    "POTENTIALLY_HARMFUL_APPLICATION",
                ],
                "platformTypes"    => ["WINDOWS"],
                "threatEntryTypes" => ["URL"],
                "threatEntries"    => array_map(function ($site) {
                    return ["url" => $site];
                }, array_unique($sites)),
            ],
        ];

        $response = Curl::json($url, $data);

        if ($response->getResponseCode() != 200) {
            return null;
        }

        $matches = $response->getContent();
        if (!array_key_exists('matches', $matches)) {
            return [];
        }
        return array_map(function ($match) {
            return $match['threat']['url'];
        }, $matches['matches']);
    }
}