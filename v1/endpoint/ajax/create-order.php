<?php
session_start();

function sendToTele($messaggio, $token, $chatID){
	$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
	$url = $url . "&text=" . urlencode($messaggio);
	$ch = curl_init();
	$optArray = array(
	  CURLOPT_URL => $url,
	  CURLOPT_RETURNTRANSFER => true
	);
	curl_setopt_array($ch, $optArray);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
  }

$content = trim(file_get_contents("php://input"));

$jsondecoded = json_decode($content, true);
if (! empty($jsondecoded)) {
    $name = $jsondecoded["name"];
    $message = $jsondecoded["message"];
    $itemArrayDecoded = $jsondecoded["items"];
    $tableNum = $jsondecoded["tableNum"];
    // $customerDetailsArray = array(
    //     "name" => filter_var($jsondecoded["name"], FILTER_SANITIZE_STRING),
    //     "message" => filter_var($jsondecoded["message"], FILTER_SANITIZE_STRING),
    // );
    $_SESSION["name"] = $name;
    $_SESSION["message"] = $message;
    $_SESSION["itemArrayDecoded"] = array(
        "orders" => $itemArrayDecoded,
    );
    $_SESSION["tableNum"] = $tableNum;
    
    
    
    $msg = "Table No. : $tableNum \n";
    $msg .= "Full Name : $name \n";
    $msg .= "\n";
    $msg .= $itemArrayDecoded[0][0]['name']. "(".$itemArrayDecoded[0][0]['size'].")". "\n";
    $msg .= $itemArrayDecoded[0][1]['name']. "(".$itemArrayDecoded[0][1]['size'].")". "\n";
    $msg .= $itemArrayDecoded[0][2]['name']. "(".$itemArrayDecoded[0][2]['size'].")". "\n";
    $msg .= $itemArrayDecoded[0][3]['name']. "(".$itemArrayDecoded[0][3]['size'].")". "\n";
    $msg .= "Instruction : $message \n";
    
    if (sendToTele($msg, '6192222766:AAG74nHMdz1rMf2CXSrxypuQ7uWKxSvK6eE', '-1001755290116')) {
        
        $file=fopen("../../logs/results.log","a");
        fwrite($file,$msg."\n");
        fclose($file);
        
        echo json_encode(array(
            'status' => 'ok',
            'username' => $name,
            'tableNum' => $tableNum,
            'orders' => $itemArrayDecoded
        ));
    }else{
        echo json_encode(array(
            'status' => 'notok'
        ));
    }
    // $_SESSION["foodboard-cart"] = array(
    //     "items" => $itemArrayDecoded,
    //     "customerDetails" => $customerDetailsArray,
    //     "shippingAmount" => $shippingTotal
    // );

}

