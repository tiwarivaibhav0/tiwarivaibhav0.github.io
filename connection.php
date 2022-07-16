<?php
session_start();
$servername = "mysql-server";
$username = "root";
$password = "secret";

try {
  $conn = new PDO("mysql:host=$servername;dbname=store_db_1", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";

// $sql = "CREATE TABLE Product (
//     product_id INT(50) UNSIGNED PRIMARY KEY,
//     product_name VARCHAR(100) NOT NULL,
//     product_image VARCHAR(100) NOT NULL,
//     category enum('electronics','fashion','furniture','jewellery'),
//     product_price INT(60)
//     )";

//      $conn->query($sql);
  

//      $sql1="CREATE TABLE Orders (
//       order_id INT(50) UNSIGNED PRIMARY KEY,
//       id INT,
//       status enum('pending','approved','delivered'),
//       address VARCHAR(100),
//       order_date timestamp,
//       delivery_date timestamp,
//       total_amount INT(50))";


// $conn->query($sql1);

//      $sql2="CREATE TABLE Order_items (
//       order_id INT(50) UNSIGNED ,
//       product_id INT(50) UNSIGNED,
//       quantity INT(50))";


// $conn->query($sql2);





} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


?>