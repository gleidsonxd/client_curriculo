<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
	public function __construct(){}

	public function form(){	
		return view('usuario_form');
	}
	public function edit(){
     	if (session('logado')!= 1){
			return view("login");
		}
		$id = $_POST['usuarioid'];
	   	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	    // $pessoa = pessoa::find($id);
	        return view("usuarioEdit", array('result' => $result));
    }
	public function editpass($id){
     	if (session('logado')!= 1){
			return view("login");
		}
		
	   	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
	    
	    $result = curl_exec($ch);
	   // echo $result;
	    if (curl_errno($ch)) {
	        echo 'Error:' . curl_error($ch);
	    }
	    curl_close ($ch);
	        return view("usuarioEditPass", array('result' => $result));
    }
	public function profileUser($id){ #ADMIN OR OWNER
		if (session('logado')!= 1){
			return view("login");
		}
		$idu = session('id');//id user sessao
		// if (isset($idu)){
		// 	$u = "?usuarioid=".$idu;
		// }
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"id")){
			return view('usuarioProfile', array('result' => $result));
		}else{
			//return view('usuarioeors',array('erro'=>"Usuario não encontrado!"));
			echo "ERRO";
		}
		curl_close ($ch);
	}
	public function update(Request $req,$id){
		if (session('logado')!= 1){
			return view("login");
		}
		$input = $req->all();
		$u = "email=".@$input['email']."&name=".@$input['nome']."&tel=".@$input['tel']."&cpf=".@$input['cpf'];
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
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
			return view('usuarioProfile', array('result' => $result));
			// var_dump($result);
		}
		curl_close ($ch);

	}
	public function updatepass(Request $req,$id){
			
		$input = $req->all();
		
		$u = "password=".$input['newpass'];
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuariospass/".$id);
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
			return view('usuarioProfile', array('result' => $result));
			// var_dump($result);
		}
		curl_close ($ch);

	}
	public function list(){
        if (session('logado')!= 1){
			return view("login");
		}
		
        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY); 
		curl_setopt($ch, CURLOPT_USERPWD, env('USERPWD'));
		
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		if(strpos($result,"id")){
			return view('usuarioslist', array('result' => $result));
		}else{
			//return view('usuarioeors',array('erro'=>"Usuario não encontrado!"));
			echo "ERRO";
		}
		curl_close ($ch);
    }
	public function create(Request $request) {
		$input = $request->all();
        $u = "email=".@$input['email']."&password=".@$input['password']."&name=".@$input['nome']."&tel=".@$input['tel']."&cpf=".@$input['cpf'];

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios");
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
			return view("login");
		}
		curl_close ($ch);
	}
	public function delete(Request $req,$id){
		if (session('logado')!= 1){
			return view("login");
		}
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarios/".$id);
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
			var_dump($result);
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
		
		curl_setopt($ch, CURLOPT_URL, env('CONSTANT')."/usuarioslogin");
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
			// session()->flush();
			
			$id = @$res->usuario_id;
			$logado = @$res->logado;
			$email = @$res->usuario_email;
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
     	return view("login");
    }
	

}