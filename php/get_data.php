<?php

function get_employees(){
    $service_url = 'http://localhost:5000/timesheets/api/v1.0/employes';
    return(call_api_and_return_decoded_response($service_url));
}

function get_projects(){
    $service_url = 'http://localhost:5000/timesheets/api/v1.0/projets';
    return(call_api_and_return_decoded_response($service_url));
}

function get_timesheets_from_start_date($id, $start_date){
    $service_url = 'http://localhost:5000/timesheets/api/v1.0/timesheets/' . $id . '/' . $start_date;
    return(call_api_and_return_decoded_response($service_url));
}

function call_api_and_return_decoded_response($service_url) {

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
    return($decoded);
}


?>