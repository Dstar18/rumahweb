<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use chriskacerguis\RestServer\RestController;
use GuzzleHttp\Client;

class Test1 extends CI_Controller {

    // function __construct(){
    //     parent::__construct();
    //     $this->load->helper(array('url', 'form'));
    //     $this->load->library('form_validation');
    // }




	public function configx()
	{
        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/', ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);
        return $response;
	}

    public function listUser(){
        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/', ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);
        $body = $response->getBody()->getContents();
        
        echo $body;
    }

    public function listUserById($id){
        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/'.$id, ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);

        $body = $response->getBody()->getContents();
        
        echo $body;
    }

    public function addUser(){
        $data = [
            "firstName" => $this->input->post("firstName", true),
            "lastName" => $this->input->post("lastName", true),
            "email" => $this->input->post("email", true)
        ];
        

        
        $client = new Client();

        $response = $client->request('POST','https://dummyapi.io/data/v1/user/create', [
            'headers' => [
                'app-id' => '63936041e9c316db39b01fa1',
                // 'Content-Type' => 'application/json'
            ],
             'form_params' => $data 
        ]);

        $body = $response->getBody()->getContents();

        echo $body;
    }

    public function editUser($id){
        $data = [
            "firstName" => $this->input->post("firstName", true),
            "lastName" => $this->input->post("lastName", true),
            "email" => $this->input->post("email", true)
        ];
        

        
        $client = new Client();

        $response = $client->request('PUT','https://dummyapi.io/data/v1/user/'.$id, [
            'headers' => [
                'app-id' => '63936041e9c316db39b01fa1',
                // 'Content-Type' => 'application/json'
            ],
             'form_params' => $data 
        ]);

        $body = $response->getBody()->getContents();

        echo $body;
    }

    public function deleteUserById($id){
        $client = new Client();
        $response = $client->request('DELETE', 'https://dummyapi.io/data/v1/user/'.$id, ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);

        $body = $response->getBody()->getContents();
        
        echo $body;
    }


    
}
