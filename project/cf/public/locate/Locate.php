<?php


class Locate
{
    public function find($ip = '40.131.216.0')
    {
        $apiky = '1fa8001dbc068cfed83fb2ec2c7773dc8eba6f5d';
        $xml = file_get_contents('http://api.db-ip.com/addrinfo?api_key='.$apiky.'&addr='.$ip);
        $json = json_decode($xml);
        $countryCode = $json->{'country'};

        $countryDetails = file_get_contents('https://restcountries.eu/rest/v2/alpha?codes='.$countryCode);
        $country = json_decode($countryDetails)[0]->{'name'};

        print_r($_SERVER);
        print_r(getallheaders());
        print_r(apache_response_headers());

        return $country;
        //return $_SERVER['REMOTE_ADDR'];
    }
}
