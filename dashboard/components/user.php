<?php 
include "../databaseConfig.php";


// Query for user
$sql = "SELECT firstname , lastname , email , password , birthday , gendre , address , city , state , postal , phoneNumber , img , 
createdAt , updatedAt FROM  users WHERE id=2;";


// Query for Card User
$sqlCard = "SELECT  c.number ,  concat(c.expMonth , '/' , c.expYear) as expDate from Card c 
INNER JOIN users u 
ON u.id = c.id 
WHERE u.id = 2;";
   

$statement = $conn->prepare($sql);
$statement->execute();
$userDetail = $statement->fetchAll(); 

$cardStatement = $conn->prepare($sqlCard);
$cardStatement -> execute();
$cardUserDetail = $cardStatement->fetchAll();



?>

<?php  foreach($userDetail as $userDt){ ?>
                        
     <?php foreach($cardUserDetail as $cardUser) { ?>


                    <div class="col-md-8">                         
						 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit User</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>First Name</label>
                                                <input type="text" class="form-control"  placeholder="First Name" value="<?php echo $userDt["firstname"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>LAST NAME</label>
                                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $userDt["lastname"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 30px;">
                                        <label style="padding-right:5px"> Gender </label>
                                        <br>
                                        <select style="padding:7.5px;">
                                              <option class="form-group"><?php echo $userDt["gendre"] ?></option>
                                              <option value="F">F</option>
                                        </select> 
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" placeholder="password" class="form-control" value="<?php echo $userDt["password"]?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Birthday</label>l
                                                <input type="date" class="form-control" placeholder="Birthday" value="<?php echo $userDt["birthday"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" width="20" value="<?php echo $userDt["address"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                                                         

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" placeholder="City" value="<?php echo $userDt["city"] ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" placeholder="Country" value="<?php echo $userDt["state"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" class="form-control" placeholder="ZIP Code" value="<?php echo $userDt["postal"] ?>">
                                            </div>
                                        </div>
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control" placeholder=" +000-00-000-000" value="<?php echo $userDt["phoneNumber"] ?>">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $userDt["createdAt"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $userDt["updatedAt"] ?>">
                                            </div>
                                        </div>
                                     </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                                <label>Card Number</label>
                                                <input type="text" class="form-control" placeholder="Card Number" value="<?php echo $cardUser["number"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Expire Date</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $cardUser["expDate"] ?>">
                                            </div>
                                        </div>
                                    </div> <?php } }?>    

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

                                      <h4 class="title"><?php echo $userDt["firstname"] . " " . $userDt["lastname"];?> <br />
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


                   


































