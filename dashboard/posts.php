<!doctype html>
<html lang="en">
 <?php include "components/head.php" ?>
<body>

<div class="wrapper">
<?php include "components/sidebar.php" ?>

    <div class="main-panel">
        <?php include "components/header.php" ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-12">
                        <div class="card card-posts">
                            <div class="header">
                                <h4 class="title">Posts
								<a href="#" class="btn btn-info btn-fill">Add New</a></h4>

								<div class="row">
									<div class="col-md-6">
										<div class="stats">
	                                        <a href="#">All</a>|
											<a href="#">Pending (0)</a>|
											<a href="#">Approved</a>|
											<a href="#">Spam (23,299)</a>
	                                    </div>
									</div>
									<div class="col-md-6">
										<form class="form-inline pull-right">
										  <div class="form-group">
										    <label class="sr-only">Search</label>
										    <input type="input" class="form-control" placeholder="Write here...">
										  </div>
										  <button type="submit" class="btn btn-default btn-fill">Search Posts</button>
										</form>
									</div>
								</div>
                            </div>
                            <div class="content table-responsive table-full-width">

                                <table class="table">
                                    <thead>
                                        <th></th>
										<th></th>
                                    	<th>Title</th>
                                    	<th>Author</th>
                                    	<th>Categories</th>
                                    	<th>Tags</th>
										<th></th>
										<th>Date</th>
										<th>SEO</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>
												<label class="checkbox">
													<input type="checkbox" value="" data-toggle="checkbox">
												</label>
											</td>
											<td>
												<img src="assets/img/blog-image.jpg"/>
											</td>
                                        	<td>How Apple is revolutionizing TV</td>
                                        	<td>Mike Doe</td>
                                        	<td>Business</td>
                                        	<td>-</td>
											<td>
												<i class="fa fa-comments"></i> 23
											</td>
											<td>
												2016/01/16 22:30
											</td>
											<td>
												<i class="fa fa-circle text-warning"></i>
											</td>
											<td class="td-actions text-right">
												<button type="button" rel="tooltip" title="View" class="btn btn-warning btn-simple btn-xs">
													<i class="fa fa-picture-o"></i>
												</button>
												<button type="button" rel="tooltip" title="Edit Post" class="btn btn-info btn-simple btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs">
													<i class="fa fa-times"></i>
												</button>
											</td>
                                        </tr>

										<tr>
                                        	<td>
												<label class="checkbox">
													<input type="checkbox" value="" data-toggle="checkbox">
												</label>
											</td>
											<td>
												<img src="assets/img/blog-cover-christmas.jpg"/>
											</td>
                                        	<td>Christmas Offers and Gifts on Creative Tim</td>
                                        	<td>John Doe</td>
                                        	<td>Web Design</td>
                                        	<td>-</td>
											<td>
												<i class="fa fa-comments"></i> 12
											</td>
											<td>
												2015/01/16 22:30
											</td>
											<td>
												<i class="fa fa-circle text-success"></i>
											</td>
											<td class="td-actions text-right">
												<button type="button" rel="tooltip" title="View" class="btn btn-warning btn-simple btn-xs">
													<i class="fa fa-picture-o"></i>
												</button>
												<button type="button" rel="tooltip" title="Edit Post" class="btn btn-info btn-simple btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs">
													<i class="fa fa-times"></i>
												</button>
											</td>
                                        </tr>

										<tr>
                                        	<td>
												<label class="checkbox">
													<input type="checkbox" value="" data-toggle="checkbox">
												</label>
											</td>
											<td>
												<img src="assets/img/blog-wordpress.png"/>
											</td>
                                        	<td>Introducing WordPress Items on Creative Tim</td>
                                        	<td>John Doe</td>
                                        	<td>Web Design</td>
                                        	<td>business, wordpress</td>
											<td>
												<i class="fa fa-comments"></i> 78
											</td>
											<td>
												2016/01/16 22:30
											</td>
											<td>
												<i class="fa fa-circle text-success"></i>
											</td>
											<td class="td-actions text-right">
												<button type="button" rel="tooltip" title="View" class="btn btn-warning btn-simple btn-xs">
													<i class="fa fa-picture-o"></i>
												</button>
												<button type="button" rel="tooltip" title="Edit Post" class="btn btn-info btn-simple btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs">
													<i class="fa fa-times"></i>
												</button>
											</td>
                                        </tr>

										<tr>
                                        	<td>
												<label class="checkbox">
													<input type="checkbox" value="" data-toggle="checkbox">
												</label>
											</td>
											<td>
												<img src="assets/img/blog-customer.jpg"/>
											</td>
                                        	<td>How to interact with clients</td>
                                        	<td>Tina Andrew</td>
                                        	<td>Entreprenour</td>
                                        	<td>customers, web</td>
											<td>
												<i class="fa fa-comments"></i> 18
											</td>
											<td>
												2016/01/16 22:30
											</td>
											<td>
												<i class="fa fa-circle text-danger"></i>
											</td>
											<td class="td-actions text-right">
												<button type="button" rel="tooltip" title="View" class="btn btn-warning btn-simple btn-xs">
													<i class="fa fa-picture-o"></i>
												</button>
												<button type="button" rel="tooltip" title="Edit Post" class="btn btn-info btn-simple btn-xs">
													<i class="fa fa-edit"></i>
												</button>
												<button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs">
													<i class="fa fa-times"></i>
												</button>
											</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


       <?php include "components/footer.php" ?>

    </div>
</div>


</body>

<?php include "components/script.php" ?>


</html>
