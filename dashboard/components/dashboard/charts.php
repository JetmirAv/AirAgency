<?php 

    require_once("../databaseConfig.php");
    require_once("../models/users.php");

    $thisYearProfit = "SELECT MONTH(createdAt) as 'month',SUM(price) as 'total' FROM booked".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE)".
        " GROUP BY MONTH(createdAt);";
        
    $thisYearFlights = "SELECT MONTH(checkIn) as 'month', COUNT(*) as 'num' FROM flight".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE)".
        " GROUP BY MONTH(checkIn);";
    $lastYearFlights = "SELECT MONTH(checkIn) as 'month', COUNT(*) as 'num' FROM flight".
        " WHERE YEAR(createdAt) = YEAR(CURRENT_DATE) - 1".
        " GROUP BY MONTH(checkIn);";
        
    $profitThisYear = $conn->query($thisYearProfit);
    $flightsOnThisYear = $conn->query($thisYearFlights);
    $flightsOnLastYear = $conn->query($lastYearFlights);

    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


    $thisMonthRecords = User::count($conn, "thisMonth")[0];
    $totalRecords = User::count($conn)[0];
    // print_r($totalRecords);
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

        let thisYear = new Date().getFullYear();
        let lastYear = new Date().getFullYear() - 1;
        
        date = new Date()
        // console.log("Hello" + date.getFullYear());
        console.log(thisYear + " vs " + lastYear + " flight number");

        var chart = new CanvasJS.Chart("flightsChart", {
            animationEnabled: true,
            title:{
                text: thisYear + " vs " + lastYear + " flight number through months"
            },	
            toolTip: {
                shared: true
            },
            legend: {
                cursor:"pointer",
            },
            data: [{
                type: "column",
                name: thisYear.toString(),
                legendText: thisYear.toString(),
                showInLegend: true, 
                dataPoints:[
                    <?php
                            $count1 = 0;
                            // $months = 0;
                        while ($flights = $flightsOnThisYear->fetch(PDO::FETCH_ASSOC)):
                            
                            echo  "{ label: '". $months[$count1]  . "', y: ". $flights['num'] ." },";
                            $count1++;
                            // $months++;
                        endwhile;        
                    ?>

                ]
            },
            {
                type: "column",	
                name: lastYear.toString(),
                legendText: lastYear.toString(),
                axisYType: "secondary",
                showInLegend: true,
                dataPoints:[
                    
                    <?php
                            $count2 = 0;
                            // $countMonths = 0;
                        while ($flights = $flightsOnLastYear->fetch(PDO::FETCH_ASSOC)):
                            echo  "{ label: '". $months[$count2]  . "', y: ". $flights['num'] ." },";
                            $count2++;
                            // $countMonths++;
                            if($count1 === $count2){
                                break;
                            }
                        endwhile;        
                    ?>
                                ]
            }]
        });
        chart.render();

        

    }

</script>




