<?php
include "../databaseConfig.php";

$allCities = "select id,name from city order by name ; ";
$cityStm = $conn->prepare($allCities);
$cityStm->execute();
$results = $cityStm->fetchAll();

?>

<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title">Edit Flights</h4>
        </div>
        <div class="content">
            <form action="components/dashboard/updateFlight.php" method="post">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group" style="width: 250px;">
                            <label>From City</label>
                            <input type="Text" name="fromCity" class="form-control" placeholder="From...">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group" style="width: 250px;">
                            <label>From City</label>
                            <select name="fromCity">
                                <option value="fromCity">Select</option>
                                <?php foreach ($results as $output) { ?>
                                    <option value=<?php $output["id"] ?>><?php echo $output["name"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group" style="width: 250px;">
                            <label>Image</label>
                            <input type="file" value="img" name="img">

                        </div>
                    </div>


                    <div class="col-md-3" style="width: 300px;">
                        <div class="form-group">
                            <label>To City</label>
                            <input type="text" name="toCity" class="form-control" placeholder="To...">
                        </div>
                    </div>
                    <div class="col-md-3" style="width: 80px;">
                        <label style="padding-right:5px"> Available </label>
                        <br>
                        <input type="text" name="avalible" class="form-control">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Airplane</label>
                            <input name="planeId" type="text" placeholder="Airplane" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CheckIn</label>l
                            <input name="checkIn" type="datetime" class="form-control" placeholder="__/__/____">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="Text" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-3" style="width: 90px;">
                        <label> isSale </label>
                        <br>
                        <input name="isSale" type="number" class="form-control">
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Created at</label>
                            <input name="createdAt" type="datetime" class="form-control" placeholder="__/__/____">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Updated at</label>
                            <input name="updatedAt" type="datetime" class="form-control" placeholder="__/__/____">
                        </div>
                    </div>

                </div>

                <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
        </div>
        <div class="content">
            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..." />

                    <h4 class="title">
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