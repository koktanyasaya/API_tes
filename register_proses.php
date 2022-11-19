<?php

$name = $_POST["name"];
echo $name;
echo"<br>";

$email = $_POST["email"];
echo $email;
echo"<br>";

$password = $_POST["password"];
echo $password;
echo"<br>";

$password_confirmation = $_POST["password_confirmation"];
echo $password_confirmation;
echo"<br>";


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'localhost:8000/api/register',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'name'=> $name, 
    'email'=> $email, 
    'password'=> $password, 
    'password_confirmation'=> $password_confirmation
),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);
curl_close($curl);

$result = json_decode($response);
header('location:login.html');
echo "pre";
print_r($result);
echo "</pre>";


?>