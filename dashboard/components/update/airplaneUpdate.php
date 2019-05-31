<?php 

include "../databaseConfig.php";


// Query Airplane 
if (isset($_GET['id'])){
   $id = $_GET['id'];


$sqlPlane="select * from airplane where id= 27;";


$planeStatement = $conn->prepare($sqlPlane);
$planeStatement -> execute();
$planeDetail = $planeStatement->fetch();

?> 
                <div class="col-md-8" style="margin-left:150px;">
					<div class="card">
                            <div class="header">
                                <h4 class="title">Edit Airplane</h4>
                            </div>
                            <div class="content">
                               <form action="../dashboard/components/airplane/updateAirplaneQuery.php"  method="POST" enctype="multipart/form-data">
                                   <div class="row" style="margin-left:300px;">
                            <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="img">
                        <img style="height:150px; width:auto" id="profileImg" alt="profile" class="avatar"  src="../../AirAgency/uploads/airplane-img/<?php echo $planeDetail['img'];?>" onclick="clicked(this)" />
                        </div>
                           </div>
                                    <?php 
										if(isset($_SESSION['gabimet'])){
											foreach($_SESSION['gabimet'] as $updError){
												echo "<p style='color:red'>$updError</p>";
											}
										}
                             if(isset($_SESSION['sukses'])){
												echo "<p style='color:green'>" .$_SESSION['sukses']. "</p>";
											
										}		
									?>
                                    <div class="row" style="margin-left:25%">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php echo $planeDetail['name'];?>"> 
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group" style="width:120px;">
                                                <label>Year Of Produce</label>
                                                <input maxlength="4" minlength="4" min="0" type="text" name="yearOfProd" class="form-control" placeholder="Year" min="1800" style="width: 120px; padding-right:20" value="<?php echo $planeDetail['yearOfProd'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <label style="padding-right:5px ; padding-left:-10px;"> Seats </label>
                                        <input type="Text" name="seats" class="form-control" placeholder="Seats" value="<?php echo $planeDetail['seats'];?>"> 
                                        </div>
                                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fuel Capacity</label>
                                                <input type="Text" name="fuelCapacity" placeholder="Fuel Capacity" class="form-control" value="<?php echo $planeDetail['fuelCapacity'];?>" style="width: 150px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="width:150px;">
                                            <div class="form-group">
                                                <label>Max Speed</label>l
                                                <input type="Text" name="maxspeed" class="form-control" placeholder="Max speed" value="<?php echo $planeDetail['maxspeed'];?>" style="width: 150px;">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row" style="margin-left:23.5%">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input disabled type="datetime" class="form-control" placeholder=" __/__/____" value="<?php echo $planeDetail['createdAt'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input disabled type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $planeDetail['updatedAt'];?>" >
                                            </div>
                                        </div>
                                           
                                     </div>
                                     <div class="row" style="padding-left:18px; padding-right:18px; padding-bottom:10px">
                                     <label>AdditionalDesc</label>
                                     <textarea rows="5" name="additionalDesc" class="form-control" placeholder="Here can be your description"><?php echo $planeDetail['additionalDesc']; ?></textarea>   
                                     </div>

                                    <button name="updateAirplane" type="submit" value="submit" class="btn btn-info btn-fill pull-right">Update Airplane</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
					</div>
					<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profileImg')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function clicked() {
        $("#profileUpload").click()
    }
</script>                    

					
				
				<?php 		}
						else{
						echo "Click on one airplane first ";
						}


