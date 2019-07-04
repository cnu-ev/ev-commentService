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
  // https://zetawiki.com/wiki/MySQL_%ED%85%8C%EC%9D%B4%EB%B8%94_%EC%9E%88%EB%8A%94%EC%A7%80_%ED%99%95%EC%9D%B8 참고함
  public static function isExist($db_name, $table_name){
    $mysqli = new mysqli(self::$database_host,self::$database_user,self::$database_password, $db_name);
    $result = $mysqli->query("SHOW TABLES LIKE '테이블명'");
    return ( $result->num_rows > 0 );
  }

}
