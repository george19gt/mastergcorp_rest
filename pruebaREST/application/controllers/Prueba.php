<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once( APPPATH.'/libraries/REST_Controller.php' );
use Restserver\libraries\REST_Controller;

class Prueba extends REST_Controller {

	public function __construct(){

	    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
	    header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	    header("Access-Control-Allow-Origin: *");

	    parent::__construct();
	    $this->load->database();

  	}


  	public function credential_put(){

  		$key_storage = "abc";


	    if($this->put('key') == $key_storage ){  
		      $respuesta = array(
		                    'error' => TRUE,
		                    'message'=> "key is already ",
		                    'status' => REST_Controller::HTTP_FORBIDDEN
	          );
	      $this->response($respuesta );
	      return;
	    }else{
	    	 $respuesta = array(
		                    'error' => FALSE,
		                    'message'=> "key is not present",
		                    'status' => REST_Controller::HTTP_NO_CONTENT
	          );
	    	$this->response($respuesta);
	      return;
	    }

  	}

  	public function message_post(){

  		$data = $this->post(); 

		if( !isset( $data["msg"] ) || strlen( $data['msg'] )== 0 ){ //msg
	      $respuesta = array(
	                    'error' => TRUE,
	                    'message'=> "msg missing"
	                  );
	      $this->response( $respuesta, REST_Controller::HTTP_BAD_REQUEST );
	      return;
	    }

	    if( !isset( $data["tags"] ) || strlen( $data['tags'] )== 0 ){ //tags
	      $respuesta = array(
	                    'error' => TRUE,
	                    'message'=> "tags missing"
	                  );
	      $this->response( $respuesta, REST_Controller::HTTP_BAD_REQUEST );
	      return;
	    }

        $respuesta = array(
      		'error'=>FALSE,
     		'message' => "datos",
     		'status'=> REST_Controller::HTTP_OK
    	);

    	$this->response($respuesta);


  	}

  	public function message_get($id = "0"){

 		if( $id == "0"){
	      $respuesta = array(
	                    'error' => TRUE,
	                    'mensaje'=> "id missing"
	                  );
	      $this->response( $respuesta, REST_Controller::HTTP_BAD_REQUEST );
	      return;
	    }
	

        $respuesta = array(
      		'error'=>FALSE,
     		'dato' => "Id",
     		'status'=>REST_Controller::HTTP_OK
    	);

    	$this->response($respuesta);


  	}

  	public function messages_get($tag = "0"){


  		if( $tag == "0"){
	      $respuesta = array(
	                    'error' => TRUE,
	                    'mensaje'=> "tag missing"
	                  );
	      $this->response( $respuesta, REST_Controller::HTTP_BAD_REQUEST );
	      return;
	    }
	

        $respuesta = array(
      		'error'=>FALSE,
     		'dato' => "List",
     		'status'=>REST_Controller::HTTP_OK
    	);

    	$this->response($respuesta);

  	}

}