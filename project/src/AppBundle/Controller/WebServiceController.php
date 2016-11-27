<?php
echo "1";

$url = 'http://st/api/service?fct=to&target=app&targetInstance=2';
 
$var = curl_init($url);

echo "2";
curl_setopt($var, CURLOPT_URL, "http://st/api/service?fct=to&target=app&targetInstance=2");
$data = array(
"target" => "app",
"targetInstance" => 2,
"sender" => "App3",
"instanceID" => "9",
"data" => array(
                'address' => '127.0.0.1',
                'agenda' => array(),
            )


);

echo "3";
$request = "data=".json_encode($data);
curl_setopt($var, CURLOPT_HEADER, 0);
curl_setopt($var, CURLOPT_CUSTOMREQUEST, "POST");

echo "4";                                                                     
curl_setopt($var, CURLOPT_POSTFIELDS, $request);
curl_setopt($var, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($var);
$err = curl_error($var);
echo"toto";
curl_close($var);
var_dump($result);
echo $err;

?>
