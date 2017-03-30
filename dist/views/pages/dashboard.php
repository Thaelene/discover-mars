<div class="container-dashboard">
<!-- INCLUDE SIDEBAR -->
    <?php include 'views/partials/_menu.php' ?>

<!-- DASHBOARD LOADER -->
    <section class="loader-wrapper">
        <div class="loader">
            <div class="dot dot1"></div>
            <div class="dot dot2"></div>
            <div class="dot dot3"></div>
            <div class="dot dot4"></div>
        </div>
    </section>

<!-- DASHBOARD  -->
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
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
            <p class="error"><?= array_key_exists('date', $error_messages) ? $error_messages['date'] : '' ?></p> <!-- Error messages when date is wrong -->

            <!--
            If $forecast_info->results is empty, which means that one this date, no data has been collected,
            then show the error notice.
            Otherwise show data found
            -->
            <?php if (empty($forecast_info->results)){ ?>
                <p>No information has been collected on this day, please choose another one</p>
            <?php }
            elseif(empty($error_messages)) { foreach ($forecast_info->results as $_forecast): ?>
            <div class="info-bloc">
                <div class="info info-rover">
                    <h2>Informations</h2>
                    <div class="border border-small"></div>
                </div>
                <div class="info-bloc-content">
                    <p>Sol : <span><?= $_forecast->sol ?></span></p>
                    <p>Minimal temperature : <span><?= $_forecast->min_temp ?></span>° C</p>
                    <p>Maximal temperature : <span><?= $_forecast->max_temp ?></span>° C</p>
                    <p>Pression : <span><?= $_forecast->pressure ?></span> hpa</p>
                    <p>Type of pressure : <span><?= $_forecast->pressure_string ?></span></p>
                    <p>Atmosphere opacity : <span><?= $_forecast->atmo_opacity ?></span></p>
                    <p>Sunrise : <span><?= substr($_forecast->sunrise, 11, -4) ?></span></p>
                    <p>Sunset : <span><?= substr($_forecast->sunset, 11, -4) ?></span></p>
                </div>
            </div>
            <div>
                <a href="gallery" class="button button-gallery">PHOTOS OF THE DAY</a>
            </div>
            <?php endforeach; } ?>
        </div>
    </section>
</div>

<script src='<?= URL ?>assets/js/three.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/orbitcontrols.js'></script>
<script src="<?= URL ?>assets/js/app.js"></script>
