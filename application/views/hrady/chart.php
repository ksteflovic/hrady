<h1 id="statistika">Štatistiky</h1>
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
<br>
<br>
<script type="text/javascript">

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

    /* var myChart = new Chart(ctx, {
         type: 'line',
         data: [{
             x: 10,
             y: 20
         }, {
             x: 15,
             y: 10
         }],
         options: {
             responsive: true,
             maintainAspectRatio: true,
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero:true
                     }
                 }]
             }
         }
     });*/

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
        })
    ;
</script>