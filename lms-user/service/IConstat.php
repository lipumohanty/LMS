<?php

interface IConstat {
    /**
     * following are the database configuration setting
     * dbname : database name
     * username, password,
     */

    /**
     * form setting 
     */
    const FORM_TITLE = "";
    const ADMIN_TITLE = "";
    const ADMIN_TAG = "";
    const LEFT_MENU = "";
    const ADMIN_LOGO = "";

    /**
     * here are the setting of the table
     * for table setting insert the proper name 
     * and prefix of the data
     */
    const TBL_REGISTRATION = "tbl_userregistration";
    const TBL_UPLOAD = "tbl_vedioupload";
    const TBL_VEDIOSHARE = "tbl_vedioshare";
    const TBL_SHARE = "";

}

?>
