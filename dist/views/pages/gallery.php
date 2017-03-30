<?php
$listImage = array();
$listIdPhoto = array();

foreach ($forecast_photo->photos as $_forecast) { 
    if (($_forecast->camera->name == $camera) || (($_forecast->camera->name == $camera[0]) || ($_forecast->camera->name == $camera[1]) || ($_forecast->camera->name == $camera[2]))) {
        $query = $pdo->query("SELECT * FROM `photo-view` WHERE name = '".$_forecast->img_src."'");
        $items = $query->fetchAll();
        foreach($items as $_items)
        {
            $listImage[$_items->name] = $_items->views;
            $listIdPhoto[$_items->name] = $_items->id;
            
        }
        
    }
}

arsort($listImage);

?>


<div class="container-dashboard">

<!-- INCLUDE HEADER -->

    <?php include 'views/partials/_menu.php' ?>

<!-- GALLERY INFORMATIONS -->

    <a class="array-top" href="#">
        <i class="fa fa-sort-asc" class="array-top" aria-hidden="true"></i>
    </a>

    <section class="container full">
        <div class="gallery-info">
            <a href="dashboard?date=<?=$date;?>" class="back">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>QUIT GALLERY
            </a>
            <div class="gallery-title">
                <div class="info info-title">
                    <h1>Curiosity</h1>
                    <div class="border border-large"></div>
                </div>
                <div class="info-bloc">
                    <div class="info info-date">
                        <h2>Date</h2>
                        <div class="border border-small"></div>
                    </div>
                    <p><?= Date('d/m/Y', strtotime($date)) ?></p>
                </div>
            </div>
            <div class="gallery-choose">
                <form action="#" method="get" class="gallery-views">
                    <div class="choose-camera">
                        <label for="choose-camera">CHOOSE YOUR CAMERA VIEW :</label>
                        <select name="choose-camera" id="choose-camera" size="1"> <!-- Select the camera and display active camera in the button -->
                            <option <?php if ($camera == "") { ?>selected<?php } ?> value="">All</option>
                            <option <?php if ($camera == "FHAZ") { ?>selected<?php } ?> value="FHAZ">FHAZ</option>
                            <option <?php if ($camera == "RHAZ") { ?>selected<?php } ?> value="RHAZ">RHAZ</option>
                            <option <?php if ($camera == "NAVCAM") { ?>selected<?php } ?> value="NAVCAM">NAVCAM</option>
                        </select>
                    </div>
                    <div class="choose-date">
                        <label for="choose-date">CHOOSE THE DATE : </label>
                        <input type="date" name="date" value="<?= $date ?>" required id="choose-date">
                    </div>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>

<!-- GALLERY IMAGES -->

        <div class="container-image">
        <?php foreach($listImage as $key => $valeur) : ?>
            <div class="image-card">
                <div class="image">
                    <img class="imagePhoto" data-photo="<?= $listIdPhoto[$key]?>" src="<?= $key ?>" data-action="zoom">
                </div>
                <p>Picture took on ground, around <span><?= Date('d/m/Y', strtotime($date)) ?></span> with the <span><?= $_forecast->camera->name ?></span> camera.</p>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
</div>
<script src="assets/js/zooming.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="assets/js/addView.js"></script>
