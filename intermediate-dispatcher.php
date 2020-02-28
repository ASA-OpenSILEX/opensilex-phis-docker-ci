<?php

//******************************************************************************

// Copyright © INRAE 2020
// Creation date: 20 feb. 2020
// Author: IRATNI Amine (ASA - Advanced Solutions Accelerator) airatni@asa-sas.com 
//******************************************************************************
$repository = $_GET['repository'];
$sha = $_GET['sha'];
$ref = $_GET['ref'];
$repo__clone_url = $_GET['repo__clone_url'];

$curl = curl_init();

//------------------------------------------- CHANGE ME -------------------------------------------------
$username = "ASA-OpenSILEX";
$password_github_token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"; // Generated on Github settings -> Developer settings -> Personal access tokens
$auth = base64_encode($username . ":" . $password_github_token);
$url_target_dispatch_repo = "https://api.github.com/repos/ASA-OpenSILEX/opensilex-phis-docker-ci/dispatches";
//-------------------------------------------------------------------------------------------------------
curl_setopt_array($curl, array(
    CURLOPT_URL => $url_target_dispatch_repo,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\n\"event_type\": \"build_data\",\n\"client_payload\":{\"repository\":\"$repository\", \"sha\":\"$sha\", \"ref\":\"$ref\", \"repo__clone_url\":\"$repo__clone_url\" }\n}\n",
    CURLOPT_HTTPHEADER => array(
        "Accept: application/vnd.github.everest-preview+json",
        "Authorization: Basic $auth",
        "Content-Type: application/json",
        "Host: api.github.com",
        "User-Agent:ASA-trigger-dispatcher-v1"
    )
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
