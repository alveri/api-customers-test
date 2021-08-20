<?php


namespace App\Service;


class RandomUserClient
{
    private const URL = 'https://randomuser.me/api';

    public function getCustomers(string $country, int $numberToImport): array
    {
        $ch = curl_init(sprintf('%s/?nat=%s&results=%s', self::URL, strtolower($country), $numberToImport));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        if($response === false)
        {
            throw new \Exception(sprintf('Error: %s', curl_error($ch)));

        }

        $result = json_decode($response, true);

        return $result['results'];
    }
}
