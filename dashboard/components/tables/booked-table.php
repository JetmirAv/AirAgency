<?php include "../databaseConfig.php" ?>
<?php include "../models/booked.php" ?>
<?php

// $sql = "select id,flightId,userId,price,quantity,createdAt,updatedAt from booked  limit 10 offset 0";
// $countAllRows = "select count(*) as count from booked ";
$rsResult = Booked::findAll($conn, 10, 0);
// print_r($rsResult);
// $rowCount = $conn->query($countAllRows);
$flight_id = '';
// $Count = $rowCount->fetch();
// $airplaneId = '';
?>

<div class="card">


    <div id="backdrop" style="
		position: fixed;
		display: none;
		background-color: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 300"></div>
    <div id="bookInfo" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
        text-align: center">
        <h3>Delete Book</h3>
        <h4 style="font-weight: 300" id="booking">
        </h4>
        <div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
            <button id="bttnConfirmCancel">Cancel</button>
            <button id="bttnConfirmDelete" type="submit" name="deleteUser">Delete</button>
        </div>
    </div>
    <div class="header">
        <h4 class="title">Number of bookings:<?php     ?></h4>
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
						<tr >
                            <td onclick="getBookedHandler(' . $row['id'] . ')" style="padding-left:25px;">' . $row['id'] . '</td>
						    <td onclick="getBookedHandler(' . $row['id'] . ')" style="padding-left:25px;">' . $row['flightId'] . '</td>
							<td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['userId'] . '</td>
							<td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['price'] . '</td>
                            <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['quantity'] . '</td>
                            <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['createdAt'] . '</td>
                            <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['updatedAt'] . '</td> 
                            <td><button type="button" onclick="deleteHandler(\' ' . $row["id"] . '\')"  class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>                   
                        </tr>';
                    // $airplaneId = $row['id'];
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
</div>
<script>
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


    function getBookedHandler(id) {
        window.location.href = '../dashboard/bookedInfo.php?id=' + id;
    }

    let flightInfo = document.getElementById("bookInfo");
    let backdrop = document.getElementById("backdrop");
    let flightId = '';

    function deleteHandler(id) {
        //console.log("Bravo")
        flightInfo.style.display = "block";
        backdrop.style.display = "block";
        flightId = id;
        console.log("ID: " + id);
        document.getElementById('booking').innerHTML = "Are you sure you want to delete this booking with ID: " + id;

    }

    backdrop.onclick = () => {
        flightInfo.style.display = "none";
        backdrop.style.display = "none";
    }


    document.getElementById("bttnConfirmCancel").onclick = (e) => {
        e.preventDefault();
        flightInfo.style.display = "none";
        backdrop.style.display = "none";
    }

    document.getElementById("bttnConfirmDelete").onclick = (e) => {
        $.ajax({
            url: "components/flights/deleteFlightQuery.php",
            type: "POST",
            data: {
                "id": flightId
            }
        }).done(function(data) {
            location.reload();
        });
    }
</script>