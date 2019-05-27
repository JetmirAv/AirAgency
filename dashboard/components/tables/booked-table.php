<div class="card">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php include "../databaseConfig.php" ?>
    <?php

    $sql = "select id,flightId,userId,price,quantity,createdAt,updatedAt from booked  limit 10";
    $countAllRows = "select count(*) as count from booked ";
    $rsResult = $conn->query($sql);
    $rowCount = $conn->query($countAllRows);
    $flight_id = '';
    $Count = $rowCount->fetch();
    $airplaneId = '';
    ?>

    <div class="header">
        <h4 class="title">Number of bookings:<?php echo $Count['count'] ?></h4>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Flight id</th>
                <th>User id</th>
                <th>Price </th>
                <th>Quantity</th>
                <th>Created at</th>
                <th>Updated at</th>
            </thead>
            <tbody id="loadDataTable">
                <?php

                foreach ($rsResult as $row) {
                    echo '
						<tr>
                            <td style="padding-left:25px;">' . $row['id'] . '</td>
						    <td style="padding-left:25px;">' . $row['flightId'] . '</td>
							<td>' . $row['userId'] . '</td>
							<td>' . $row['price'] . '</td>
                            <td>' . $row['quantity'] . '</td>
                            <td>' . $row['createdAt'] . '</td>
                            <td>' . $row['updatedAt'] . '</td> 
                            <td><button type="button"   class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>                   
                        </tr>';
                        $airplaneId = $row['id'];
                    }
               
                ?>
            </tbody>
        </table>
        <table id="firstRow">
            <tr id="removeRow">
                <button type="button" name="btnMore" data-vid="<?php echo $airplaneId; ?>" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button>
            </tr>
        </table>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#btnMore', function() {
            var lastFlightId = $(this).data("vid");
            $('#btnMore').html("Loading...");
            $.ajax({
                url: "components/tables/loading-booked.php",
                method: "POST",
                data: {
                    lastFlightId: lastFlightId
                },
                dataType: "html",
                success: function(data) {
                    if (data != '') {
                        $('#btnMore').remove();
                        $('#removeRow').remove();
                        $('#loadDataTable').append(data);

                    } else {
                        $('#btnMore').html("No Data");
                    }
                }
            });
        });
    });
</script>