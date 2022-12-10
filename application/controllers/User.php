<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class User extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

	public function viewAll(){
		$client = new Client();
		$response = $client->request('GET', 'https://dummyapi.io/data/v1/user/', ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);
        $body = $response->getBody()->getContents();

		echo $body;
		// echo json_encode ($body);
		// $this->load->view('user/user_data', $data);
	}

	public function viewUser(){
		$this->load->view('user/user_data');
	}

	public function viewRegister(){
		$this->load->view('register');
	}

	public function addUser(){
		$data = [
            "firstName" => $this->input->post("firstName", true),
            "lastName" => $this->input->post("lastName", true),
            "email" => $this->input->post("email", true),
			"password" => $this->input->post("password", true)
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

        if($response->getStatusCode() == '200'){
			$data = array(
				'status' => 'sukses',
				'message' => 'Berhasil Di Ditambah'
			);
			echo "<script>
						alert('Data Berhasil Ditambah');
						window.location='".site_url('Auth')."';
					</script>";
		}
	}

	// public function viewUserEdit(){
	// 	$this->load->view('user/user_edit');
	// }

	public function viewDetail($id){
        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/'.$id, ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);

        $body = $response->getBody()->getContents();
		// $zx['zxx'] =$body;
		$x['dataxx'] = json_decode($body);
        $this->load->view('user/user_detail', $x);
		// echo json_encode($x);
        // echo $body;
    }

	public function viewEdit($id){
        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/'.$id, ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);

        $body = $response->getBody()->getContents();
		// $zx['zxx'] =$body;
		$x['dataxx'] = json_decode($body);
        $this->load->view('user/user_edit', $x);
		// echo json_encode($x);
        // echo $body;
    }

	public function editUserx(){
		$id = $this->input->post("id", true);
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

        if($response->getStatusCode() == '200'){
			$data = array(
				'status' => 'sukses',
				'message' => 'Berhasil Di Perbarui'
			);
			echo "<script>
						alert('Data Berhasil Diperbarui');
						window.location='".site_url('User/viewUser')."';
					</script>";
		}
    }


	public function editUser(){
		$id = $this->input->post("id", true);
		$data = [
			
            "firstName" => $this->input->post("firstName", true),
            "lastName" => $this->input->post("lastName", true),
            "email" => $this->input->post("email", true),
			"password" => $this->input->post("password", true)
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

        if($response->getStatusCode() == '200'){
			$data = array(
				'status' => 'sukses',
				'message' => 'Berhasil Di Ditambah'
			);
			echo "<script>
						alert('Data Berhasil Ditambah');
						window.location='".site_url('Auth')."';
					</script>";
		}
	}

	public function processLogin(){
		$email = $this->input->post("email", true);
		$password = $this->input->post("password", true);

        $client = new Client();
        $response = $client->request('GET', 'https://dummyapi.io/data/v1/user/', ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);
		
        $body= $response->getBody()->getContents();

		$zx = json_decode($body, true);

		$arrayx = array();
        foreach($zx as $value){
			$arrayx[] = $value;
			// print_r($value['id']);
			
			// echo $value['data']->id;
			
		}

		foreach($arrayx as $value1){
			// $arrayx = $value1;
			print_r($value1);
			
			// echo $arrayx;
			
		}

		// foreach($value as $val){
		// 	print_r($val);
		// }
		// print_r($body['data']['id']);
        // echo json_encode($arrayx);
    }	
		


	public function deleteUserID($id){
		$client = new Client();
        $response = $client->request('DELETE', 'https://dummyapi.io/data/v1/user/'.$id, ['headers' => ['app-id' => '63936041e9c316db39b01fa1']]);

        $body = $response->getBody()->getContents();
		if($response->getStatusCode() == '200'){
			$data = array(
				'status' => 'sukses',
				'message' => 'Berhasil Di hapus'
			);
			echo "<script>
						alert('Data Berhasil Dihapus');
						window.location='".site_url('User/viewUser')."';
					</script>";
		}
        
        // echo $body;
	}
}
