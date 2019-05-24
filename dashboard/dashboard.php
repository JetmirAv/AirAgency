<!doctype html>
<html lang="en">
<?php include "components/head.php" ?>
<?php include "components/dashboard/charts.php" ?>

<body>

<div class="wrapper">
    <?php  include "components/sidebar.php"?>

    <div class="main-panel">
        <?php include "components/header.php" ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">User Statistics</h4>
                            </div>
                            <div class="content">
                                <div id="usersChart" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend" style="display: flex; justify-content: space-between;">
                                        <span><b>This Month:</b> <?php echo $thisMonthRecords; ?></span>
                                        <span><b>Other:</b> <?php echo $totalRecords; ?></span>
                                        <span><b>Total:</b> <?php echo $totalRecords + $thisMonthRecords; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Profit in <?php echo date('Y') ?></h4>
                            </div>
                            <div class="content">
                                <div id="profitChart" class="ct-chart"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title"><?php echo date("Y") . " vs " . ((int)date("Y") -1);  ?></h4>
                            </div>
                            <div class="content">
                                <div id="flightsChart" class="ct-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Last Booked</h4>
                            </div>
                            <div class="content">
                                <div class="table-full-width" style="width: 100%;
                                                                        margin: auto;
                                                                        height:305px;
                                                                        overflow: scroll;
                                                                        text-align: center;
                                                                        font-weight: 700;
                                                                        font-size: 1.5rem;">
                                    <!-- table -->
                                    <?php include "components/dashboard/notifications.php" ?>
                                </div>

                                <div class="footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "components/footer.php" ?>
    </div>
</div>
</body>
<?php include "components/script.php" ?>

</html>
