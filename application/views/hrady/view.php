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

            <div class="col-lg-3 col-md-3" style="float: left; position: relative;"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->

                    <li class="widget-container widget_nav_menu"><!-- widgets list -->

                        <h1 class="title-widget">Informácie</h1>
                        <ul>
                            <li></li>
                        </ul>
                        <p><strong>🌐 Webstránka:</strong><br> <?php echo !empty($hrady['webstranka']) ? $hrady['webstranka'] : 'Nie je'; ?></p>
                        <p><strong>📱 Telefón:</strong><br> <?php echo !empty($hrady['telefon']) ? $hrady['telefon'] : 'Nie je'; ?></p>
                        <p><strong>📧 Email:</strong><br> <?php echo !empty($hrady['email']) ? $hrady['email'] : 'Nie je'; ?></p>
                        <strong>📮 Adresa: </strong>
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

            </div><!-- widgets column left end -->

            <div style="float: right; position: relative;">
                <canvas id="myChart" width="600" height="450" style="margin-left: 5%;">
                </canvas>
            </div>
            <script type="text/javascript">
                var idcko = window.location.pathname.split("/").pop();
                $(document).ready(function () {
                    $.ajax({
                        url: "<?php echo site_url("home/navstevnostHrady/")?>"+idcko,
                        dataType: "json",
                        method: "GET",
                        success: function (Jdata) {
                            var data = Jdata;
                            var hodnotenie = [];
                            var pocet = [];

                            for (var i in data) {
                                hodnotenie.push(data[i].hodnotenie+". hodnotenie");
                                pocet.push(data[i].pocet);
                            }

                            var chartdata = {
                                labels: hodnotenie,
                                borderColor: "#000000",
                                datasets: [
                                    {
                                        label: 'Hodnotenie návštevníkov hradu',
                                        data: pocet,
                                        backgroundColor: ["rgb(255, 0,0)", "rgb(255, 97, 0)", "rgb(254, 201, 78)","rgb(255, 238, 0)","rgb(73, 237, 158)"]
                                    }
                                ]
                            };

                            var ctx = $("#myChart");

                            var barGraph = new Chart(ctx, {
                                type: 'doughnut',
                                data: chartdata,
                                options: {
                                    responsive: false,
                                    chartArea: {
                                        backgroundColor: 'rgba(0, 0, 0)'

                                    }
                                }
                            });
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                });

/*
                var ctx2 = document.getElementById("myChart").getContext('2d');
                var myChart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: ["Red", "Blue", "Yellow"],
                        datasets: [{
                            label: "Hodnotenie",
                            data: [300, 50, 100],
                            backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                        }]
                    },
                    options: {
                        responsive: false
                    }
                });

                */
            </script>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="container" style="background: white;">
                <h2>Hodnotenie hradu</h2>
                <p>Sem prispejete dobrým ohodnotením</p>
                <form method="post" action="<?php echo site_url('home/ohodnot')?>" class="form" id="myform">
                    <div class="form-group">
                        <?php
                        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if(preg_match("/\/(\d+)$/",$url,$matches))
                        {
                            $end=$matches[1];
                        }
                        ?>
                        <input type="hidden" name="idHrad" value="<?php echo $end; ?>">
                        <label for="meno"><strong>Meno:</strong></label>
                        <input type="text" placeholder="Vaše meno" class="form-control" id="meno" name="meno" required>
                    </div>
                    <div class="form-group">
                        <label for="input-2"><strong>Hodnotenie:</strong></label><br>
                            <div class="starrating risingstar d-flex flex-row-reverse" style="float: left;">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Vynikajúce">5</label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Veľmi dobré">4</label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Dobré">3</label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Ok">2</label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Veľmi slabé">1</label>
                            </div>
                    </div>
                    <br>
                    <br>
                    <label for="radio"><strong>Pohlavie:</strong></label>
                    <div class="radio">
                        <label><input type="radio" name="pohlavie" value="muz"> Muž </label><br>
                        <label><input type="radio" name="pohlavie" value="zena"> Žena </label><br>
                        <label><input type="radio" name="pohlavie" value="neuvedene"> Nechcem uvádzať </label><br>
                    </div>
                    <br>
                    <input id="potvrdit" type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
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