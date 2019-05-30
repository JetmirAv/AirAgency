<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include 'components/head.php' ?>
    
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>s
    <!-- /Preloader -->
    <!-- Header Area Start -->
    <?php include 'components/header.php' ?>
    <!-- Header Area End -->
    
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area contact-breadcrumb bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/18.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content text-center mt-100">
                        <h2 class="page-title">Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Google Maps & Contact Info Area Start -->
    <section class="google-maps-contact-info">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Phone</h4>
                            <p><?php echo PHONE; ?></p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Address</h4>
                            <p><?php echo ADDRESS;?></p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Open time</h4>
                            <p>10:00 am to 23:00 pm</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Email</h4>
                            <p><?php echo EMAIL; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="google-maps">
                    <iframe src="https://maps.google.com/maps?q=Prishtina&t=&z=13&ie=UTF8&iwloc=&output=embed"allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Maps & Contact Info Area End -->

    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Contact Us</h6>
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
                        <form  method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                    <label>Subject</label>
                                    <input type="text" name="message-name" class="form-control mb-30" placeholder="Subject" id="subject">
                                </div>
                                <div>
                                <label style="padding-left:10px;">Rating</label>
                                <input type="number" id="rating" style="width:100px;  margin-right:5px;" class="form-control mb-30">
                                </div>
                                
                                <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                   <label>Content</label>
                                    <textarea name="message" class="form-control mb-30" placeholder="Your Message" id="content"></textarea>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                <p id="mesazhi"></p>
                                    <button name="contactUs" type="button" id="buttonClick" class="btn roberto-btn mt-15">Send Message</button>
                                </div>
                                
                                <?php $userId=$dataArr->id;  ?>
                                
                                <script>
		                             $(document).ready(function() {
                                    $('#buttonClick').click(function(){
                                        var subject = $("#subject").val();
                                        var rating = $("#rating").val();
                                        var content = $("#content").val(); 
                                        var userId = "<?php echo $userId; ?>";
                                         
                                             $.ajax({
                                               url: "contactUs.php",
                                               method: "POST",
                                                data: {
                                                    userId: userId, 
                                                    subject: subject,
                                                    rating: rating,
                                                    content:content
                                                },
                                                dataType: "text",
                                                success: function(data) {
                                                    $('#mesazhi').append(data);
                                                        }
});
                                    
                                    });
                                    
                            
        });
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->

   
    <?php include 'components/footer.php' ?>

</body>

</html>