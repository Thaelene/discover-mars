<div class="container-dashboard">

<!-- INCLUDE HEADER -->

    <?php include 'views/partials/_menu.php' ?>

<!-- GALLERY INFORMATIONS -->

    <section class="container">
        <div class="gallery-info">
            <a href="dashboard" class="back">
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
                    <p>Thursday, March 3th 2017</p>
                </div>
            </div>
            <form action="#" method="get" class="gallery-views">
                <input type="date" name="date" value="<?= $date ?>" required name="date"> <!-- Select the date -->
                <label for="choose-camera">CHOOSE YOUR VIEW :</label>
                <select name="choose-camera" id="choose-camera" size="1"> <!-- Select the camera and display active camera in the button -->
                    <option <?php if ($camera == "") { ?>selected<?php } ?> value="">All</option>
                    <option <?php if ($camera == "FHAZ") { ?>selected<?php } ?> value="FHAZ">FHAZ</option>
                    <option <?php if ($camera == "RHAZ") { ?>selected<?php } ?> value="RHAZ">RHAZ</option>
                    <option <?php if ($camera == "NAVCAM") { ?>selected<?php } ?> value="NAVCAM">NAVCAM</option>
                </select>
                <input type="submit">
            </form>
        </div>

<!-- GALLERY IMAGES -->

        <div class="container-image">
            <?php foreach ($forecast_photo->photos as $_forecast): ?> <!-- Display each photo infos -->
                <?php if (($_forecast->camera->name == $camera) || (($_forecast->camera->name == $camera[0]) || ($_forecast->camera->name == $camera[1]) || ($_forecast->camera->name == $camera[2]))) { ?>
            <div class="image-card">
                <div class="image">
                    <img src="<?= $_forecast->img_src ?>">
                </div>
                <p>Photographie prise en sol <span><?= $_forecast->sol ?></span>, (approximativement le <span><?= Date('d/m/Y', strtotime($date)) ?></span> à l'aide de la caméra <span><?= $_forecast->camera->name ?></span></p>
            </div>
            <?php } ?>
        <?php endforeach; ?>
        </div>
    </section>
</div>
