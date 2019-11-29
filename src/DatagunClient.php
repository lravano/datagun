<?php

namespace Made\Datagun;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class DatagunClient{
    
    
    protected $client;
           
    public function __construct($base_uri, $timeout) {    
        
        if(!isset($this->client)){
            $this->client = new Client([
                // Base URI is used with relative requests
                'base_uri' => $base_uri,
                // You can set any number of default request options.
                'timeout'  => $timeout,
            ]);
        }
    
    }
    
    
    public function getPagePDF($url,$width,$height){
        
               
        $body = new \stdClass();
        
        //Setting Body JSON for Rquest
        $body->url = $url;
        $body->width = $width;
        $body->height = $height;
        $body->scripts = true;
        $body->media = true;
        $body->screen = true;
        $body->format = "";

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/data/pdf', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();
                
    }
    
    public function getPageJSON($url,$width,$height,$scripts,$media,$schema,$auth = null,$cmd = null){
        
        $body = new \stdClass();
        
        $body->url = $url;
        $body->width = $width;
        $body->height = $height;
        $body->scripts = $scripts;
        $body->media = $media;
        
        if(isset($auth))
            $body->auth = $auth;
        if(isset($cmd))
            $body->cmd = $cmd;
        
        $body->schemaGroup = $schema;

        $bodyJSON = json_encode($body);
        
        $headers = ['Content-Type' => 'application/json' ];
        
        $request = new Request('POST', '/api/v1/data/json', $headers, $bodyJSON);
        $response = $this->client->send($request);
    
        return $response->getBody()->getContents();               
    }
 
}

