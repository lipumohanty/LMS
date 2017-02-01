<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_employee");
if (isset($_POST["btnSearch"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $designation = $_POST["designation"];
    $sql_custom = "SELECT * FROM `tbl_employee` "
            . " WHERE `fname` LIKE '%$fname%' "
            . " AND `email` LIKE '%$email%' "
            . " AND `contact` LIKE '%$contact%' "
            . " AND `designation` LIKE '%$designation%' "
            . ""
            . "";
    $resource = MysqlConnection::fetchCustom($sql_custom);
}
$array_designation = array();
$array_designation[0] = "Chief General Manager(Technical)";
$array_designation[1] = "Dy.General Manager(Technical)";
$array_designation[2] = "Manager(Technical)";
$array_designation[3] = "Dy.Manager(Technical)";
$array_designation[4] = "Dy.General Manager(Finance & Accounts)";
$array_designation[5] = "Manager(Finance)";
$array_designation[6] = "Jr. Accounts Officer";
$array_designation[7] = "Accountant";
$array_designation[8] = "Personal Assistant";
$array_designation[9] = "Stenographer";
$array_designation[10] = "Sr.Accounts officer";
$array_designation[11] = "Accounts Officer";
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH RECORD BY CATAGORIES </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NAME :</label>
                                <div class="controls">
                                    <input type="text" name="fname"  value="<?php echo $fname ?>" maxlength="50" minlength="10" required=""  class="span12"   placeholder="" />
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">E-MAIL ID:</label>
                                <div class="controls">
                                    <input type="email" name="email"  value="<?php echo $email ?>" maxlength="30" minlength="10" class="span12" required=""   placeholder="" />
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">CONTACT NO :</label>
                                <div class="controls">
                                    <input type="text" name="contact"  value="<?php echo $contact ?>" maxlength="10" minlength="10" required=""  class="span12"   placeholder="" />
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                    <label class="control-label ">DESIGNATION :</label>
                                    <div class="controls">
                                        <select class="span12" id="designation" name="designation" required="true">
                                            <option value="">Select</option>
                                            
                                            <?php
                                                foreach($array_designation as $designation){
                                            ?>
                                            <option value="<?php echo $designation?>"><?php echo $designation?></option>
                                            <?php
                                                    
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <button type="submit" name="btnSearch" class="btn btn-success">Search</button>
                                    <button type="submit" class="btn btn-danger">Clear</button>
                                    <a href="index.php?requestPage=add_employee"><button type="button" class="btn btn-info">Add</button></a>
                                </div>

                            </center>
                        </div>
                    </form>
                </div>
                <div class="row-fluid">
                    <div class="widget-content nopadding">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                <h5>VIEW EMPLOYEE</h5>
                            </div>
                        </div>
                        <table class="table table-bordered data-table" style="font-size: 11px;">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th  style="width: 1%">#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>E-Mail id</th>
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
                                        <td>
                                            <a title="EDIT" href="index.php?requestPage=edit_employee&txtId=<?php echo $result["txtId"] ?>">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a title="DELETE" onclick="return confirm('Are You Sure Want to delete this Record?');" href="index.php?requestPage=request_delete&tblname=tbl_employee&pkvalue=<?php echo $result["txtId"] ?>&location=index.php?requestPage=view_employee">
                                                <i class="icon-remove"></i>
                                            </a>                                  
                                        </td>
                                        <td><?php echo $result["fname"] ?></td>
                                        <td><?php echo $result["lname"] ?></td>
                                        <td><?php echo $result["contact"] ?></td>
                                        <td><?php echo $result["email"] ?></td>
                                        <td><?php echo $result["designation"] ?></td>
                                        <td><?php echo $result["join_date"] ?></td>
                                        <td><?php echo $result["pay_scale"] ?></td>
                                        <td><?php echo $result["dob"] ?></td>
                                        <td><?php echo $result["address"] ?></td>

                                    </tr>  
                                    <?php
                                }
                                ?>
                                    <?php 
                                        if(count($resource)==0){
                                    ?>
                                    <tr>
                                        <td colspan="11" style="text-align: center;color: red">
                                            No Record Found
                                        </td>
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
</div>