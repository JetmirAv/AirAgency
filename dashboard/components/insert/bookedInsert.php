<div class="card">
    <div class="header">
        <h4 class="title">Booked Details</h4>
    </div>
    <div class="content">
        <form action="components/dashboard/deleteBooked.php" method="POST">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group" style="width: 250px;">
                        <label>From City</label>
                        <input type="text" class="form-control" placeholder="From...">
                    </div>
                </div>
                <div class="col-md-3" style="width: 300px;">
                    <div class="form-group">
                        <label>To City</label>
                        <input type="text" class="form-control" placeholder="To... ">
                    </div>
                </div>

            </div>

            <div class="row" style="margin-right:14%;">
                <div class="col-md-6">
                    <div class="form-group" style="width:250px;">
                        <label>Airplane</label>
                        <input type="text" placeholder="Airplane" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="width:188px;">
                        <label>Quantity</label>l
                        <input type="text" class="form-control" placeholder="Quantity">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" style="width: 270px;">
                    <div class="form-group">
                        <label>User</label>
                        <input type="text" class="form-control" placeholder="User... ">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group" style="padding-left:10px;">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Price">
                    </div>
                </div>
                <div class="form-group" style="padding-left:10px;">
                    <label>Id</label>
                    <input type="text" class="form-control" placeholder="id" value="" name="id">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="margin-right:9%;">
                    <div class="form-group" style="width:250px;">
                        <label>Created at</label>
                        <input type="datetime" class="form-control" placeholder="__/__/____">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" style="width:250px;">
                        <label>Updated at</label>
                        <input type="text" class="form-control" placeholder="__/__/____" >
                    </div>
                </div>
                </div>

            <button type=" submit" class="btn btn-info btn-fill pull-right">Update Booked</button>
                        <div class="clearfix"></div>
        </form>
    </div>
</div>