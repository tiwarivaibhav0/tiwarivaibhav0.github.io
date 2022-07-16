<?php
include 'connection.php';

if(isset($_POST['checkEmail'])){

  $checkEmail=$_POST['checkEmail'];


 try {
        $sql = "SELECT *
                 from User where User.email='$checkEmail'
                ";
    
         $res=$conn->query($sql);

         $rows = $res->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($rows);

         if(count($rows)>0){
           echo("0");
         }
         else{
           echo("1");
         }


        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }





}
















if(isset($_POST['fname'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];

  $email=$_POST['email'];

  $password=$_POST['password'];

  $User_type=$_POST['User_type'];
  $status=$_POST['status'];

  

try {
    $sql = "INSERT INTO `User` (`id`, `firstname`, `lastname`, `email`, `password`, `role`,`status`) VALUES (NULL, '$fname', '$lname', '$email', '$password', '$User_type','$status');";

     $conn->query($sql);
     echo("Successfully Inserted");
   
  
  
  
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  
}

if(isset($_POST['loginEmail'])){
    $email=$_POST['loginEmail'];
    $password=$_POST['loginPassword'];
    $remember=$_POST['remember'];


    try {
        $sql = "SELECT id,firstname,lastname,email,role,password
                 from User where User.email='$email'
                 AND User.password='$password'";
    
         $res=$conn->query($sql);

         $rows = $res->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($rows);

         if(count($rows)>0){

                     // echo($rows[0]["firstname"]);
                     $id=$rows[0]["id"];
                     $_SESSION['user']=$rows[0]["firstname"].' '.$rows[0]["lastname"];
                     $_SESSION['fname']=$rows[0]["firstname"];
                     $_SESSION['lname']=$rows[0]["lastname"];
                     $_SESSION['email']=$rows[0]["email"];



                     
                     
                     if($rows[0]["role"]=='admin'){
                      $_SESSION['admin']=1;
                     }
                     else
                     $_SESSION['admin']=0;


                     $_SESSION['id']=$id;

                     if($remember==1){
                      $cookie_id = $id;
                      $cookie_name = $_SESSION['user'];
                      $role=$_SESSION['admin'];
                      setcookie("id",$cookie_id, time() + (86400 * 30), "/");
                      setcookie("name",$cookie_name, time() + (86400 * 30), "/");
                      setcookie("role",$role, time() + (86400 * 30), "/");
                     }
                     echo("1");





         }
          else
              echo("0");

                              

          

        //  echo($res);
        //  if ($res->num_rows > 0) 
        //  var_dump($res);
        //  else


          
       
      
      
      
      
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }



}


if(isset($_POST['updated_user_type'])){
  $updated_user_type=$_POST['updated_user_type'];
  $updated_status=$_POST['updated_status'];
  $edit_id=$_POST['edit_id'];

try {
    $sql = "UPDATE `User` SET `role`='$updated_user_type',`status`='$updated_status' WHERE `id`='$edit_id'";

     $conn->query($sql);
     echo("Successfully Inserted");
   
  
  
  
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  





}
if(isset($_POST['delete'])){
 
  $delete=$_POST['delete'];

try {
    $sql = "DELETE FROM `User`  WHERE `id`='$delete'";

     $conn->query($sql);
     echo("Successfully Inserted");
   
  
  
  
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  





}

if(isset($_POST['editProduct_id'])){
  $editProduct_id=$_POST['editProduct_id'];
  try {
    $sql = "SELECT *
             from Product where `product_id`='$editProduct_id'";

     $res=$conn->query($sql);

     $rows = $res->fetchAll(PDO::FETCH_ASSOC);
     $_SESSION['editId']=$rows[0]['product_id'];

     $_SESSION['editName']=$rows[0]['product_name'];
     $_SESSION['category']=$rows[0]['category'];
     $_SESSION['product_image']=$rows[0]['product_image'];

     $_SESSION['product_price']=$rows[0]['product_price'];

     $_SESSION['quantity']=$rows[0]['quantity'];


     echo($_SESSION['editName']);




  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}



if(isset($_POST['edit_product_name'])){
  $edit_productId=$_POST['edit_product_id'];
  $editProduct_name=$_POST['edit_product_name'];
  $editProduct_category=$_POST['edit_product_category'];
  $editProduct_price=$_POST['edit_product_price'];
  $editProduct_quantity=$_POST['edit_product_quantity'];
  $editProduct_image=$_POST['edit_product_image'];




  try {
    $sql = "UPDATE `Product` SET `product_name`='$editProduct_name',`category`='$editProduct_category',`product_price`='$editProduct_price',`quantity`='$editProduct_quantity',`product_image`='$editProduct_image' WHERE `product_id`='$edit_productId'";

   

     $conn->query($sql);

     echo("done");




  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}


if(isset($_POST['deleteProduct'])){
 
  $deleteProduct=$_POST['deleteProduct'];

try {
    $sql = "DELETE FROM `Product`  WHERE `product_id`='$deleteProduct'";

     $conn->query($sql);
     echo("Successfully Deleted");
   
  
  
  
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  





}



if(isset($_POST['new_product_name'])){
  $pname=$_POST['new_product_name'];
  $pcategory=$_POST['new_product_category'];
  $pimage=$_POST['new_product_image'];
  $pquantity=$_POST['new_product_quantity'];
  $pprice=$_POST['new_product_price'];




  

  

try {
    $sql = "INSERT INTO `Product` (`product_id`, `product_name`, `product_image`, `category`, `product_price`, `quantity`) VALUES (NULL, '$pname', '$pimage', '$pcategory', '$pprice', '$pquantity');";

     $conn->query($sql);
     echo("Successfully Inserted");
   
  
  
  
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  

  
}


if(isset($_POST['cartId'])){
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
    }
  $cartId=$_POST['cartId'];

  if(array_key_exists($cartId,$_SESSION['cart'])){
    $_SESSION['cart'][$cartId]['quantity']= $_SESSION['cart'][$cartId]['quantity']+1;
    var_dump(    $_SESSION['cart'][$cartId]);
  }
  else{
    try {
      $sql = "SELECT *
               from Product where `product_id`='$cartId'";
  
       $res=$conn->query($sql);
  
       $rows = $res->fetchAll(PDO::FETCH_ASSOC);
  
       $cartName=$rows[0]['product_name'];
       $cartCategory=$rows[0]['category'];
  
       $cartPrice=$rows[0]['product_price'];
  
      //  $_SESSION['quantity']=$rows[0]['quantity'];
  
  
      //  echo($_SESSION['editName']);
     $arr=array("name"=>$cartName,"category"=>$cartCategory,"price"=>$cartPrice,'quantity'=>1);
      $_SESSION['cart'][$cartId]=$arr;

  
  
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    // $_SESSION['cart'][$cartId]="Hello";
    // echo("Not found");
  }

  


}

if(isset($_POST['delCart'])){
 
  $delCart=$_POST['delCart'];
  unset($_SESSION['cart'][$delCart]);
  echo("removed");


}

if(isset($_POST['applyFilter'])){
  
  if($_POST['applyFilter']=="clear")
     {
       unset($_SESSION['filter']);
     }
    else
   $_SESSION['filter']=$_POST['applyFilter'];
  


}

if(isset($_POST['sortP'])){
  
  if($_POST['sortP']=="Ascending")
     {
       unset($_SESSION['sortDesc']);
     }
    else
   $_SESSION['sortDesc']=$_POST['sortP'];
  


}

if(isset($_POST['detailsId'])){

  if(!isset($_SESSION['viewOrderDetails'])){
    $_SESSION['viewOrderDetails']=array();
  }
 
  $detailsId=$_POST['detailsId'];
  try {
    $sql = "SELECT *
             from Order_items where `order_id`='$detailsId'";

     $res=$conn->query($sql);

     $rows = $res->fetchAll(PDO::FETCH_ASSOC);

     $_SESSION['viewOrderDetails']=$rows;
     $_SESSION['viewId']=$detailsId;
    //  $_SESSION['viewId']=$rows[0]['order_id'];
    //  $_SESSION['viewProductId']=$rows[0]['product_id'];
    //  $_SESSION['viewProductName']=$rows[0]['product_name'];
    //  $_SESSION['viewProductQuantity']=$rows[0]['quantity'];
    //  $_SESSION['viewItemPrice']=$rows[0]['item_price'];

  // var_dump($_SESSION['viewOrderDetails']);
   echo("DOne");






  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }



}




if(isset($_POST['detailsIdorder'])){

  if(!isset($_SESSION['viewOrderDetailsUser'])){
    $_SESSION['viewOrderDetailsUser']=array();
  }
 
  $detailsId=$_POST['detailsIdorder'];
  try {
    $sql = "SELECT *
             from Order_items where `order_id`='$detailsId'";

     $res=$conn->query($sql);

     $rows = $res->fetchAll(PDO::FETCH_ASSOC);

     $_SESSION['viewOrderDetailsUser']=$rows;
     $_SESSION['viewId']=$detailsId;
    //  $_SESSION['viewId']=$rows[0]['order_id'];
    //  $_SESSION['viewProductId']=$rows[0]['product_id'];
    //  $_SESSION['viewProductName']=$rows[0]['product_name'];
    //  $_SESSION['viewProductQuantity']=$rows[0]['quantity'];
    //  $_SESSION['viewItemPrice']=$rows[0]['item_price'];

  // var_dump($_SESSION['viewOrderDetails']);
   echo("DOne");






  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }



}



if(isset($_POST['updateStatusId'])){
  $_SESSION['updateStatusId']=$_POST['updateStatusId'];


  echo($_SESSION['updateStatusId']);



}
if(isset($_POST['selectStatus'])){
   $selectStatus=$_POST['selectStatus'];

  $update_id=$_SESSION['updateStatusId'];

  try {
    $sql = "UPDATE `Orders` SET `status`='$selectStatus' WHERE `order_id`='$update_id'";

   

     $conn->query($sql);

     echo("done");




  }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

}


if(isset($_POST['decQuantity'])){
  $decQuantity=$_POST['decQuantity'];
  if($_SESSION['cart'][$decQuantity]['quantity']==1)
  {
     unset($_SESSION['cart'][$decQuantity]);
  }
  else{
    $_SESSION['cart'][$decQuantity]['quantity']=$_SESSION['cart'][$decQuantity]['quantity']-1;

  }
}
if(isset($_POST['incQuantity'])){
  $incQuantity=$_POST['incQuantity'];
  $_SESSION['cart'][$incQuantity]['quantity']=$_SESSION['cart'][$incQuantity]['quantity']+1;
}

?>