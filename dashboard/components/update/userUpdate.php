<?php 
include "../databaseConfig.php";


if (isset($_GET['id'])){
   $id = $_GET['id'];
}
else {
	$id=$dataArr->id;
}

// Query for user
$sql = "SELECT u.firstname as 'firstname',
 u.lastname as 'lastname',
 u.email as 'email',
 u.birthday as 'birthday', 
 u.gendre as 'gendre',
 u.address as 'address' , 
u.city as 'city' ,
 u.state as 'state' ,
 u.postal as 'postal' , 
u.phoneNumber as 'phoneNumber',
 concat('../../AirAgency/uploads/user-img/',img) as img , 
u.createdAt as 'createdAt',
u.updatedAt as 'updatedAt' ,
 c.number as 'number' , concat(c.expMonth , '/' , c.expYear) as expDate 
 FROM  users u
LEFT JOIN Card c on u.id=c.userId where u.id=".$id."";
   
    
$statement = $conn->prepare($sql);  
$statement->execute();
$userDetail = $statement->fetch(); 

?>
                   
                
                    <div class="col-md-8" style="margin-left:150px;">                         
						 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit User</h4>
                            </div>
                            <div class="content">
                           
                            <form action="/../AirAgency/global/users/updateUsersQueryLavda.php" method="post" enctype="multipart/form-data">
<!--                            <form action="/../AirAgency/uploads/user-img/shpendi.jpg" method="post" enctype="multipart/form-data">-->
                            <div class="row" style="margin-left:300px;">
                            <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="img">
                        <img style="height:150px; width:auto" id="profileImg" alt="profile" class="avatar"  src="<?php echo $userDetail['img']; ?>" onclick="clicked(this)" />
                        </div>
                           </div>
                                      <?php 
										if(isset($_SESSION['errors'])){
											foreach($_SESSION['errors'] as $updateError){
												echo "<p style='color:red'>$updateError</p>";
											}
										}
                             if(isset($_SESSION['sucess'])){
												echo "<p style='color:green'>" .$_SESSION['sucess']. "</p>";
											
										}		
									?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>First Name</label>
                                                <input type="text" name="firstname" class="form-control"  placeholder="First Name" value="<?php echo $userDetail["firstname"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>LAST NAME</label>
                                                <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $userDetail["lastname"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 30px;">
                                        <label style="padding-right:5px"> Gender </label>
                                        <br>
                                        <select name="gendre" style="padding:7.5px;">
                                              <option <?php echo $userDetail["gendre"] == "M" ? "selected" : "" ?> value="M">M</option>
                                              <option <?php echo $userDetail["gendre"] == "F" ? "selected" : "" ?> value="F">F</option>
                                        </select> 
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birthday</label>l
                                                <input type="date" name="birthday" class="form-control" placeholder="Birthday" value="<?php echo $userDetail["birthday"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Home Address" width="20" value="<?php echo $userDetail["address"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                 <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="Home Address" width="20" value="<?php echo $userDetail["email"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                                                         

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $userDetail["city"] ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="state" class="form-control" placeholder="Country" value="<?php echo $userDetail["state"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" name="postal" class="form-control" placeholder="ZIP Code" value="<?php echo $userDetail["postal"] ?>">
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" name="phoneNumber" class="form-control" placeholder=" +000-00-000-000" value="<?php echo $userDetail["phoneNumber"] ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $userDetail["createdAt"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $userDetail["updatedAt"] ?>">
                                            </div>
                                        </div>
                                     </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Card Number</label>
                                                <input type="text" name="number" class="form-control" placeholder="Card Number" value="<?php echo $userDetail["number"]?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="datetime" name="expireDate" class="form-control" placeholder="__/__/____" value="<?php echo $userDetail["expDate"] ?>">
                                            </div>
                                        </div>
                                    </div>    

                                    <button name="userUpdate" type="submit" class="btn btn-info btn-fill pull-right">Update User</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                      </div>
			<!--	<div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar" src='<?php echo $userDetail['img'];?>' style="width=150px; height=150px;" alt="..."/>

                                      <h4 class="title"><?php echo $userDetail["firstname"] . " " . $userDetail["lastname"];?> <br />
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
                    </div>-->

                    
                    
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


                   


































