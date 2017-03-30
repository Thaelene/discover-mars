<?php
// Set error array
$error_messages = array();

session_start();
// If it is empty, the date become : today - 3 weeks
$date = !empty($_GET['date']) ? date_format(new DateTime($_GET['date']), 'Y-m-d') : (date('Y-m-d', strtotime('-21 day')));
$camera = (isset($_GET['camera'])) ? $_GET['camera'] : ['FHAZ', 'RHAZ', 'NAVCAM'];
if ($camera == '') { $camera = ['FHAZ', 'RHAZ', 'NAVCAM']; };
$error_messages = array();


// Verify if curiosity was on Mars at the date to limit useless requests
if(!empty($_GET['date'])) {
    if (($_GET['date']) > (date('Y-m-d', strtotime('-21 day')))) {
        $error_messages['date'] = "The date must be anterior of to 3 weeks of today.";
    }
    else if (($_GET['date']) < ("2014-04-10")) {
        $error_messages['date'] = "The date must be posterior of the launch of all features of Curiosity.";
    }
}

// If they are no errors
if(empty($error_messages)) {

/* -----------------------
  Request the photo API
 -----------------------*/
    $url_photo = 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date='.$date.API_KEY;
    $path_photo = './cache/photo/'.md5($date); // Name of the file : searched date, hached

    // Analyse if the data is in the cache
    if(file_exists($path_photo)) {
        $forecast_photo = file_get_contents($path_photo);

        // If they are no photo
        if($forecast_photo == '{"errors":"No Photos Found"}') {
            $error_messages['date'] = "Aucune information n'a pu être récupérée à cette date";
        }
        
        else {
            // Convert in object
            $forecast_photo = json_decode($forecast_photo);
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
        
        else {
            file_put_contents($path_photo, $forecast_photo); // Create file in cache

            // Convert in object
            $forecast_photo = json_decode($forecast_photo);

            foreach ($forecast_photo->photos as $_forecast) {
                
                // Enter data in BDD
                $prepare = $pdo->prepare("INSERT INTO `photo-view` (`id`, `name`, `views`) VALUES (NULL, :views, '0')");
                $prepare->execute([':views' => $_forecast->img_src]);

                // Close request BDD
                $prepare->closeCursor();
            }

        }

        curl_close($curl);
    }


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
