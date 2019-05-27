<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title">Edit Airplane</h4>
        </div>
        <div class="content">
            <form action="components/dashboard/updateAirplane.php" method="POST">
                <div class="row" style="margin-left:25%">
                    <div class="col-md-5">
                        <div class="form-group" style="width: 250px;">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="width:120px;">
                            <label>Year Of Produce</label>
                            <input type="Text" name="yearOfProd" class="form-control" placeholder="Year" min="1800" style="width: 120px; padding-right:20" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label style="padding-right:5px ; padding-left:-10px;"> Seats </label>
                        <input type="Text" name="seats" class="form-control" placeholder="Seats" value="">
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fuel Capacity</label>
                            <input type="Text" name="fuelCapacity" placeholder="Fuel Capacity" class="form-control" value="" style="width: 150px;">
                        </div>
                    </div>
                    <div class="col-md-6" style="width:150px;">
                        <div class="form-group">
                            <label>Max Speed</label>l
                            <input type="Text" name="maxspeed" class="form-control" placeholder="Max speed" value="" style="width: 150px;">
                        </div>
                        <div class="form-group">
                            <label>Image</label>l
                            <input type="file" name="img" class="form-control" placeholder="Image" value="img" style="width: 150px;">
                        </div>
                    </div>
                </div>


                <div class="row" style="margin-left:23.5%">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Created at</label>
                            <input type="datetime" class="form-control" placeholder=" __/__/____" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Updated at</label>
                            <input type="datetime" class="form-control" placeholder="__/__/____" value="">
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-left:18px; padding-right:18px; padding-bottom:10px">
                    <label>AdditionalDesc</label>
                    <textarea rows="5" name="additionalDesc" class="form-control" placeholder="Here can be your description"></textarea>
                </div>

                <button type="submit" value="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
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

                    <h4 class="title"><br />
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