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
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Flights</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Flights</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <section class="roberto-about-area section-padding-100-0">
        <!-- Flight Search Form Area -->
        <div class="hotel-search-form-area">
            <div class="container-fluid">
                <div class="hotel-search-form">
                    <?php include "components/flightSearch.php" ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/43.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Title</h2>
                            <h4>400&euro;</h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>To: <span>Spain</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <span style="display:block; width: 20px; "><input min=0 type="number" /></span>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/44.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Destination</h2>
                            <h4>400$ <span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/45.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Destination</h2>
                            <h4>400$ <span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/46.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Destination</h2>
                            <h4>400$ <span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/47.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Destination</h2>
                            <h4>400$ <span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="img/bg-img/48.jpg" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>Destination</h2>
                            <h4>400$ <span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>Avalible: <span>100</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
                                <h6>Time: <span><?php echo date("H-m"); ?></span></h6>
                            </div>
                            <a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>


                    <!-- Pagination -->
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next <i
                                        class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->


    <?php include 'components/footer.php' ?>

</body>

</html>