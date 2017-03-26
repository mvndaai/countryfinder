<?php

class Locate
{
    public function find($ip = '')
    {
        if (strlen($ip) == 0) {
            $dockerIPprefix = '172.';
            if (substr($_SERVER['REMOTE_ADDR'], 0, strlen($dockerIPprefix)) === $dockerIPprefix) {
                $ip = '40.131.216.0';
                print_r('IP is from Docker proxy, not client. Defaulting to '.$ip."\n");
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        }

        $apiky = '1fa8001dbc068cfed83fb2ec2c7773dc8eba6f5d';
        $xml = file_get_contents('http://api.db-ip.com/addrinfo?api_key='.$apiky.'&addr='.$ip);
        $json = json_decode($xml);
        $countryCode = $json->{'country'};

        $countryDetails = file_get_contents('https://restcountries.eu/rest/v2/alpha?codes='.$countryCode);
        $country = json_decode($countryDetails)[0]->{'name'};

        // print_r($_SERVER);
        // print_r($_SERVER['REMOTE_ADDR']);
        // print_r(getallheaders());
        // print_r(apache_response_headers());

        return $country;
    }
}
