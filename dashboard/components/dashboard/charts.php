<?php 

    include "../databaseConfig.php";

    $thisMonthQuery = "select COUNT(*) as 'num' from users ".
        " where MONTH(createdAt) = MONTH(CURRENT_DATE) ".
        " AND YEAR(createdAt) = YEAR(CURRENT_DATE);";     
    $totalQuery = "select COUNT(*) as 'num' from users ".
        " where MONTH(createdAt) != MONTH(CURRENT_DATE) ".
        " OR YEAR(createdAt) != YEAR(CURRENT_DATE);";     
    $thisYearProfit = "SELECT MONTH(createdAt) as 'month',SUM(price) as 'total' FROM booked".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE)".
        " GROUP BY MONTH(createdAt);";
        
    $thisYearFlights = "SELECT MONTH(checkIn) as 'month', COUNT(*) as 'num' FROM flight".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE)".
        " GROUP BY MONTH(checkIn);";
    $lastYearFlights = "SELECT MONTH(checkIn) as 'month', COUNT(*) as 'num' FROM flight".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE) - 1".
        " GROUP BY MONTH(checkIn);";
        


    
    $thisMonth = $conn->query($thisMonthQuery);
    $total = $conn->query($totalQuery);
    $profitThisYear = $conn->query($thisYearProfit);

    $thisMonthRecords = $thisMonth->fetch(PDO::FETCH_COLUMN);
    $totalRecords = $total->fetch(PDO::FETCH_COLUMN);
    // $profit = $profitThisYear->fetch(PDO::FETCH_ASSOC);

    $thisMonthPct = ($thisMonthRecords/$totalRecords) * 100;
    $totalPct = 100 - $thisMonthPct;
    


  ?>
<script>
    window.onload =  function() {


        var usersChart = new CanvasJS.Chart("usersChart", {
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: <?php echo $thisMonthPct; ?>,  label: "This Month"},
                    {y: <?php echo $totalPct; ?>, label: "Other"},
                ]
            }]
        });
        usersChart.render();


        var profitChart = new CanvasJS.Chart("profitChart", {
                animationEnabled: true,
                theme: "light2",
                axisY:{
                    includeZero: false
                },
                data: [{        
                    type: "line",       
                    dataPoints: [
                        <?php
                            
                            while ($profit = $profitThisYear->fetch(PDO::FETCH_ASSOC)):
                                echo  "{ y: " . $profit['total'] . " },";
                            endwhile;        
                        ?>
                    ]
                }]
            });
        profitChart.render();



        var flightsChart = new CanvasJS.Chart("flightsChart", {
            animationEnabled: true,
            title:{
                text: "Crude Oil Reserves vs Production, 2016"
            },	
            axisY: {
                title: "Billions of Barrels",
                titleFontColor: "#4F81BC",
                lineColor: "#4F81BC",
                labelFontColor: "#4F81BC",
                tickColor: "#4F81BC"
            },
            axisY2: {
                title: "Millions of Barrels/day",
                titleFontColor: "#C0504E",
                lineColor: "#C0504E",
                labelFontColor: "#C0504E",
                tickColor: "#C0504E"
            },	
            toolTip: {
                shared: true
            },
            legend: {
                cursor:"pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Proven Oil Reserves (bn)",
                legendText: "Proven Oil Reserves",
                showInLegend: true, 
                dataPoints:[
                    { label: "Saudi", y: 266.21 },
                    { label: "Venezuela", y: 302.25 },
                    { label: "Iran", y: 157.20 },
                    { label: "Iraq", y: 148.77 },
                    { label: "Kuwait", y: 101.50 },
                    { label: "UAE", y: 97.8 }
                ]
            },
            {
                type: "column",	
                name: "Oil Production (million/day)",
                legendText: "Oil Production",
                axisYType: "secondary",
                showInLegend: true,
                dataPoints:[
                    { label: "Saudi", y: 10.46 },
                    { label: "Venezuela", y: 2.27 },
                    { label: "Iran", y: 3.99 },
                    { label: "Iraq", y: 4.45 },
                    { label: "Kuwait", y: 2.92 },
                    { label: "UAE", y: 3.1 }
                ]
            }]
        });
        flightsChart.render();



}
</script>




