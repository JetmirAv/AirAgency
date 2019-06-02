<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php'; 
      include '../databaseConfig.php';
      session_start();
      require("../global/isLogged.php");
    
 ?>
<body>  


    	
    
    <div id="backdrop" style="
		position: fixed;
		display: none;
		background-color: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 300"></div>
		<div id="bookedInfo" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
		text-align: center">
			<h3>Delete Booking</h3>
			<h4 style="font-weight: 300" id="booking">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmDelete" type="submit" name="deleteUser">Delete</button>
				</div>
		</div>

<?php 

$userId=$dataArr->id;
$sql="select b.id, b.userId  , c1.name as 'From' , c2.name as 'To' , f.price as 'Price' ,
f.isSale as 'Sale' , (f.price - (f.price* f.isSale/100)) as 'SalePrice' ,
b.quantity as 'TicketsBought',
b.createdAt as 'boookedDate'  from flight f 
INNER JOIN city c1 on f.fromCity=c1.id 
INNER JOIN city c2 ON f.toCity=c2.id
INNER JOIN booked b ON b.flightId=f.id   where b.userId='.$userId.' ; " ;

$sqlQuery=$conn->prepare($sql);
$sqlQuery->execute();
$sqlStm = $sqlQuery->fetchAll();    
    
?>
																			
	<!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->
    <!-- Header Area Start -->
    <?php include 'components/header.php' ?>
    <!-- Header Area End -->
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/17.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Blog Left Sidebar</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Left Sidebar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    		<table class="table table-hover table-striped" style="margin-left:20px ; margin-right:100px; width:97%" >
			<thead>
				<th>From</th>
				<th>To</th>
				<th>Price</th>
				<th>Sale</th>
				<th>SalePrice</th>
				<th>Tickets bought</th>
				<th>Booked Date</th>
				<th></th>
			</thead>
			<tbody id="loadDataTable">
     
      <?php foreach($sqlStm as $row){
      echo ' 
                <tr id="1">
				<td>'.$row['From'].'</td>
				<td>'.$row['To'].'</td>
				<td>'.$row['Price'].'</td>
				<td>'.$row['Sale'].'</td>
				<td style="padding-left:40px ;">'.$row['SalePrice'].'</td>
			    <td style="padding-left:60px ;">'.$row['TicketsBought'].'</td>
			    <td>'.$row['boookedDate'].'</td>
				<td><button id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="width:85%;  margin-left:10px; padding-right:12px" on >Cancel</button></td>   
                
                
			</tr>
				';
} ?>
                
			</tbody>
</table>
<button type="button" id="bttnMore" class="btn btn-success form-control" style="width:160px; margin-left:48%; margin-bottom:20px; background-color:lightblue">Show More</button>
    <!-- Blog Area Start -->
    <div class="roberto-news-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">

                    <!-- Single Blog Post Area -->

                    <!-- Pagination -->
                </div>

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="roberto-sidebar-area pl-md-4">

                        <!-- Newsletter -->
                        <!-- Instagram -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->

   
    <?php include 'components/footer.php' ?>

</body>

</html>

<script>
        $(document).ready(function() {
let offset = 10;
var userId = "<?php echo $userId; ?>"; 

        $('#bttnMore').click(() => {
            $('#bttnMore').html("Loading...");
            $.ajax({

                url: 'moreBooked.php',
                type: 'POST',
                data: {
                    offset,
                    userId
                },
                success: function(data) {
                    if(data != ""){
                        offset += 10;
                        $('#loadDataTable').append(data);
                        $('#bttnMore').html("Show More");
                    } else {
                        $('#bttnMore').html("No more data");
                        $('#bttnMore').attr('disabled', true)
                    }
                }
            });
        });

        });


    
    
    
    let bookedInfo = document.getElementById("bookedInfo");
		let backdrop = document.getElementById("backdrop");
		let bookingId = '';

		function deleteHandler(id, name, email) {
			bookedInfo.style.display = "block";
			backdrop.style.display = "block";
			bookingId = id;
			console.log("ID: " + id);
			document.getElementById('booking').innerHTML = "ID: " + id;

		}

		backdrop.onclick = () => {
			bookedInfo.style.display = "none";
			backdrop.style.display = "none";
		}


		document.getElementById("bttnConfirmCancel").onclick = (e) => {
			e.preventDefault();
			bookedInfo.style.display = "none";
			backdrop.style.display = "none";
		}

		document.getElementById("bttnConfirmDelete").onclick = (e) => {
			
			$.ajax({
				url: "cancelBooking.php",
				type: "POST",
				data: {
					"id": bookingId
				}
			}).done(function(data) {
				location.reload();
			});
		}
            
    
    
    
    

</script>








