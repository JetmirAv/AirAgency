<?php

include_once("../databaseConfig.php");
$id = $dataArr->id;
$findLoggedUserQuery = "
select 
	u.id, 
    u.firstname, 
    u.lastname, 
    u.email, 
    u.gendre, 
    u.birthday, 
    u.address, 
    u.city, 
    u.state, 
    u.postal, 
    u.phoneNumber, 
    u.img,
    c.number, 
    concat(c.expMonth, '/', c.expYear) as 'c.exp', 
    c.code
		from users u left join card c on u.id = c.userID where u.id = ?";
$findUserQuery = $conn->prepare($findLoggedUserQuery);
$findUserQuery->execute([$id]);
if ($findUserQuery->rowCount() > 0) {
    $user = $findUserQuery->fetchAll()[0];
    


?>
<style>
    input[type="text"]::placeholder {
        color:gray;
    }
    input[type="text"],
    input[type="password"],
    input[type="date"],
    option
     {
        color:#138496;
    }
</style>
<div style="        
        
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
        margin: 5% auto;
        " class="col-md-9">
    <div style="background-color: rgba(0.9, 0.9,0.9, 0.5)" class="card">
        <div style="        
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        margin: 3% auto 0.5% auto;
        " class="header">
            <h4 style="color:white; display: inline-block; text-align: center" class="title">Your Profile</h4>

        </div>

        <div style="padding: 3%; color:white" class="content" style="align-content: center;">
            <form method="POST" action="../../AirAgency/global/users/updateUsersQueryFinal.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="img">
                        <img style="height:150px; width:auto" id="profileImg" alt="profile" src="../uploads/user-img/<?php echo $user[11] ?> " onclick="clicked(this)" />
                    </div>
                </div>
                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;" class="row">
                    <br />
                    <div class="col-md-4">
                        <div class="form-group" style="width: 250px;">
                            <label>First Name</label>
                            <input value="<?php echo $user[1] ?>" name="firstname" type="text" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-3" style="width: 300px;">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input value="<?php echo $user[2] ?>" name="lastname" type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div style="color:#6C7581" class="col-md-3" style="width: 30px;">
                        <label style="padding-right:5px"> Gender </label>
                        <br>
                        <select name="gendre" style="color:black; padding:7.5px;">
                            <option <?php echo $user[4] == 'M' ? "selected" : null  ?> value=1>M</option>
                            <option <?php echo $user[4] == 'F' ? "selected" : null  ?> value=2>F</option>
                        </select>
                    </div>

                </div>

                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;" class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input value="<?php echo $user[3] ?>" name="email" type="text" placeholder="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" placeholder="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Birthday</label>l
                            <input value="<?php echo $user[5] ?>" name="birthday" type="date" class="form-control" placeholder="Birthday">
                        </div>
                    </div>
                </div>

                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;" class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Address</label>
                            <input value="<?php echo $user[6] ?>" name="address" type="text" class="form-control" placeholder="Home Address" width="20">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City</label>
                            <input value="<?php echo $user[7] ?>" name="city" type="text" class="form-control" placeholder="City">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <input value="<?php echo $user[8] ?>" name="state" type="text" class="form-control" placeholder="Country">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input value="<?php echo $user[9] ?>" name="postal" type="text" class="form-control" placeholder="ZIP Code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone number</label>
                            <input value="<?php echo $user[10] ?>" name="phoneNumber" type="text" class="form-control" placeholder=" +000-00-000-000">
                        </div>
                    </div>
                </div>
                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;" class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input value="<?php echo $user[12] ?>" name="number" type="text" class="form-control" placeholder="Card Number" width="20">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Exp Date</label>
                            <input value="<?php echo $user[13] ?>" name="expireDate" type="text" class="form-control" placeholder="Exp Date">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Code</label>
                            <input value="<?php echo $user[14] ?>" name="code" type="text" class="form-control" placeholder="Code">
                        </div>
                    </div>
                </div>
                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
        margin-bottom: 2%" class="row">
                    <button name="userUpdate"  value="<?php echo $id ?>" type="submit" class="btn btn-info btn-fill pull-right">Update User</button>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<!-- <div class="col-md-4">
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
 -->

</div>
<?php }?>
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