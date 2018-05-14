<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<div class="panel-heading" style="margin: 10px; position: fixed;">
    <a href="<?php echo site_url(''); ?>" ><i class="fas fa-chevron-circle-left fa-5x"></i></a>
</div>
<?php foreach($hradky as $hrady):?>
<div class="container">
    <div class="row">
        <div class="panel panel-default">

        <br>
            <div class="panel-body">
                <div style="width: 500px; height: 400px; float: left; ">
                    <img src="<?php echo !empty($hrady['picture']) ? $hrady['picture'] : '' ?>" style=" border-radius: 8px;max-width: 100%; max-height: 100%; ">
                </div>
                <h1 id="nadpis_na_stranke" style="float: right; margin-left: 20px;"><?php echo
                        !empty($hrady['nazov']) ? $hrady['nazov'] : '' ; ?></h1>
                <div class="form-group" style="margin-left: 30px;">
                    <label>Typ:</label>
                    <?php echo !empty($hrady['Typ'])?$hrady['Typ']:''; ?>
                </div>
                <div class="form-group" style="margin-left: 30px;">
                    <label>Stav:</label>
                    <p><?php echo
                        !empty($hrady['Stav'])?$hrady['Stav']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>User:</label>
                    <p><?php echo
                        !empty($temperatures['user'])?$temperatures['user']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <p><?php echo
                        !empty($temperatures['description'])?$temperatures['description']:'';
                        ?></p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                    <ul class="list-unstyled clear-margins"><!-- widgets -->

                        <li class="widget-container widget_nav_menu"><!-- widgets list -->

                            <h1 class="title-widget">Poloha hradu</h1>

                            <ul>
                                <li></li>
                                <div id="map"></div>

                            </ul>

                        </li>

                    </ul>

                    <script>
                        function initMap() {
                            var hrad = {lat: <?php echo
                                !empty($hrady['gps_lat']) ? $hrady['gps_lat'] : '' ;?>, lng: <?php echo
                            !empty($hrady['gps_long']) ? $hrady['gps_long'] : '' ; ?>;
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 12,
                                center: hrad
                            });
                            var marker = new google.maps.Marker({
                                position: hrad,
                                map: map
                            });
                        }
                    </script>
                </div><!-- widgets column left end -->
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>
<br>
<div class="footer-bottom" style="position:absolute;
   bottom:0;">

    <div class="container" style="height:100%;">

        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="copyright">

                    © 2018, Made by Štefi, All rights reserved

                </div>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                <div class="design">

                    <a href="#">Hrady a zámky </a> |  <a href="#">Web Design & Development by Štefinkovo</a>

                </div>

            </div>

        </div>

    </div>

</div>