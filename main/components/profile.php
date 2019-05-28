<style>
    .test {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
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
            <h4 style="color:white; display: inline-block; text-align: center" class="title">Edit User</h4>

        </div>

        <div style="padding: 3%; color:white" class="content" style="align-content: center;">
            <form method="POST" action="../global/register.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="form-img">
                        <img style="height:150px; width:auto" id="profileImg" alt="profile" src="assets/img/backgrounds/1.jpg" onclick="clicked(this)" />
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
                            <input name="form-first-name" type="text" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-md-3" style="width: 300px;">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input  name="form-last-name" type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div style="color:#6C7581" class="col-md-3" style="width: 30px;">
                        <label style="padding-right:5px"> Gender </label>
                        <br>
                        <select name="form-gender" style="color:black; padding:7.5px;">
                            <option value=1>M</option>
                            <option value=2>F</option>
                        </select>
                    </div>

                </div>

                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;" class="row">
                    <div style="" class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="form-email" type="text" placeholder="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input name="form-password" type="password" placeholder="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Birthday</label>l
                            <input name="form-date" type="date" class="form-control" placeholder="Birthday">
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
                            <input name="form-address" type="text" class="form-control" placeholder="Home Address" width="20">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City</label>
                            <input name="form-city" type="text" class="form-control" placeholder="City">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <input name="form-state" type="text" class="form-control" placeholder="Country">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input name="form-postal" type="text" class="form-control" placeholder="ZIP Code">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone number</label>
                            <input name="form-phone" type="text" class="form-control" placeholder=" +000-00-000-000">
                        </div>
                    </div>
                </div>

                <div style=" display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-content: center;
        margin-bottom: 2%" class="row">
                    <button name="register" type="submit" class="btn btn-info btn-fill pull-right">Update User</button>
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
    function clicked(){
        $("#profileUpload").click()
    }
</script>