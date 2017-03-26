<?php


class Locate
{
    public function find($ip = '40.131.216.250')
    {
        $apiky = '1fa8001dbc068cfed83fb2ec2c7773dc8eba6f5d';
        $xml = file_get_contents('http://api.db-ip.com/addrinfo?api_key='.$apiky.'&addr='.$ip);
        $json = json_decode($xml);
        $country = $json->{'country'};

        return $country;
    }
}
