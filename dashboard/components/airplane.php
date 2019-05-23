<!doctype html>
<html lang="en">
<?php include "head.php" ?>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.html">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <?php include "header.php" ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Airplane</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row" style="margin-left:25%">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>Name</label>
                                                <input type="text" class="form-control"  placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group" style="width:120px;">
                                                <label>Year Of Produce</label>
                                                <input type="number" class="form-control" placeholder="Year" min="1800" style="width: 120px; padding-right:20">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <label style="padding-right:5px ; padding-left:-10px;"> Seats </label>
                                        <input type="number" class="form-control" placeholder="Seats">
                                        </div>
                                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fuel Capacity</label>
                                                <input type="number" placeholder="Fuel Capacity" class="form-control" style="width: 150px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="width:150px;">
                                            <div class="form-group">
                                                <label>Max Speed</label>l
                                                <input type="number" class="form-control" placeholder="Max speed" style="width: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" style="margin-left:23.5%">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="text" class="form-control" placeholder="          __/__/____">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input type="text" class="form-control" placeholder="          __/__/____">
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row" style="padding-left:18px; padding-right:18px; padding-bottom:10px">
                                     <label>AdditionalDesc</label>
                                     <textarea rows="5" class="form-control" placeholder="Here can be your description"></textarea>   
                                     </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title">Mike Andrew<br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


<?php include "footer.php" ?>

    </div>
</div>


</body>

<?php include "script.php" ?>

</html>
