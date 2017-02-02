<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");
if (isset($_POST["btnSearch"])) {
    
    $sql_custom = "SELECT * FROM `tbl_addleave` ";

    $resource = MysqlConnection::fetchCustom($sql_custom);
}
?>
<div class="container-fluid">
   
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>AVAILABLE LEAVES</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                            <tr>
                               
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
                                        
                                        <td><?php echo $result["date_leave"] ?></td>
                                        <td><?php echo $result["name"] ?></td>
                                        <td><?php echo $result["description"] ?></td>
                                       

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
     <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="controls">
                                <center>
                                    <a href="index.php?requestPage=leave_apply"><button type="button" class="btn btn-info">APPLY LEAVE</button></a>
                                     <a href="index.php?requestPage=dashboard"><button type="button" class="btn btn-success">BACK</button></a>
                                </center>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>