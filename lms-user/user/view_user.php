<a href="../<%= IServletConstant.PAGE_APPLYLEAVE_USER%>" style="padding-left: 20px;">
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
                                <th>Employee Id</th>
                                <th>Leave type</th>
                                <th>No Of Days leave period</th>
                                <th>Duration of Leave & Date</th>
                                <th>Purpose of leave</th>
                                <th>Is there is any proposal to avail LTC during the period bof leave</th>
                                <th>If yes,give the details</th>
                                <th>Leave encashment Required</th>
                                <th>No of days leave encashment</th>
                                <th>permission from head quarter</th>
                                <th>If yes ,Mention the details</th>
                                <th>place of visit</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                                $fetchall = MysqlConnection::fetchAll("tbl_applyleave");
                                foreach ($fetchall as $value) {
                            ?>
                            <tr>
                                <td style="width: 1%">#</th>
                                <td  style="width: 1%">#</th>
                                <td><?php echo $value["emp_id"]?></td>
                                <td><?php echo $value["leave_type"]?></td>
                                <td><?php echo $value["no_days_lp"]?></td>
                                <td><?php echo $value["leave_duration"]?></td>
                                <td><?php echo $value["leave_purpose"]?></td>
                                <td><?php echo $value["avail_ltc"]?></td>
                                <td><?php echo $value["ltc_details"]?></td>
                                <td><?php echo $value["leave_encashment"]?></td>
                                <td><?php echo $value["no_leaveencash"]?></td>
                                <td><?php echo $value["permission_hq"]?></td>
                                <td><?php echo $value["period_hq"]?></td>
                                <td><?php echo $value["visit_place"]?></td>
                                
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