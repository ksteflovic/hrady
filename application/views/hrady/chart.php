<br>
    <hr id="statistika" class="style5">
    <br>
    <br>
    <br>
<div ><h1 style="margin-left: 2%;">Štatistiky</h1>
    <div>
        <div style="float: left; width: 50%">
            <canvas id="myChart" width="600" height="450" style="margin-left: 5%;">
            </canvas>
        </div>
        <div style="float: right; margin-right: 2%;">
            <canvas id="chartjs-1" width="600" height="450">
            </canvas>
        </div>
    </div>
</div>
<br>
<br>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: "<?php echo site_url("home/vypisNavstevy") ?>",
            dataType: "json",
            method: "GET",
            success: function (Jdata) {
                var data = Jdata;
                var cas = [];
                var ludia = [];

                for (var i in data) {
                    cas.push(data[i].Datum);
                    ludia.push(data[i].Pocet);
                }

                var chartdata = {
                    labels: cas,
                    borderColor: "#000000",
                    datasets: [
                        {
                            label: 'Návštevnosť počas posledých siedmych dní',
                            fill: true,
                            borderColor: "rgb(255, 255, 255)",
                            backgroundColor: "rgb(75, 192, 210)",
                            lineTension: 0.1,
                            data: ludia
                        }
                    ]
                };

                var ctx = $("#myChart");

                var barGraph = new Chart(ctx, {
                    type: 'line',
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


    $(document).ready(function () {
        $.ajax({
            url: "<?php echo site_url("home/vypisNavstevy2") ?>",
            dataType: "json",
            method: "GET",
            success: function (Jdata) {
                var data = Jdata;
                var cas = [];
                var ludia = [];

                for (var i in data) {
                    cas.push(data[i].Cas);
                    ludia.push(data[i].Pocet);
                }

                var chartdata = {
                    labels: cas,
                    borderColor: "#000000",
                    datasets: [
                        {
                            label: 'Návštevnosť počas hodín',
                            fill: false,
                            backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)","rgba(46, 73, 254,0.2)","rgba(46, 251, 53,0.2)","rgba(254, 2, 0,0.2)","rgba(254, 24, 202,0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 20, 0.2)","rgba(99, 187, 33, 0.2)","rgba(200, 3, 45, 0.2)","rgba(149, 105, 20, 0.2)","rgba(92, 84, 108, 0.2)","rgba(240, 68, 33, 0.2)","rgba(23, 140, 77, 0.2)","rgba(208, 14, 99, 0.2)","rgba(170, 40, 85, 0.2)","rgba(13, 85, 96, 0.2)","rgba(46, 23, 177, 0.2)","rgba(230, 122, 93, 0.2)"],
                            borderColor: ["rgb(255, 99, 132)", "rgb(255, 159, 64)","rgb(46, 73, 254)","rgb(46, 251, 53)","rgb(254, 2, 0)","rgb(254, 24, 202)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 20)","rgba(99, 187, 33)","rgba(200, 3, 45)","rgba(149, 105, 20)","rgba(92, 84, 108)","rgba(240, 68, 33)","rgba(23, 140, 77)","rgba(208, 14, 99)","rgba(170, 40, 85)","rgba(13, 85, 96)","rgba(46, 23, 177)","rgba(230, 122, 93)"],
                            borderWidth: 1,
                            data: ludia
                        }
                    ]
                };

                var ctx2 = $("#chartjs-1");

                var barGraph = new Chart(ctx2, {
                    type: 'bar',
                    data: chartdata,
                    options: {
                        responsive: false,
                        options: {"scales": {"yAxes": [{"ticks": {"beginAtZero": true}}]}, responsive: false}
                    }
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });


    /*

    var ctx2 = document.getElementById("myChart2").getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ["Red", "Blue", "Yellow"],
            datasets: [{
                label: "Hrady na Slovensku",
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
<div class="parallax parallaxDruhy"></div>