<div class="progress">
    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar"
         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<div class="panel-heading" style="margin: 10px; position: fixed;">
    <a href="<?php echo site_url(''); ?>"><i class="fas fa-chevron-circle-left fa-5x"></i></a>
</div>
<?php foreach ($hradky as $hrady):
    $gps_lat = $hrady["gps_lat"];
    $gps_long = $hrady["gps_long"]; ?>
    <div class="container" style="">
        <div class="row">
            <div class="panel panel-default">
                <br>
                <div class="panel-body">
                    <div style="width: 400px; height: 400px; float: left; ">
                        <img src="<?php echo !empty($hrady['picture']) ? $hrady['picture'] : '' ?>"
                             style="float: left; border-radius: 8px; max-width: 100%; max-height: 100%; ">
                    </div>
                    <h1 id="nadpis_na_stranke" style="margin-left: 20px;"><?php echo
                        !empty($hrady['nazov']) ? $hrady['nazov'] : ''; ?></h1>
                    <div class="form-group" style="margin-left: 30px;">
                        <label><strong>Typ:</strong></label>
                        <p><?php echo !empty($hrady['Typ']) ? $hrady['Typ'] : ''; ?></p>
                    </div>
                    <div class="form-group" style="margin-left: 30px;">
                        <label><strong>Stav:</strong></label>
                        <p><?php echo
                            !empty($hrady['Stav']) ? $hrady['Stav'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label><strong>Vznik:</strong></label>
                        <p><?php echo
                            !empty($hrady['vznik']) ? $hrady['vznik'] : ''; ?></p>
                    </div>
                    <div class="form-group">
                        <label><strong>História:</strong></label>
                        <p style="text-align: justify;"><?php echo
                            !empty($hrady['Text_historie']) ? $hrady['Text_historie'] : '';
                            ?></p>
                    </div>
                    <br>
                    <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                        <ul class="list-unstyled clear-margins"><!-- widgets -->

                            <li class="widget-container widget_nav_menu"><!-- widgets list -->

                                <h1 class="title-widget">Poloha hradu</h1>
                                <ul>
                                    <li></li>
                                </ul>
                                <strong>Adresa: </strong>
                                <p>
                                    <?php echo !empty($hrady['Adresa']) ? $hrady['Adresa'] : ''; ?>, <br><?php echo
                                    !empty($hrady['psc']) ? $hrady['psc'] : ''; ?> <?php echo !empty($hrady['mesto']) ? $hrady['mesto'] : ''; ?>
                                </p>
                                    <div id="map"></div>
                            </li>
                        </ul>
                        <script>
                                function initMap() {
                                    var hrad = {
                                        lat: <?php echo
                                        $gps_lat;?>, lng: <?php echo
                                        $gps_long; ?>};
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 17,
                                        center: hrad
                                    });
                                    var marker = new google.maps.Marker({
                                        position: hrad,
                                        map: map
                                    });
                                }
                        </script>
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwSnSssRpMOoIivHqn8EVpZK-y6bnseWg&callback=initMap"
                                type="text/javascript"></script>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div><!-- widgets column left end -->
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<br>
<div class="footer-bottom" style="position:fixed;
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

                    <a href="#">Hrady a zámky </a> | <a href="#">Web Design & Development by Štefinkovo</a>

                </div>

            </div>

        </div>

    </div>

</div>