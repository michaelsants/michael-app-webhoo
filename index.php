<?php

$method = $_SERVER['REQUEST_METHOD'];
if($method =="POST"){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$text = $json->result->parameters->text;
	
	switch($text){
	case 'oi';
		$speech = "Bem vindo ao Restaurante de Anderson, gostaria de fazer algum pedido? ESCREVA - PEDIDO";
		break;
	case 'fim'
		$speech = "Acabou teste PHP";
		break;
	case 'PEDIDO'
		$speech = "Escolha Pizza, Acaraje";
		break;

	default;
		$speech = "Desculpa, não entendemos.";
		break;

	}

	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);


}else{
	echo "Metodo nao funcionou";
}

?>