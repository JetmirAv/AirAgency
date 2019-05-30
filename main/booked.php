<!DOCTYPE html>
<html lang="en">
<?php include 'components/head.php' ?>
<body>

	
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

               <tr id="1">
				<td>Prishtin</td>
				<td>Wiene</td>
				<td>500</td>
				<td>0</td>
				<td style="padding-left:40px ;">0</td>
			    <td style="padding-left:60px ;">5</td>
			    <td>25-04-20019 10:10:10</td>
				<td><button class="btn btn-success form-control" style="width:85%;  margin-left:10px; padding-right:12px">Cancel</button></td>   
			</tr>
				
			</tbody>
</table>

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