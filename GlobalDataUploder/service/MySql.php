<?php

class MysqlConnection {

    /**
     * constructor
     */
    static function connect() {

        $DB_NAME = "db_leavemanagement";
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $mysql_connect = mysql_connect($DB_HOST, $DB_USER, $DB_PASS);
        $mysql_select_db = mysql_select_db($DB_NAME, $mysql_connect);
    }

    /**
     * @param input $query
     * @return primary key for the table
     */
   

    static function executeQuery($query) {
        MysqlConnection::connect();
        return mysql_query($query);
    }

    /**
     * @param data 
     * input the data for posted data 
     * it automatically generate and insert the values 
     * but name of the database colum must equal to name of the element field
     */
    static function insert($tbl = "", $data = array()) {
        try {
            $str = "";
            $keysset = "";
            $valuesset = "";
//            $data["txtId"] = md5(time());
            foreach ($data as $key => $values) {
                $keysset.= "`" . $key . "`,";
                $valuesset.= "'" . trim($values) . "',";
            }
            echo $query = " INSERT INTO $tbl (" . substr($keysset, 0, strlen($keysset) - 1) . ") VALUES (" . substr($valuesset, 0, strlen($valuesset) - 1) . ");";
            MysqlConnection::executeQuery($query);
            return $data["txtId"];
        } catch (Exception $exc) {
            echo "<span style='color:red'>SQL QUERY ERROR !!! INSERT !!!<span>";
        }
    }

    /**
     * @param string $tbl table name 
     * @param string $data array of the table
     * @return string boolean values 
     */
    static function edit($tbl = "", $data = array(), $condition = NULL) {
        $pkvalue = $data["txtId"];
        unset($data["txtId"]);
        try {
            $str = "";
            $update = "";
            foreach ($data as $key => $values) {
                $update.= "`" . $key . "` = " . "'" . trim($values) . "',";
            }
            $query = " UPDATE $tbl SET " . substr($update, 0, strlen($update) - 1) . " WHERE txtId = '$pkvalue' $condition  ; ";
            return MysqlConnection::executeQuery($query);
        } catch (Exception $exc) {
            echo "<span style='color:red'>SQL QUERY ERROR !!! EDIT !!!<span>";
        }
    }

    /**
     * 
     * @param String $tbl table name
     * @param int  $id primary key of the table 
     */
    static function delete($tbl = "", $id = '', $condition = NULL) {
        try {
//            $query = "DELETE FROM $tbl WHERE $pkcolumn=  " . base64_decode($id);
            $query = "UPDATE $tbl SET txtIsDelete = '1'  WHERE txtId =  '" . base64_decode($id) . "' $condition ";
            MysqlConnection::executeQuery($query);
        } catch (Exception $exc) {
            echo "<span style='color:red'>SQL QUERY ERROR !!! DELETE !!!<span>";
        }
    }

    /**
     * @param resource $resource
     * @return array
     */
    static function toArrays($resource) {
        $arrayList = array();
        while ($rows = mysql_fetch_assoc($resource)) {
            array_push($arrayList, $rows);
        }
        return $arrayList;
    }

    /**
     * @param String $tbl
     * @param Array $sql
     * @return Array
     */
    static function fetchAll($tbl, $sql = array(), $condition = NULL, $arrcolumns = array()) {
        $columns = count($arrcolumns) == 0 ? "*" : implode(",", $arrcolumns);
        $query = "SELECT $columns FROM $tbl  WHERE txtId != '' $condition ";
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }

    /**
     * 
     * @param String $tbl
     * @param String $pkvalue
     * @return type
     */
    static function fetchByPrimary($tbl, $pkvalue, $condition = NULL, $arrcolumns = array()) {
        $columns = count($arrcolumns) == 0 ? "*" : implode(",", $arrcolumns);
        $query = "SELECT $columns FROM $tbl WHERE txtId = '$pkvalue' $condition ";
        $resource = MysqlConnection::executeQuery($query);
        $result = MysqlConnection::toArrays($resource);
        return $result[0];
    }

    /**
     * 
     * @param String $tbl table name a
     * @param Array $data data posted from text field
     * @param Array $sql condition such as limit order by
     * @return Aray
     */
    static function fetchByFilter($tbl, $data = array(), $sql = array(), $or = null, $arrcolumns = array()) {
        $str = "";
        $srno = 1;
        foreach ($data as $kyes => $values) {
            if (trim($values) != "") {
                $str.= " `$kyes` LIKE '%$values%' AND ";
                $srno++;
            }
        }
        $columns = count($arrcolumns) == 0 ? "*" : implode(",", $arrcolumns);
        $search = "AND ";
        if (( $pos = strrpos($str, $search) ) !== false) {
            $search_length = strlen($search);
            $str = " AND " . substr_replace($str, "", $pos, $search_length);
        }
        $query = "SELECT $columns FROM   $tbl  WHERE txtId != ''  " . $str . $or . "" . $sql["order"] . "" . $sql["limit"] . "";
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }

    static function fetchCustom($query) {
        $resource = MysqlConnection::executeQuery($query);
        return MysqlConnection::toArrays($resource);
    }

    static function exchangeArray($POST, $unset_array = array()) {
        $clean = array();
        foreach ($POST as $key => $value) {
            $clean[$key] = mysql_escape_string(trim($value));
        }
        foreach ($unset_array as $keys) {
            unset($clean[trim($keys)]);
        }
        return $clean;
    }

    //function exchangeArray($arr_data) {
    //        $arr_posted = array();
    //        foreach ($arr_data as $key => $value) {
    //            if (!is_array($value)) {
    //                $arr_posted[$key] = mysql_real_escape_string($value);
    //            }
    //        }
    //        return $arr_posted;
    //    }
    static function getOption($tbl, $value, $frmval, $condition = NULL) {
        $resource = MysqlConnection::fetchAll($tbl, "", $condition);
        $options = "";
        foreach ($resource as $values) {
            $selected = $values['txtId'] == $frmval ? "selected" : "";
            $options.= "<option value = " . $values["txtId"] . "  $selected >" . strtoupper($values[$value]) . "</option>";
        }
        return $options;
    }

    static function getStaticOption($arr_static, $sel_val) {
        $options = "";
        $options.= "<option value =  -1  > -- PLEASE SELECT -- </option>";
        foreach ($arr_static as $values) {
            $selected = $values == $sel_val ? "selected" : "";
            $options.= "<option value = \"" . $values . "\"  $selected >" . $values . "</option>";
        }
        echo $options;
    }

   

    
   

    static function displayLableByPk($arr_columns, $tblName, $pkvalue, $condition) {
        $columns = implode(",", $arr_columns);
        $query = "SELECT $columns FROM $tblName WHERE  txtId = '$pkvalue' $condition";
        $resource = MysqlConnection::executeQuery($query);
        $result = MysqlConnection::toArrays($resource);
        return $result[0];
    }

   
   
    static function uploadFile($objfile, $destination) {
        $modifiedName = str_replace(" ", "_", $objfile["name"]);
        $fname = $destination . time() . "_" . $modifiedName;
        move_uploaded_file($objfile["tmp_name"], $fname);
        return empty($objfile["name"]) ? "" : $fname;
    }

    static function currentDate() {
        if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
            return date("Y-m-d H:i:s");
        } else {
            $timezone = new DateTimeZone("Asia/Kolkata");
            $date = new DateTime();
            $date->setTimezone($timezone);
            return $date->format("Y-m-d H:i:s");
        }
    }

    static function currentTime() {
        if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
            return date("H:i:s A");
        } else {
            $timezone = new DateTimeZone("Asia/Kolkata");
            $date = new DateTime();
            $date->setTimezone($timezone);
            return $date->format("H:i:s A");
        }
    }

    static function showError($arraylist) {
        if (count($arraylist) == 0) {
            echo "<tr> 
                            <td style='color: red' colspan='28' align='center'>
                                    - - - - SORRY RIGHT NOW THERE IS NO RECORD TO SHOW - - - - 
                            </td>
                      </tr> ";
        } else {
            echo "";
        }
    }

}
?>
<script>
    function deleteRecord(url) {
        if (confirm("Are you want to delete record ?")) {
            document.edit_add_frm.action = url;
            document.edit_add_frm.submit();
        }
    }
    function modifiedRecord(url, status) {
        if (confirm("Are you want to active record ?")) {
            if (parseInt(status) === 1 || parseInt(status) === 0) {
                var active = status === '0' ? '1' : '0';
                document.edit_add_frm.action = url + "&active=" + active;
            } else {
                var active = status === 'Y' ? 'N' : 'Y';
                document.edit_add_frm.action = url + "&active=" + active;
            }
            document.edit_add_frm.submit();
        }
    }
    function operationPermission(operation) {
        var message = operation === "Save" ? "Are you want to Save record ?" : "Are you want to Edit record ?";
        if (confirm(message)) {
            return true;
        }
        return false;
    }

</script>
