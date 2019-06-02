<div class="col-md-8" style="margin-left:15%;">
    <div class="card">
        <div class="header">
            <h4 class="title">Insert Airplane</h4>
        </div>
        <div class="content">


            <form method="POST" action="../dashboard/components/airplane/insertAirplaneQuery.php" enctype="multipart/form-data">
                <div class="row" style="margin-left:300px;">
                    <div class="form-group">
                        <label>Image</label>l
                        <input type="file" name="img" class="form-control" placeholder="Image" value="img" style="width: 150px;">
                    </div>
                </div>

                <?php
                if (isset($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $updateError) {
                        echo "<p style='color:red'>$updateError</p>";
                    }
                }
                if (isset($_SESSION['success'])) {
                    echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
                }
                ?>




                <div class="row" style="margin-left:21%">
                    <div class="col-md-5" style="width:40%;">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="">
                        </div>
                    </div>

                    <div class="col-md-5" style="width:40%;">
                        <div class="form-group">
                            <label>Year Of Produce</label>
                            <input type="Text" name="yearOfProd" class="form-control" placeholder="Year" min="1800" style=" padding-right:20" value="">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <label style="padding-right:5px ; padding-left:-10px;"> Seats </label>
                        <input type="Text" name="seats" class="form-control" placeholder="Seats" value="">
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fuel Capacity</label>
                            <input type="Text" name="fuelCapacity" placeholder="Fuel Capacity" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Max Speed</label>l
                            <input type="Text" name="maxspeed" class="form-control" placeholder="Max speed" value="">
                        </div>

                    </div>
                </div>
                <div class="row" style="padding-left:18px; padding-right:18px; padding-bottom:10px">
                    <label>AdditionalDesc</label>
                    <textarea rows="5" name="additionalDesc" class="form-control" placeholder="Here can be your description"></textarea>
                </div>

                <button name="insertAirplane" type="submit" value="submit" class="btn btn-info btn-fill pull-right">Insert Airplane</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>