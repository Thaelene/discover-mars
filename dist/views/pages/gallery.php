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
            <div class="gallery-views">
                <p for="choose-camera">CHOOSE YOUR VIEW : </p>
                <select name="choose-camera" id="choose-camera">
                    <option>Camera 1</option>
                    <option>Camera 2</option>
                    <option>Camera 3</option>
                    <option selected>Toutes les caméras</option>
                </select>
            </div>
        </div>

<!-- GALLERY IMAGES -->

        <div class="container-image">
            <div class="image-card">
                <div class="image">
                    <img src="assets/img/logo.png" alt="#">
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
            </div>
        </div>
    </section>
</div>
