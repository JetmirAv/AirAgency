


<script>
        function profitChart() {

        var chart = new CanvasJS.Chart("profitChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Profit for " + new Date().getFullYear()
            },
            axisY:{
                includeZero: false
            },
            data: [{        
                type: "line",       
                dataPoints: [
                    { y: 450 },
                    { y: 414},
                    { y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
                    { y: 460 },
                    { y: 450 },
                    { y: 500 },
                    { y: 480 },
                    { y: 480 },
                    { y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                    { y: 500 },
                    { y: 480 },
                    { y: 510 }
                ]
            }]
        });
    chart.render();

    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
