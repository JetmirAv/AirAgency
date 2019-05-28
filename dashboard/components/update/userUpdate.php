<?php 
include "../databaseConfig.php";


// Query for user
$sql = "SELECT firstname , lastname , email , password , birthday , gendre , address , city , state , postal , phoneNumber , img , 
createdAt , updatedAt FROM  users WHERE id=15;";


// Query for Card User
$sqlCard = "SELECT  c.number as 'number' ,  concat(c.expMonth , '/' , c.expYear) as expDate from Card c 
INNER JOIN users u 
ON u.id = c.id 
WHERE u.id = 15;";
   

$statement = $conn->prepare($sql);
$statement->execute();
$userDetail = $statement->fetch(); 

$cardStatement = $conn->prepare($sqlCard);
$cardStatement -> execute();
$cardUserDetail = $cardStatement->fetch();



?>

                    <div class="col-md-8">                         
						 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit User</h4>
                            </div>
                            <div class="content">
                         <form action="components/users/updateUsersQuery.php" method="post">
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
                                              <option class="form-group"><?php echo $userDetail["gendre"] ?></option>
                                              <option value="F">F</option>
                                        </select> 
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo $userDetail["password"]?>">
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
                                                <input type="number" name="number" class="form-control" placeholder="Card Number" value="<?php echo $cardUserDetail["number"]?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="datetime"  class="form-control" placeholder="__/__/____" value="<?php echo $cardUserDetail["expDate"] ?>">
                                            </div>
                                        </div>
                                         <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="img" placeholder="Image" value="img" style="width: 120px;">
                                            </div> 
                                    </div>    

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update User</button>
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
                    </div>


                   


































