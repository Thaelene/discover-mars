<?php include 'handle.php'; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API JS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="#" method="get">
        <input type="date" name="date" value="<?= $date ?>" required name="date"> <!-- Select the date -->

        <select name="camera" size="1"> <!-- Select the camera and display active camera in the button -->
            <option <?php if ($camera == "") { ?>selected<?php } ?> value="">All</option>
            <option <?php if ($camera == "FHAZ") { ?>selected<?php } ?> value="FHAZ">FHAZ</option>
            <option <?php if ($camera == "RHAZ") { ?>selected<?php } ?> value="RHAZ">RHAZ</option>
            <option <?php if ($camera == "NAVCAM") { ?>selected<?php } ?> value="NAVCAM">NAVCAM</option>
        </select>
        <input type="submit">
    </form>
    
    <a href="page.php">Page différente</a>

    <p class="error"><?= array_key_exists('date', $error_messages) ? $error_messages['date'] : '' ?></p> <!-- Error messages when date is wrong -->

    <h1>Date : <?= Date('d/m/Y', strtotime($date)) ?></h1>

    <!-- If they are no error -->
    <?php if(empty($error_messages)) { foreach ($forecast_info->results as $_forecast): ?> <!-- Display each infos of Mars -->
        <div>
            <br><strong>Sol : </strong><span><?= $_forecast->sol ?></span>
            <br><strong>Température minimale : </strong><span><?= $_forecast->min_temp ?></span>
            <br><strong>Température maximale : </strong><span><?= $_forecast->max_temp ?></span>
            <br><strong>Pression : </strong><span><?= $_forecast->pressure ?></span>
            <br><strong>Pression (descriptif) : </strong><span><?= $_forecast->pressure_string ?></span>
            <br><strong>Opacité de l'atmosphère : </strong><span><?= $_forecast->atmo_opacity ?></span>
            <br><strong>Lever du soleil : </strong><span><?= substr($_forecast->sunrise, 11, -4) ?></span> <!-- Formate this element for a better readability -->
            <br><strong>Coucher du soleil : </strong><span><?= substr($_forecast->sunset, 11, -4) ?></span> <!-- Formate this element for a better readability -->
        </div>
    <?php endforeach; ?>

    <?php foreach ($forecast_photo->photos as $_forecast): ?> <!-- Display each photo infos -->
        <?php if (($_forecast->camera->name == $camera) || (($_forecast->camera->name == $camera[0]) || ($_forecast->camera->name == $camera[1]) || ($_forecast->camera->name == $camera[2]))) { ?>
        <div>
            <br><strong>Image: </strong><img src="<?= $_forecast->img_src ?>">
            <br><strong>Info: </strong><span>Photographie prise en sol <strong><?= $_forecast->sol ?></strong> (approximativement le <strong><?= Date('d/m/Y', strtotime($date)) ?></strong>) à l'aide de la caméra <strong><?= $_forecast->camera->name ?></strong>.</span>
        </div>
        <?php } ?>
    <?php endforeach; } ?>
</body>
</html>
