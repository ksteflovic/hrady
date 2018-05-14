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
                    <div style="width: 400px; height: 400px; float: left; margin:30px;">
                        <img src="<?php echo !empty($hrady['picture']) ? $hrady['picture'] : '' ?>"
                             style="float: left; border-radius: 8px; max-width: 100%; max-height: 100%; ">
                    </div>
                    <h1 id="nadpis_na_stranke" style="margin-left: 20px;"><?php echo
                        !empty($hrady['nazov']) ? $hrady['nazov'] : ''; ?></h1>
                    <span class="heading">Hodnotenie používateľov: </span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="fas fa-star checked"></span>
                    <span class="far fa-star"></span>
                    <p style="font-size: 10px;">Priemer 4.1 podľa 254 hodnotení.</p>
                    <div class="form-group" style="margin-left: 30px;">
                        <label><strong>Typ:</strong></label>
                        <p><?php echo !empty($hrady['Typ']) ? $hrady['Typ'] : ''; ?></p>
                    </div>
                    <div class="form-group" style="margin-left: 30px;">
                        <label><strong>Stav:</strong></label>
                        <p><?php echo
                            !empty($hrady['Stav']) ? $hrady['Stav'] : ''; ?></p>
                    </div>
                    <div class="form-group" style="margin-left: 10px;">
                        <label><strong>Vznik:</strong></label>
                        <p><?php echo
                            !empty($hrady['vznik']) ? $hrady['vznik'] : ''; ?></p>
                    </div>
                    <div class="form-group" style="margin-left: 10px;">
                        <label><strong>História:</strong></label>
                        <p style="text-align: justify;"><?php echo
                            !empty($hrady['Text_historie']) ? $hrady['Text_historie'] : '';
                            ?></p>
                    </div>
                    <br>

                    <div class="container">
                        <div class="row">
                            <h1>Vstupné</h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="panel panel-default ">
                                    <table class="table table-striped" style="width: 1000px; align: center;">
                                        <thead>
                                        <tr>
                                            <th width="30%">Typ</th>
                                            <th width="20%">Suma</th>
                                            <th width="50%">Poznámka</th>
                                        </tr>
                                        </thead>
                                        <tbody id="userData">
                                        <?php if (!empty($vstupne)): foreach ($vstupne as $vstup): ?>
                                            <tr>
                                                <td><?php echo $vstup['Typ']; ?></td>
                                                <td><?php echo $vstup['Suma']; ?> €</td>
                                                <td><?php echo $vstup['Poznámka']; ?></td>
                                            </tr>
                                        <?php endforeach; else: ?>
                                            <tr>
                                                <td colspan="8">Vstupenky neboli nájdené ...
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                </div>
                            </div>
                            </table>
                        </div>
                        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
                    </div>
                </div>
            </div>
            <br>
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
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwSnSssRpMOoIivHqn8EVpZK-y6bnseWg&callback=initMap"
                        type="text/javascript"></script>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div><!-- widgets column left end -->
            <br>
            <div class="container">
                <h2>Hodnotenie hradu</h2>
                <p>Sem prispejete dobrým ohodnotením</p>
                <form method="post" action="" class="form">
                    <div class="form-group">
                        <label for="meno"><strong>Meno:</strong></label>
                        <input type="text" placeholder="Vaše meno" class="form-control" id="meno">
                    </div>
                    <div class="form-group">
                        <label for="hodnotenie">Hodnotenie:</label>
                        <input id="input-2" name="input-2" value="2.5" class="rating-loading">
                        <script>
                            $(document).on('ready', function(){
                                $('#input-2').rating({
                                    step: 1,
                                    starCaptions: {1: 'Veľmi slabé', 2: 'Slabé', 3: 'Ok', 4: 'Dobré', 5: 'Vynikajúce'},
                                    starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
                                });
                            });
                        </script>
                    </div>
                    <label for="usr">Pohlavie:</label>
                    <div class="radio">
                        <label><input type="radio" name="muz">Muž </label><br>
                        <label><input type="radio" name="zena">Žena </label><br>
                        <label><input type="radio" name="neuvedene">Nechcem uvádzať </label><br>
                    </div>
                    <br>
                    <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
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