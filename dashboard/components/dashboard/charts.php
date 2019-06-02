<?php

require_once("../databaseConfig.php");
require_once("../models/users.php");
require_once("../models/flights.php");
require_once("../models/booked.php");
$months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

$profitThisYear = Booked::getProfitThroughYear($conn);

$flightsOnThisYear = Flight::getFlightsForYear($conn);
$flightsOnLastYear = Flight::getFlightsForYear($conn, 1);

$thisMonthRecords = User::count($conn, "thisMonth")[0];
$totalRecords = User::count($conn)[0];


$thisMonthPct = ($thisMonthRecords / $totalRecords) * 100;


$totalPct = 100 - $thisMonthPct;

?>
<script>
    window.onload = function() {


        var usersChart = new CanvasJS.Chart("usersChart", {
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [{
                        y: <?php echo $thisMonthPct; ?>,
                        label: "This Month"
                    },
                    {
                        y: <?php echo $totalPct; ?>,
                        label: "Other"
                    },
                ]
            }]
        });
        usersChart.render();


        var profitChart = new CanvasJS.Chart("profitChart", {
            animationEnabled: true,
            theme: "light2",
            axisY: {
                includeZero: false
            },
            data: [{
                type: "line",
                dataPoints: [
                    <?php

                    foreach ($profitThisYear as $profit) {
                        echo  "{ y: " . $profit['total'] . " },";
                    }
                    ?>
                ]
            }]
        });
        profitChart.render();

        let thisYear = new Date().getFullYear();
        let lastYear = new Date().getFullYear() - 1;

        date = new Date()

        var chart = new CanvasJS.Chart("flightsChart", {
            animationEnabled: true,
            title: {
                text: thisYear + " vs " + lastYear + " flight number through months"
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
            },
            data: [{
                    type: "column",
                    name: thisYear.toString(),
                    legendText: thisYear.toString(),
                    showInLegend: true,
                    dataPoints: [
                        <?php
                        $count1 = 0;
                        // $months = 0;
                        foreach ($flightsOnThisYear as $flights) {
                            echo  "{ label: '" . $months[$count1]  . "', y: " . $flights['num'] . " },";
                            $count1++;
                        }
                        ?>

                    ]
                },
                {
                    type: "column",
                    name: lastYear.toString(),
                    legendText: lastYear.toString(),
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints: [

                        <?php
                        $count2 = 0;
                        // $countMonths = 0;
                        foreach ($flightsOnLastYear as $flights) {
                            echo  "{ label: '" . $months[$count1]  . "', y: " . $flights['num'] . " },";
                            $count2++;
                            if ($count1 === $count2) {
                                break;
                            }
                        }
                        ?>
                    ]
                }
            ]
        });
        chart.render();



    }
</script>