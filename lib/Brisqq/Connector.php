<?php

namespace Brisqq;

use Brisqq\Request;

class Connector
{

    /**
     * @var \Brisqq\Request
     */
    protected $dataRequest;


    public function __construct(
        Request $dataRequest
    )
    {
        $this->dataRequest = $dataRequest;
    }


    /**
     * Get Brisqq Api Token
     * @param $tokenUrl
     * @param $headers
     * @param $parameters
     * @return mixed
     */
    public function getBrisqqToken($tokenUrl , $headers , $parameters = []){

        return $this->dataRequest->getRequests($tokenUrl , $headers , $parameters);

    }

    /**
     * Get Brisqq Api pickup locations
     * @param $locationsUrl
     * @param $headers
     * @param $parameters
     * @return mixed
     */
    public function getLocations($locationsUrl , $headers , $parameters = null){
        return $this->dataRequest->getRequests($locationsUrl , $headers , $parameters);
    }

}