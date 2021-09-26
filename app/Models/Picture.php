<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Exception;
use Config;

class Picture
{   
    public $url_base = 'https://api.pexels.com/v1/';
   
    public $api_key;

    public function __construct()
    {
        // $this->api_key = $_ENV['PEXEL_API_KEY'];
        $this->api_key = Config::get('app.PEXEL_API_KEY');
    }

    public function search(Array $params){

        $endpoint = $this->url_base .'search?'. http_build_query(
            ['query' => $params['query'], 'per_page' => $params['per_page']]
        );
        $res = (array) [];


        try {
            $response = Http::withHeaders([
                'Authorization' => $this->api_key
            ])->acceptJson()->get($endpoint);

            $res = $this->customApiResponse($response);
        }catch (ConnectionException $e){
            $res['message'] = ['Whoops, looks like something went wrong',$e->getMessage()];
            $res['status'] = 500;
        }catch (RequestException $e){
            $res['message'] = ['Whoops, looks like something went wrong',$e->getMessage()];
            $res['status'] = 500;
        }catch (Exception $e){
            $res['message'] = [$e->getMessage(),$e->getLine(),$e->getFile()];
            $res['status'] = 500;
        }

        return $res;
    }

    private function customApiResponse($response){
        $res = (array) [];

        // Determine if the status code is >= 200 and < 300...
        $successful = $response->successful();
        
        $res['status'] = $response->status();

        if($successful){
            $res['data'] = $response->json();
            // $res->{'object'} = $response->object();
        }else if(!$successful){

            // Determine if the status code is >= 400...
            $failed = $response->failed();

            // Determine if the response has a 400 level status code...
            $clientError = $response->clientError();

            // Determine if the response has a 500 level status code...
            $serverError = $response->serverError();

            $statusCode = $response->status();
            if($clientError){
                $res['data'] = $response->json();
                $res['message'] = $response->json()['message'];
            }else if ($serverError) {
                $res['message'] = 'Vaya, parece que algo ha ido mal';
            }
        }

        return $res;
    }
}