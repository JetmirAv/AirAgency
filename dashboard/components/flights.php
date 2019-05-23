                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Flights</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>From City</label>
                                                <input type="number" class="form-control"  placeholder="cityId" >
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>To City</label>
                                                <input type="text" class="form-control" placeholder="To City">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 30px;">
                                        <label style="padding-right:5px"> Available </label>
                                        <br>
                                        <select style="padding:7.5px;">
                                              <option class="form-group" value="True">True</option>
                                              <option value="False">False</option>
                                        </select> 
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Airplane</label>
                                                <input type="text" placeholder="Airplane" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CheckIn</label>l
                                                <input type="datetime" class="form-control" placeholder="__/__/____">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control" placeholder="Price">
                                            </div>
                                        </div>
                                       <div class="col-md-3" style="width: 30px;">
                                       <label> isSale </label>
                                        <br>
                                        <select style="padding:7.5px;">
                                              <option class="form-group" value="True">True</option>
                                              <option value="False">False</option>
                                        </select> 
                                        </div>
                                       
                                     </div>
                                     <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="text" class="form-control" placeholder="                __/__/____">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input type="text" class="form-control" placeholder="                __/__/____">
                                            </div>
                                        </div>
                                     </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>