<a href="../<%= IServletConstant.PAGE_ADD_EMPLOYEE%>" style="padding-left: 20px;">
    <button type="submit" class="btn btn-success">ADD EMPLOYEE</button>
</a>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH EMPLOYEE FORM</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">USERNAME :</label>
                            <div class="controls">
                                <input type="text" name="username"   autofocus="" maxlength="100" class="span11"    placeholder="USERNAME" />
                            </div>
                            <div class="controls">
                                <input type="hidden" name="<%= IServletConstant.ACTION%>" value="<%= IServletConstant.ACTION_SEARCH%>" />
                                <button type="submit" class="btn btn-success">Search</button>
                                <button type="submit" class="btn btn-danger">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>View Employee Table </h5>
                </div>
                <div id="countTable" class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th  style="width: 1%">#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact No</th>
                                <th>Joining Date</th>
                                <th>Designation</th>
                                <th>Payscale</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <th>Commuted Leave</th>
                                <th>Halfpay Leave</th>
                                <th>Special Leave</th>
                                <th>Headquarter Leaving</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                                $fetchall = MysqlConnection::fetchAll("tbl_employee");
                                foreach ($fetchall as $value) {
                            ?>
                            <tr>
                                <td style="width: 1%">#</th>
                                <td  style="width: 1%">#</th>
                                <td><?php echo $value["fname"]?></td>
                                <td><?php echo $value["lname"]?></td>
                                <td><?php echo $value["contact"]?></td>
                                <td><?php echo $value["join_date"]?></td>
                                <td><?php echo $value["designation"]?></td>
                                <td><?php echo $value["payscale"]?></td>
                                <td><?php echo $value["dob"]?></td>
                                <td><?php echo $value["address"]?></td>
                                <td><?php echo $value["commuted_leave"]?></td>
                                <td><?php echo $value["halfpay_leave"]?></td>
                                <td><?php echo $value["special_leave"]?></td>
                                <td><?php echo $value["headquarter_leaving"]?></td>
                                
                            </tr>
                            <?php 
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>