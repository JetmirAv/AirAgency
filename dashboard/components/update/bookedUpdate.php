<?php                            
 include "../databaseConfig.php";
if (isset($_GET['id'])){
   $id = $_GET['id'];


$sqlBooked = "Select b.id, CONCAT(u.firstname, ' ' , u.lastname) as 'fullname',
c1.name AS 'From',
c2.name AS 'To',
a.name AS 'Plane',
b.quantity as 'Quantity',
b.price as 'Price',
b.createdAt as 'Created At',
b.updatedAt as 'Update At'
FROM booked b
INNER JOIN users u
ON u.id=b.userId
INNER JOIN flight f 
ON b.flightId=f.id
INNER JOIN city c1
ON f.fromCity=c1.id
INNER JOIN city c2
ON f.toCity=c2.id
INNER JOIN airplane a
ON f.planeId=a.id
where b.id=".$id.";" ; 

$bookedStatement = $conn->prepare($sqlBooked);
$bookedStatement->execute();
$bookedDetails = $bookedStatement->fetch();

?>                        
                           
                           
                           <div class="card">
                            <div class="header">
                                <h4 class="title">Booked Details</h4>
                            </div>
                            <div class="content">
<!--
                                <form action="components/dashboard/deleteBooked.php" method="POST">
-->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>From City</label>
                                                <input type="text" class="form-control"  placeholder="From..." value="<?php echo $bookedDetails['From']; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>To City</label>
                                                <input type="text" class="form-control" placeholder="To... " value="<?php echo $bookedDetails['To']; ?> " >
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row" style="margin-right:14%;">
                                        <div class="col-md-6">
                                            <div class="form-group" style="width:250px;">
                                                <label>Airplane</label>
                                                <input type="text" placeholder="Airplane" class="form-control" value="<?php echo $bookedDetails['Plane']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="width:188px;">
                                                <label>Quantity</label>l
                                                <input type="text" class="form-control" placeholder="Quantity" value="<?php echo $bookedDetails['Quantity']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-3" style="width: 270px;">
                                            <div class="form-group">
                                                <label>User</label>
                                                <input type="text" class="form-control" placeholder="User... " value="<?php echo $bookedDetails['fullname']; ?>">
                                            </div>
                                        </div>   
                                        
                                        <div class="col-md-4">
                                            <div class="form-group" style="padding-left:10px;">
                                                <label>Price</label>
                                                <input type="text" class="form-control" placeholder="Price" value="<?php echo $bookedDetails['Price']; ?>">
                                            </div>
                                        </div>                                                             <!-- <div class="form-group" style="padding-left:10px;">
                                                <label>Id</label>
                                                <input type="text" class="form-control" placeholder="id" value="" name="id">
                                            </div>  -->              
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4" style="margin-right:9%;">
                                            <div class="form-group" style="width:250px;">
                                                <label>Created at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $bookedDetails['Created At']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" style="width:250px;">
                                                <label>Updated at</label>
                                                <input type="text" class="form-control" placeholder="__/__/____" value="<?php echo $bookedDetails['Update At'];  ?>">
                                            </div>
                                        </div>
                                     </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Booked</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
<?php }
else {
	echo "Click on one user first";
}
?>