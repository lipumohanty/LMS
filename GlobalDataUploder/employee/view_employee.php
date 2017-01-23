<?php
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_employee");
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH LEAVE BY EMPLOYEE ID </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">EMPLOYEE ID :</label>
                            <div class="controls">
                                <input type="text" name="employee_id"   autofocus="" maxlength="10" class="span11"    placeholder="EMPLOYEE ID" />
                            </div>
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
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>VIEW EMPLOYEE</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Employee id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact No</th>
                                <th>Mail id</th>
                                <th>Designation</th>
                                <th>Joining Date </th>
                                <th>Pay Scale</th>
                                <th>Date Of Birth</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                   <td><?php echo $result["txtId"]?></td>
                                   <td><?php echo $result["fname"]?></td>
                                   <td><?php echo $result["lname"]?></td>
                                   <td><?php echo $result["contact"]?></td>
                                   <td><?php echo $result["email"]?></td>
                                   <td><?php echo $result["designation"]?></td>
                                   <td><?php echo $result["join_date"]?></td>
                                   <td><?php echo $result["pay_scale"]?></td>
                                   <td><?php echo $result["dob"]?></td>
                                   <td><?php echo $result["address"]?></td>
                                
                                </tr>  
                                <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>