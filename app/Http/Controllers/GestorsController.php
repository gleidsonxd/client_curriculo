<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestorsController extends Controller
{
    public function __construct(){}
    
    public function form(){	
        return view('gestor_form');
    }
    public function accountGestor($id){
        if (session('logado')!= 1){
			return view("login");
		}
		$idu = session('id');//id user sessao

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"id")){
			return view('gestorAcc', array('result' => $result));
		}else{
			//return view('usuarioeors',array('erro'=>"Usuario não encontrado!"));
			echo "ERRO";
		}
		curl_close ($ch);
    }
    public function list(){
        if (session('logado')!= 1){
			return view("login");
		}
		
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"id")){
			return view('gestorslist', array('result' => $result));
		}else{
			//return view('usuarioeors',array('erro'=>"Usuario não encontrado!"));
			echo "ERRO";
		}
		curl_close ($ch);
    }
    public function edit(){
     	if (session('logado')!= 1){
			return view("login");
		}
		$id = $_POST['gestorid'];
	   	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	        return view("gestorEdit", array('result' => $result));
    }
    public function editpass($id){
     	if (session('logado')!= 1){
			return view("login");
		}
		
	   	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	        return view("gestorEditPass", array('result' => $result));
    }
    public function create(Request $request) {
		$input = $request->all();
        $u = "email=".@$input['email']."&password=".@$input['password']."&name=".@$input['nome'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
		curl_setopt($ch, CURLOPT_POST, 1);
		$result = curl_exec($ch);
		#	echo $result;
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}else{
			return view("index");
		}
		curl_close ($ch);
	}
    public function update(Request $req,$id){
		if (session('logado')!= 1){
			return view("login");
		}
		$input = $req->all();
		$u = "email=".@$input['email']."&name=".@$input['nome'];
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        // return view('usuarioeors',array('erro'=>"Ocorreu um erro ao editar o Gestor!"));
	    }else{
			return view('gestorAcc', array('result' => $result));
			// var_dump($result);
		}
		curl_close ($ch);

	}
    public function updatepass(Request $req,$id){
			
		$input = $req->all();
		
		$u = "password=".$input['newpass'];
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestorspass/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, "$u");
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	        #return view('usuarioeors',array('erro'=>"Ocorreu um erro ao editar o Usuário!"));
	    }else{
			return view('gestorAcc', array('result' => $result));
			// var_dump($result);
		}
		curl_close ($ch);

	}
    public function delete(Request $req,$id){
		if (session('logado')!= 1){
			return view("login");
		}
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestors/".$id);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    $result = curl_exec($ch);
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	       # return view('usuarioeors',array('erro'=>"Ocorreu um erro ao remover o Usuário!"));
	    }else{
	    	#return view('usuarioeors',array('sucesso'=>"Usuário removido com sucesso!"));
			// var_dump($result);
			$req->session()->flush();
			return view("index");
	    }
	    curl_close ($ch);
	}
    public function login(){
		
     	$e = $_POST['email'];
		$p ="".$_POST['password'];
		 		
		#ENV
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/gestorslogin");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "email=".$e."&password=".$p);
		curl_setopt($ch, CURLOPT_POST, 1);
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close ($ch);
		$res = json_decode($result);
		
		// var_dump($res);
		if (@$res->logado == 1) {

			$id = @$res->gestor_id;
			$logado = @$res->logado;
			$email = @$res->gestor_email;
			$type = @$res->type;

			session(['logado' => $logado]);
			session(['id' => $id]);
			session(['email' => $email]);
			session(['type' => $type]);
        }	
		else{
			$logado = 0;
            session(['logado' => $logado]);
            return view("login");
		}
		return view("index");
		
    }
    public function logout(Request $req){
     	$req->session()->flush();
     	return view("logingestor");
    }
}
