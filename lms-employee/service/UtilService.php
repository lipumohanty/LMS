<?php
class UtilService {

    public static function getDatabaseConnection() {
        return mysqli_connect("localhost", "root", "", "dbname", "3306");
    }

    public static function getIncludePage($pageAttribute) {
        $explodePage = explode("_", $pageAttribute);
        if (count($explodePage) == 2) {
            return $explodePage[1] . "/" . $pageAttribute;
        }
        return "Dashboard";
    }

    public static function executeQuery($query) {
        $connection = UtilService::getDatabaseConnection();
        mysqli_query($connection, $query);
    }

    public static function validateFile($file) {
        
    }

    public static function uploadFile($file) {
        if (UtilService::validateFile($file)) {
            
        } else {
            return "";
        }
    }

}
?>