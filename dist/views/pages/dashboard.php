<div class="container-dashboard">

    <?php include 'views/partials/_menu.php' ?>

    <section class="container">
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
                <p>Thursday, March 3th 2017</p>
            </div>
            <div class="info-bloc">
                <div class="info info-rover">
                    <h2>Informations</h2>
                    <div class="border border-small"></div>
                </div>
                <p>Temperature</p>
                <p>Pression</p>
                <p>Sunrise</p>
            </div>
            <div><a href="gallery" class="button">Check the gallery</a></div>
        </div>
    </section>
</div>
<script src='<?= URL ?>assets/js/three.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/orbitcontrols.js'></script>
<script src="<?= URL ?>assets/js/app.js"></script>
