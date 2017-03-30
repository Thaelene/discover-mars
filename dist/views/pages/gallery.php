<?php
    // Fetch all photos by view
//    $query = $pdo->query('SELECT * FROM `photo-view` ORDER BY `photo-view`.`views` DESC');
//    $items = $query->fetchAll();
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
                        <input type="date" name="choose-date" value="<?= $date ?>" required id="choose-date">
                    </div>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>

<!-- GALLERY IMAGES -->

        <div class="container-image">
            <?php foreach ($forecast_photo->photos as $_forecast): ?> <!-- Display each photo infos -->
                <?php if (($_forecast->camera->name == $camera) || (($_forecast->camera->name == $camera[0]) || ($_forecast->camera->name == $camera[1]) || ($_forecast->camera->name == $camera[2]))) { ?>
            <div class="image-card">
                <div class="image">
                    <img src="<?= $_forecast->img_src ?>">
                </div>
                <p>Picture took on ground, around <span><?= Date('d/m/Y', strtotime($date)) ?></span> with the <span><?= $_forecast->camera->name ?></span> camera.</p>
            </div>
            <?php } ?>
        <?php endforeach; ?>
        </div>
    </section>
</div>
