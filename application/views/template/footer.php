<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#CastleTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [ 3, 5, 10, 25, 50, 75, 100, "All"],
            "ajax":{
                "url" : "<?php echo site_url("home/castles_page") ?>",
                "type" : 'GET'
            },
        });
    });
</script>

<script>
    function klikni() {
        if (document.getElementById("emailbox").value == "") {}
        else {
            alert("Thank you for subscription!");
        }
    }
</script>
<script src="<?php echo base_url();?>assets/js/datatables/datatables.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/datatables.min.js"></script>


<script>
    function initMap() {
        var hrad = {lat: 48.331487, lng: 19.652273};
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwSnSssRpMOoIivHqn8EVpZK-y6bnseWg&callback=initMap"
        type="text/javascript"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<hr>
<!--footer-->
<footer  id="about" class="footer1">
    <div class="container">

        <div class="row"><!-- row -->

            <div class="col-lg-3 col-md-3" style="margin-right: 50px"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->

                    <li class="widget-container widget_nav_menu"><!-- widgets list -->

                        <h1 class="title-widget">Subscribe</h1>
                        <ul>
                            <li>
                            </li>
                            <p>Stay up to date with our whitepapers, articles, statistics and invitations to special events.</p>
                            <div class="button_box2">
                                <form class="form-wrapper-2 cf">
                                    <input id="emailbox" type="email" placeholder="E-mail address" required>
                                    <button type="submit" onclick="klikni()">Send</button>
                                </form>
                            </div>
                        </ul>

                    </li>

                </ul>


            </div><!-- widgets column left end -->

            <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                <ul class="list-unstyled clear-margins"><!-- widgets -->

                    <li class="widget-container widget_nav_menu"><!-- widgets list -->

                        <h1 class="title-widget">Where you find us</h1>

                        <ul>
                            <li></li>
                                <div id="map"></div>

                        </ul>

                    </li>

                </ul>


            </div><!-- widgets column left end -->

            <div class="col-lg-3 col-md-3" style="margin-left: 160px"><!-- widgets column center -->



                <ul class="list-unstyled clear-margins"><!-- widgets -->

                    <li class="widget-container widget_recent_news widget_nav_menu"><!-- widgets list -->
                        <h1 class="title-widget">Contact detail</h1>
                        <div class="footerp">
                            <ul><li></li></ul>
                            <br>
                            <h2 class="title-median">Štefinkovo s.r.o.</h2>
                            <sttrong>📧 <a href="mailto:stefi7773@gmail.com">stefi7773@gmail.com</a></sttrong>
                            <p><strong>Helpline Numbers </strong>

                                <strong style="color:#ffb105;">(8AM to 10PM):</strong>  +91-8130890090, +91-8130190010  </p>

                            <p><strong>Corp Office / Postal Address</strong></p>
                            <p>Fándlyho 1243 / 8<br>984 03 Lučenec</p>
                            <p><strong>Phone Numbers : </strong>7042827160, </p>
                            <p>📲 011-27568832, ☎9868387223</p>
                        </div>
                    </li>
                </ul>
            </div>
            <br>
        </div>
        <br>
        <br>
        <div class="social-icons" align="center">

            <ul class="nomargin">
                <a target="_blank" href="https://www.facebook.com/"><img src="<?php echo base_url();?>assets/socialnetworks/facebook.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://www.geocaching.com/"><img src="<?php echo base_url();?>assets/socialnetworks/geocaching.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://www.instagram.com/"><img src="<?php echo base_url();?>assets/socialnetworks/instagram.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://www.pinterest.com/"><img src="<?php echo base_url();?>assets/socialnetworks/pinterest.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://www.rss.com/"><img src="<?php echo base_url();?>assets/socialnetworks/rss.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://twitter.com/"><img src="<?php echo base_url();?>assets/socialnetworks/twitter.png" class="grayscale" width="65px" height="70px"></a>
                <a target="_blank" href="https://www.youtube.com/"><img src="<?php echo base_url();?>assets/socialnetworks/youtube.png" class="grayscale" width="65px" height="70px"></a>
                <!--
                                                <a href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
                                                <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
                                                <a href="https://plus.google.com/"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
                                                <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                -->

            </ul>
        </div>
    </div>
</footer>
<!--header-->

<div class="footer-bottom">

    <div class="container">

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


</body>
</html>