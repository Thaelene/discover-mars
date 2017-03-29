<div class="container-dashboard">

    <?php include 'views/partials/_menu.php' ?>

    <section>
        <div id="marsloc"></div>
        <div class="informations">
            <div class="info info-title">
                <h1>Curiosity</h1>
                <div class="border border-large"></div>
            </div>
            <div class="info-bloc">
                <div class="info info-date">
                    <h2>Date</h2>
                    <div class="border border-small"></div>
                </div>
                <form action="#" method="get">
                    <input type="date" name="date" value="<?= $date ?>" required name="date"> <!-- Select the date -->
                    <input type="submit">
                </form>
                <!-- <span><?= Date('d/m/Y', strtotime($date)) ?></span> -->
            </div>
            <p class="error"><?= array_key_exists('date', $error_messages) ? $error_messages['date'] : '' ?></p>

            <div class="info-bloc">
                <?php if(empty($error_messages)) { foreach ($forecast_info->results as $_forecast): ?>
                <div class="info info-rover">
                    <h2>Informations</h2>
                    <div class="border border-small"></div>
                </div>
                <div class="info-bloc-content">
                    <p>Sol : <span><?= $_forecast->sol ?></span></p>
                    <p>Minimal temperature : <span><?= $_forecast->min_temp ?></span></p>
                    <p>Maximal temperature : <span><?= $_forecast->max_temp ?></span></p>
                    <p>Pression : <span><?= $_forecast->pressure ?></span></p>
                    <p>Type of pressure : <span><?= $_forecast->pressure_string ?></span></p>
                    <p>Atmosphere opacity : <span><?= $_forecast->atmo_opacity ?></span></p>
                    <p>Sunrise : <span><?= substr($_forecast->sunrise, 11, -4) ?></span></p>
                    <p>Sunset : <span><?= substr($_forecast->sunset, 11, -4) ?></span></p>
                </div>
            <?php endforeach; }?>
            </div>

            <div><a href="gallery" class="button">Check the gallery</a></div>
        </div>
    </section>
</div>
<script src='<?= URL ?>assets/js/three.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/orbitcontrols.js'></script>
<script src="<?= URL ?>assets/js/app.js"></script>
