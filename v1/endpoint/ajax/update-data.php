<?php
session_start();

$content = trim(file_get_contents("php://input"));

$jsondecoded = json_decode($content, true);
if (! empty($jsondecoded)) {
    $username = $jsondecoded["username"];
    $tableNum = $jsondecoded["tableNum"];
    $filedir = __DIR__ .'./../../../data/attendants.json';
    $jsonString = file_get_contents($filedir);
    $data = json_decode($jsonString, true);
    
    $data[$tableNum]['data'][$username] = "Ordered";
    $newJsonString = json_encode($data);
    //file_put_contents($filedir, $newJsonString);

    if (file_put_contents($filedir, $newJsonString)) {
        
        echo json_encode(array(
            'status' => 'ok'
        ));
    }else{
        echo json_encode(array(
            'status' => 'notok'
        ));
    }
}

?>