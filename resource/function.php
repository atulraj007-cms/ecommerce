<?php

//HELPER FUNCTIONS

function set_message($msg){

if(!empty($msg)){

    $_SESSION['message'] = $msg;

} else {

    $msg = "";
}

}

function display_message(){


    if(isset($_SESSION['message'])){

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }



}



function query($result){

 global $connection;
 return mysqli_query($connection,$result);

}

function location($location){

    header("location: $location");
   
}

function confirmQuery($result){

    global $connection;

    if(!$result){

        die("Database Error".mysqli_error($connection));
    }
}

function fetch_array($result) {

   return mysqli_fetch_array($result);


}


//GET PRODUCTS

function getProducts(){

global $connection;    
$result = query("SELECT * FROM products");
while($row = mysqli_fetch_assoc($result)){

$product_id = $row['product_id'];    
$product_price = $row['product_price'];
$product_description = $row['product_description'];    
$product_title = $row['product_title'];
$product_image = $row['product_image'];
$product_short = $row['product_short_description'];

$product = <<<productData

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
    <a href="item.php?product=$product_id"><img style="width:100px;" src="./image/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">$$product_price</h4>
         <h4><a href="item.php?product=$product_id">$product_title</a>
            </h4>
    <p>$product_short</p>
    <a class="btn btn-primary" target="_blank" href="../resource/cart.php?add=$product_id">Add To Cart</a>
      </div>
    </div>
  </div>

productData;

echo $product;

}

}

function getCategories(){

    $query = query("SELECT * FROM categories");
    
    while($row = mysqli_fetch_assoc($query)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

      echo "<a href='category.php?category=$cat_id' class='list-group-item'> $cat_title</a>";  

    }

}

function getProductCategories(){

if(isset($_GET['category'])){

$query = query("SELECT * FROM products WHERE product_category_id =". $_GET['category']. "");
while($row = mysqli_fetch_assoc($query)){

    $product_id = $row['product_id'];    
    $product_price = $row['product_price'];
    $product_description = $row['product_description'];    
    $product_title = $row['product_title'];
    $product_image = $row['product_image'];
    $product_Short = $row['product_short_description'];

 $productCategory = <<<Category
 
 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?product=$product_id"><img src="$product_image" alt=""></a>
                    <div class="caption">
                        <h3>$product_title</h3>
                        <p>$product_Short</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?product=$product_id" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

 Category;
 echo $productCategory;


}
}

}

function ShopProducts(){

    global $connection;    
    $result = query("SELECT * FROM products");
    while($row = mysqli_fetch_assoc($result)){
    
    $product_id = $row['product_id'];    
    $product_price = $row['product_price'];
    $product_description = $row['product_description'];    
    $product_title = $row['product_title'];
    $product_image = $row['product_image'];
    $product_Short = $row['product_short_description'];
    
    $product = <<<productData
    
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
        <a href="item.php?product=$product_id"><img style="width:100px" src="./image/$product_image" alt="">
        </a>
            <div class="shop">
                <h4 class="pull-right">$$product_price</h4>
             <h4><a href="item.php?product=$product_id">$product_title</a>
                </h4>
        <p>$product_Short</p>
        <a class="btn btn-primary" target="_blank" href="../resource/cart.php?add=$product_id">Add To Cart</a>
          </div>
        </div>
      </div>
    
    productData;
    
    echo $product;
    
    }
} 


function login(){

if(isset($_POST['submit'])){

global $connection;

$username = mysqli_escape_string($connection,$_POST['username']);
$password = mysqli_escape_string($connection,$_POST['password']);


$query = query("SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}'");

if(mysqli_num_rows($query)==0){

    set_message("Your Credentials are not correct");
    location("login.php");

} else {

    $_SESSION['username'] = $username; 

    location("admin");
}



}



}

function send_message(){

    if(isset($_POST['submit'])){

       $to       = "atultiwariprince@gmail.com"; 
       $name     =  $_POST['name'];
       $subject  =  $_POST['subject'];
       $email    =  $_POST['email'];
       $message  =  $_POST['message'];

       $header = "FROM: {$name} {$email}";
       $result =  mail($to,$subject,$message,$header);

       if(!$result){

        set_message("Message Sending Failed");
        location("contact.php");

       } else {

      

        set_message("Message Sent Successfully");
        location("contact.php");

       }

        }
}






/*****************************  BACKEND     *****************************/

function display_orders(){


$query = query("SELECT * FROM orders");
while($row = mysqli_fetch_assoc($query)){

$id = $row['order_id'];
$transaction = $row['order_transaction_id'];
$amount = $row['order_amount'];
$currency = $row['order_currency'];
$status = $row['order_status'];

$orders = <<<DELIMETER

<tr>
<td>$id</td>
<td>$transaction</td>
<td>$amount</td>
<td>$currency</td>
<td>$status</td>
<td><a href="index.php?orders&id=$id" class="btn btn-danger">Delete</a></td>
</tr>



DELIMETER;
echo $orders;


}


}

function show_products_in_admin(){

    global $connection;    
    $result = query("SELECT * FROM products");
    while($row = mysqli_fetch_assoc($result)){

    
    
    $product_id = $row['product_id'];  
    $product_category_id = $row['product_category_id'];    
    $product_price = $row['product_price'];
    $product_description = $row['product_description'];    
    $product_title = $row['product_title'];
    $product_image = $row['product_image'];
    $product_quantity = $row['product_quantity'];
    $product_Short = $row['product_short_description'];

    $category = show_categories_in_products($product_category_id);  
   
    $product = <<<DELIMETER


        <tr>
        <td>$product_id</td>
        <td>$product_title<br>
        <a href="index.php?edit_product&id=$product_id"><img style="width:100px;" src="../image/$product_image" alt="">
        </td></a>
        <td>$product_description</td>
        <td>$product_Short</td>
        <td>$category</td>
        <td>$$product_price</td>
        <td>$product_quantity</td>
        <td><a class="btn btn-danger" href="index.php?products&delete=$product_id">Delete</a></td>
        </tr>

    DELIMETER;
    echo $product;

    
  } 

}

function show_categories_in_products($product_category_id){

    $category_query = query("SELECT * FROM categories WHERE cat_id = {$product_category_id}");
    while($row = mysqli_fetch_assoc($category_query)){

      return $row['cat_title'];
      
    }
}


/*********************** ADD PRODUCTS IN ADMIN ******************************/

function add_products(){

if(isset($_POST['publish'])){

 global $connection;   

$title       = mysqli_escape_string($connection, $_POST['product_title']);
$description = mysqli_escape_string($connection, $_POST['product_description']);
$price       = mysqli_escape_string($connection, $_POST['product_price']);
$category    = mysqli_escape_string($connection, $_POST['product_category_id']); 
$short_description    = mysqli_escape_string($connection, $_POST['product_short_description']);
$quantity    = mysqli_escape_string($connection, $_POST['product_quantity']);
$image    =    $_FILES['file']['name'];
$image_tmp    = $_FILES['file']['tmp_name'];

move_uploaded_file($image_tmp, "../image/$image");

$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, product_short_description, product_quantity, product_image) VALUES('{$title}', {$category}, {$price}, '{$description}', '{$short_description}', {$quantity}, '{$image}')");


if(!$query){
    die("database error".mysqli_error($connection));
}

$last_id = mysqli_insert_id($connection);
set_message("Product with Id={$last_id} added Successfully");
location("index.php?products");



}



}

function edit_products(){

    if(isset($_POST['publish'])){
    
     global $connection;   
    
    $title       = mysqli_escape_string($connection, $_POST['product_title']);
    $description = mysqli_escape_string($connection, $_POST['product_description']);
    $price       = mysqli_escape_string($connection, $_POST['product_price']);
    $category    = mysqli_escape_string($connection, $_POST['product_category_id']); 
    $short_description    = mysqli_escape_string($connection, $_POST['product_short_description']);
    $quantity    = mysqli_escape_string($connection, $_POST['product_quantity']);
    $image    =    $_FILES['file']['name'];
    $image_tmp    = $_FILES['file']['tmp_name'];
    
    move_uploaded_file($image_tmp, "../image/$image");
    
    $query = "UPDATE products SET ";
    $query .= "product_title = '{$title}', ";
    $query .= "product_description = '{$description}', ";
    $query .= "product_price = '{$price}', ";
    $query .= "product_short_description = '{$short_description}', ";
    $query .= "product_category_id = '{$category}', ";
    $query .= "product_quantity = '{$quantity}', ";
    $query .= "product_image = {$image} ";
    $query .= "WHERE product_id=" . mysqli_escape_string($connection,$_GET['id']);
    
    if(!$query){
        die("database error".mysqli_error($connection));
    }
    
    
    set_message("Product was added Successfully");
    location("index.php?products");
    
    
    
    }
    
    
    
    }


function getCategories_for_Add_products(){

    $query = query("SELECT * FROM categories");
    
    while($row = mysqli_fetch_assoc($query)){

        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

     $category_options = <<<DELIMETER

     <option value="$cat_id">$cat_title</option>

     DELIMETER;
     echo $category_options;

    }

}


?>