<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_leavesetting");
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
                                  <a href="index.php?requestPage=addleave_setting"><button type="button" class="btn btn-danger">Add</button></a>
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

                                <th style="width: 1%">Edit</th>
                                <th  style="width: 1%">Delete</th>
                                <th>Leave Setting id</th>
                                <th>Employee id</th>
                                <th>Commuted Leave</th>
                                <th>Halfpay Leave</th>
                                <th>Special Leave</th>
                                <th>Leaving of Headquarter</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                    <td>
                                        <a href="index.php?requestPage=editleave_setting&txtId=<?php echo $result["txtId"] ?>">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?requestPage=request_delete&tblname=tbl_leavesetting&pkvalue=<?php echo $result["txtId"] ?>&location=index.php?requestPage=viewaddleave_setting">
                                            <i class="icon-remove"></i>
                                        </a>                                  
                                    </td>                                  
                                    <td><?php echo $result["txtId"] ?></td>
                                    <td>
                                        <?php 
                                        $resultemp =  getEmployeeById($result["emp_id"]);
                                                echo $resultemp["fname"]." ".$resultemp["lname"];
                                                ?>
                                    </td>
                                    <td><?php echo $result["commuted_leave"] ?></td>
                                    <td><?php echo $result["halfpay_leave"] ?></td>
                                    <td><?php echo $result["special_leave"] ?></td>
                                    <td><?php echo $result["leaving_hq"] ?></td>

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

    <?php 
    function getEmployeeById($empId){
        
      $result =   MysqlConnection::fetchByPrimary("tbl_employee", $empId);
      return($result); 
        
    }

?>