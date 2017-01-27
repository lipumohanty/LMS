<?php
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_addleave");
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH LEAVE </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">

                            <label class="control-label ">LEAVE TYPE :</label>
                            <div class="controls">
                                <input type="text" name="leave_type"   autofocus="" maxlength="100" class="span11"    placeholder="USERNAME" />
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
                                <th style="width: 1%">Edit</th>
                                <th  style="width: 1%">Delete</th>
                                <th>Leave id</th>
                                <th>Leave type</th>
                                <th>Description</th>
                                <th>No Of Count</th>
                                <th>Added Date</th>
                                <th>Added By</th>
                                <th>Is Active</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                    <td>
                                        <a href="index.php?requestPage=edit_leave&txtId=<?php echo $result["txtId"] ?>">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?requestPage=request_delete&tblname=tbl_addleave&pkvalue=<?php echo $result["txtId"] ?>&location=index.php?requestPage=viewleave_leave">
                                            <i class="icon-remove"></i>
                                        </a>                                  
                                    </td>
                                    <td><?php echo $result["txtId"] ?></td>
                                    <td><?php echo $result["leave_type"] ?></td>
                                    <td><?php echo $result["description"] ?></td>
                                    <td><?php echo $result["no_count"] ?></td>
                                    <td><?php echo $result["added_date"] ?></td>
                                    <td><?php echo $result["added_by"] ?></td>
                                    <td><?php echo $result["is_active"] ?></td>

                                </tr>  
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>