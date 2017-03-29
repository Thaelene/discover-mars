<?php
// If it is empty, the date become : today - 3 weeks
$date = !empty($_GET['date']) ? date_format(new DateTime($_GET['date']), 'Y-m-d') : (date('Y-m-d', strtotime('-21 day')));
$error_messages = array();

// Verify if curiosity was on Mars at the date to limit useless requests
if(!empty($_GET['date'])) {
    if (($_GET['date']) > (date('Y-m-d', strtotime('-21 day')))) {
        $error_messages['date'] = "La date doit être inférieure à 3 semaines à la date d'aujourd'hui";
    }
    else if (($_GET['date']) < ("2014-04-10")) {
        $error_messages['date'] = "La date est inférieure à la mise en fonction de toutes les fonctionnalités de Curiosity";
    }
}

// If they are no errors
if(empty($error_messages)) {

/* -----------------------
  Request the photo API
 -----------------------*/
    $url_photo = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date='.$date.'&api_key=mAf0G7pDruydaGbfRmtxAIVNUCaRWRttre1z2RZB';
    $path_photo = './cache/photo/'.md5($date); // Name of the file : searched date, hached    
    
    // Analyse if the data is in the cache
    if(file_exists($path_photo)) {
        $forecast_photo = file_get_contents($path_photo);
        
        // If they are no photo
        if($forecast_photo == '{"errors":"No Photos Found"}') {
            $error_messages['date'] = "Aucune information n'a pu être récupérée à cette date";
        }
    }

    // With API
    else {
        // Verify if they are content
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url_photo);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        $forecast_photo = curl_exec($curl);

        if($forecast_photo === '{"errors":"No Photos Found"}') {
            $error_messages['date'] = "Aucune information n'a pu être récupérée à cette date";
        }

        file_put_contents($path_photo, $forecast_photo); // Create file in cache
        
        curl_close($curl);
    }

    // Convert in object
    $forecast_photo = json_decode($forecast_photo);


/* -----------------------
  Request the info API
 -----------------------*/

    $url_info = 'http://marsweather.ingenology.com/v1/archive/?terrestrial_date='.$date.'&format=json';
    $path_info = './cache/info/'.md5($date); // Name of the file : searched date, hached


    // With cache
    if(file_exists($path_info)) {
        $forecast_info = file_get_contents($path_info);
    }

    // With API
    else {
        $forecast_info = file_get_contents($url_info);

        file_put_contents($path_info, $forecast_info); // Create file in cache
    }

    // Convert in object
    $forecast_info = json_decode($forecast_info);
    
}