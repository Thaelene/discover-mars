<?php
include "handle.php";
?>
<p>Date : <?= $_SESSION['date'] ?></p>

<?php foreach ($forecast_photo->photos as $_forecast): ?> <!-- Display each photo infos -->
    <?php if (($_forecast->camera->name == $camera) || (($_forecast->camera->name == $camera[0]) || ($_forecast->camera->name == $camera[1]) || ($_forecast->camera->name == $camera[2]))) { ?>
    <div>
        <br><strong>Image: </strong><img src="<?= $_forecast->img_src ?>">
        <br><strong>Info: </strong><span>Photographie prise en sol <strong><?= $_forecast->sol ?></strong> (approximativement le <strong><?= Date('d/m/Y', strtotime($date)) ?></strong>) à l'aide de la caméra <strong><?= $_forecast->camera->name ?></strong>.</span>
    </div>
    <?php } ?>
<?php endforeach;  ?>
