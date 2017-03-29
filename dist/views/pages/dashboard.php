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
                <p><?= Date('d/m/Y', strtotime($date)) ?></p>
            </div>
            <p class="error"><?= array_key_exists('date', $error_messages) ? $error_messages['date'] : '' ?></p>

            <div class="info-bloc">
                <?php if(empty($error_messages)) { foreach ($forecast_info->results as $_forecast): ?>
                <div class="info info-rover">
                    <h2>Informations</h2>
                    <div class="border border-small"></div>
                </div>
                <p>Temperature</p>
                <p><?= $_forecast->sol ?></p>
                <p><?= $_forecast->min_temp ?></p>
                <p><?= $_forecast->max_temp ?></p>
                <p><?= $_forecast->pressure ?></p>
                <p><?= $_forecast->pressure_string ?></p>
                <p><?= $_forecast->atmo_opacity ?></p>
                <p><?= substr($_forecast->sunrise, 11, -4) ?></p>
                <p><?= substr($_forecast->sunset, 11, -4) ?></p>
                <p>Pression</p>
                <p>Sunrise</p>
            <?php endforeach; }?>
            </div>

            <div><a href="gallery" class="button">Check the gallery</a></div>
        </div>
    </section>
</div>
<script src='<?= URL ?>assets/js/three.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/orbitcontrols.js'></script>
<script src="<?= URL ?>assets/js/app.js"></script>
