<?php include_once("constants.php"); ?>
<?php 
?>
<!-- Footer Area Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="img/core-img/logo2.png" alt=""></a>

                        <h4><?php echo PHONE ?></h4>
                        <span><?php echo EMAIL ?></span>
                        <span><?php echo ADDRESS . ". " . POSTAL . ". " . CITY . ", " . STATE ?></span>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Our Blog</h5>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Freelance Design Tricks How</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Free Advertising For Your Online</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Links</h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Our Room</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Career</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> FAQs</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Subscribe Newsletter</h5>
                        <span>Subscribe our newsletter gor get notification about new updates.</span>

                        <!-- Newsletter Form -->
                        <form class="form-search">
                            <input id="email_data" type="email" class="form-control" placeholder="Enter your email...">
                            <button id="subscribeBtn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            <span class="email-message" id="email_msg"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- Social Info -->
                    <div class="social-info">
                        <a href="<?php echo FACEBOOK; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="<?php echo TWITTER; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="<?php echo INSTAGRAM; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="<?php echo GOOGLE; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {

        $('#subscribeBtn').click((e) => {
            var email = $("#email_data").val();
            e.preventDefault();
            if (email == '') {
                $("#email_msg").html("Enter an email address!");
            }

            //console.log(email);
            else {
                $.ajax({
                    url: "components/subscribers.php",
                    method: "POST",
                    data: {
                        email: email
                    },
                    dataType: "text",
                    success: function(data) {
                        alert(data);
                        $('#email_data').append(data);
                    }
                });
            }
        });
    });
    //     
</script>
<!-- Footer Area End -->

<?php
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
}
session_unset();
if (isset($token)) {
    $_SESSION['token'] = $token;
}


?>

<!-- **** All JS Files ***** -->
<!-- jQuery 2.2.4 -->
<script src="js/jquery.min.js"></script>
<!-- Popper -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- All Plugins -->
<script src="js/roberto.bundle.js"></script>
<!-- Active -->
<script src="js/default-assets/active.js"></script>