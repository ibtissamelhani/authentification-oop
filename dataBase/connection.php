<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Database configuration

// class dataBaseConnection {
//     private static $instance;

// public function __construct(){
//         $servername = $_ENV['DB_HOST'];
//         $username = $_ENV['DB_USER'];
//         $password = $_ENV['DB_PASSWORD'];
//         $dbname = $_ENV['DB_NAME'];
//         $connection = mysqli_connect($servername, $username, $password, $dbname);

//         // Check connection
//         if (!$connection) {
//             die("Connection failed: " . mysqli_connect_error());
//         }else{
//             echo"donnnnnnnnnnne";
//         }
//     }
//     public static function getInstence(){
//         if(!isset(self::$instance)){
//             self::$instance = new dataBaseConnection();
//         }
//         return self::$instance;
//     }
  
    
// }



class dataBaseConnection {

public static function connect(){
      
        $connection = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'],$_ENV['DB_NAME'] );

        // Check connection
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            // echo "done";
            return $connection;
        }
    }
}




?>
