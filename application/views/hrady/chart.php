<div id="statistika" style="top: 100px"><h1>Štatistiky</h1>
<div>
    <div style="float: left; width: 50%">
        <canvas id="myChart" width="500" height="400" style="margin-left: 20%;">
        </canvas>
    </div>
    <div style="float: right; width: 50%">
        <canvas id="myChart2" width="500" height="400">
        </canvas>
    </div>
</div>
</div>
<br>
<br>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo site_url("home/vypisNavstevy") ?>",
            method: "GET",
            success: function(Jdata) {
                var data = Jdata;
                console.log(data);
                console.log(data[3]);
                var cas = [];
                var ludia = [];

                for(var i in data) {
                    cas.push(data[i].datum);
                    ludia.push(data[i].pocet);
                    console.log(data[i].datum);
                }

                var chartdata = {
                    labels: cas,
                    datasets : [
                        {
                            label: 'Návštevnosť počas uplynulých mesiacov',
                            fill: false,
                            borderColor: "rgb(75, 192, 192)",
                            lineTension: 0.1,
                            data: ludia
                        }
                    ]
                };

                var ctx = $("#myChart");

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata,
                    options: {responsive: false}
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
/*
    var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: ["January", "February", "March", "April", "May", "June", "July"],
                        datasets: [{
                            label: "Návštevnosť počas uplynulých mesiacov",
                            data: [65, 59, 80, 81, 56, 55, 40],
                            fill: false,
                            borderColor: "rgb(75, 192, 192)",
                            lineTension: 0.1
                        }]
                    },
                    options: {responsive: false}
                });

*/
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


</script>