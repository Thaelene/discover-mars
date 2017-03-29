<?php
include 'handle.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>API JS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="#" method="get">
        <input type="date" name="date" value="<?= $date ?>" required name="date">
        <input type="submit">
    </form>
    <p class="error"><?= array_key_exists('date', $error_messages) ? $error_messages['date'] : '' ?></p> <!-- Error messages -->

    <h1>Date : <?= Date('d/m/Y', strtotime($date)) ?></h1>

    <?php if(empty($error_messages)) { foreach ($forecast_info->results as $_forecast): ?> <!-- Display each infos -->
        <div>
            <br><strong>Sol : </strong><span><?= $_forecast->sol ?></span>
            <br><strong>Température minimale : </strong><span><?= $_forecast->min_temp ?></span>
            <br><strong>Température maximale : </strong><span><?= $_forecast->max_temp ?></span>
            <br><strong>Pression : </strong><span><?= $_forecast->pressure ?></span>
            <br><strong>Pression (descriptif) : </strong><span><?= $_forecast->pressure_string ?></span>
            <br><strong>Opacité de l'atmosphère : </strong><span><?= $_forecast->atmo_opacity ?></span>
            <br><strong>Lever du soleil : </strong><span><?= substr($_forecast->sunrise, 11, -4) ?></span>
            <br><strong>Coucher du soleil : </strong><span><?= substr($_forecast->sunset, 11, -4) ?></span>
        </div>
    <?php endforeach; ?>

    <?php foreach ($forecast_photo->photos as $_forecast): ?> <!-- If they are no error, display each photo infos -->
        <div>
            <br><strong>Image: </strong><img src="<?= $_forecast->img_src ?>">
            <br><strong>Info: </strong><span>Photographie prise en sol <strong><?= $_forecast->sol ?></strong> (approximativement le <strong><?= Date('d/m/Y', strtotime($date)) ?></strong>) à l'aide de la caméra <strong><?= $_forecast->camera->name ?></strong>.</span>
        </div>
    <?php endforeach; } ?>
</body>
</html>