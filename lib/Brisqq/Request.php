<?php

namespace Brisqq;

class Request
{

    /**
     * @param $url
     * @param $headers
     * @param $parameters
     * @return mixed
     */
    public function getRequests($url , $headers , $parameters = []){

        $data = http_build_query($parameters);
        $url = $url."?".$data;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $result = json_decode($response);
        curl_close($curl); // Close the connection
        return $result;
    }


    /**
     * @param $url
     * @param $headers
     * @param $parameters
     * @return mixed
     */
    public function postRequests($url , $headers , $parameters = []){


        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = json_encode($parameters);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl);
        $result = json_decode($response , true);
        curl_close($curl); // Close the connection

        return $result;
    }

}