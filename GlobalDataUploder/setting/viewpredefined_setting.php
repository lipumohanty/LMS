<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");
if (isset($_POST["btnSearch"])) {
    $name = $_POST["name"];
    $date_leave = $_POST["date_leave"];

    $sql_custom = "SELECT * FROM `tbl_predefinedleave` "
            . " WHERE `name` LIKE '%$name%' "
            . " AND `date_leave` LIKE '%$date_leave%' ";

    $resource = MysqlConnection::fetchCustom($sql_custom);
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#date_leave").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH RECORD BY CATAGORIES</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">NAME :</label>
                                    <div class="controls">
                                        <input type="text" name="name"  value="<?php echo $name ?>" autofocus="" maxlength="30" class="span11"    placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">DATE :</label>
                                    <div class="controls">
                                        <input type="text" name="date_leave" id="date_leave" value="<?php echo $date_leave ?>" autofocus="" maxlength="100" class="span11"    placeholder="" />
                                    </div>
                                </div>
                            </div>
                       
                            <div class="controls">
                                <center>

                                    <button type="submit" name="btnSearch" class="btn btn-success">Search</button>
                                    <button type="submit" class="btn btn-danger">Clear</button>
                                    <a href="mainpage.php?requestPage=predefined_setting"><button type="button" class="btn btn-info">Add</button></a>
                                </center>
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
                    <h5>VIEW PREDEFINED LEAVE</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                            <tr>

                                <th style="width: 1%">#</th>
                                <th  style="width: 1%">#</th>

                                <th>Date</th>
                                <th>Name</th>
                                <th>Description</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                    <td>
                                        <a  title="EDIT" href="mainpage.php?requestPage=editpredefined_setting&txtId=<?php echo $result["txtId"] ?>">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="DELETE" onclick="return confirm('Are You Sure Want to delete this Record?');" href="mainpage.php?requestPage=request_delete&tblname=tbl_predefinedleave&pkvalue=<?php echo $result["txtId"] ?>&location=mainpage.php?requestPage=viewpredefined_setting">
                                            <i class="icon-remove"></i>
                                        </a>                                  
                                    </td>                                  


                                    <td><?php echo $result["date_leave"] ?></td>
                                    <td><?php echo $result["name"] ?></td>
                                    <td><?php echo $result["description"] ?></td>

                                </tr>  
                                <?php
                            }
                            ?>
                            <?php
                            if (count($resource) == 0) {
                                ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;color: red">
                                        No Record Found
                                    </td>
                                </tr>      
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>