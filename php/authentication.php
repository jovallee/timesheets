<?php

session_start();
if(isset($_POST['username']))
{
    $results = auth($_POST['username'], $_POST['password']);
    if($results > 0 )
    {
        // auth okay, setup session
        $_SESSION['userID'] = $results;
        // redirect to required page
        header( "Location: timesheet.php" );
     } else {
        // didn't auth go back to loginform
        header( "Location: index.php" );
     }
 }

function auth($username, $password){
    
    $service_url = 'http://localhost:5000/FeuilleDeTemps/api/v1.0/auth/' . $username;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $service_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERPWD, "4my3QHAjK2QpAGUXKREnpzdVunzx:Y2Qex9hrR9kEPBWtPQwCeqfqPRCe");
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $curl_response = curl_exec($curl);
    if ($curl_response === false) 
    {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
    }
    curl_close($curl);
    $decoded = json_decode($curl_response, true);
    if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') 
    {
        die('error occured');
    }
    
    if($password == $decoded['password'])
    {
        return($decoded['id']);
    } else {
        return(-1);
    } 
}
    
?>