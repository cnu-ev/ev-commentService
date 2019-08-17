<!--
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-03, 14:33:51
@ Desc : 
@     MySQL에 접속하기 위한 클래스인 MySQLConnection이 정의되어 있습니다. 다른 php 파일들에서 require해 사용합니다.
-->


<?php

class MySQLConnection{

  private static $database_host = "localhost";
  private static $database_user = "root";
  // DB의 임시 비밀번호 입니다. (차후 변경 필요)
  private static $database_password = "EVPasswd";

  public static function DB_Connect($database_name){
    $connect_object = mysqli_connect(self::$database_host, self::$database_user, self::$database_password, $database_name);
    if(mysqli_connect_error($connect_object)){
      echo "MySQL 접속 오류";
      echo "오류 원인 : ", mysqli_connect_error();
      exit();
    }
    return $connect_object;
  }

  public static function isExist($db_name, $table_name){

    $connect_object = MySQLConnection::DB_Connect($db_name) or die("Cannot connect to DB");

    $query = 'SHOW TABLES LIKE ' . "'" . $table_name . "'";

    $ret = mysqli_query($connect_object, $query);

    if (mysqli_num_rows($ret) < 1){
      return false;
    }
    else {
      return true;
    }
  }

}
