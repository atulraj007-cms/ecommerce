<?php require_once("config.php"); ?>

<?php

if(isset($_GET['add'])){

 $query = query("SELECT * FROM products WHERE product_id =".$_GET['add']."");
 while($row = mysqli_fetch_assoc($query)){

    $product_quantity = $row['product_quantity'];
    $product_title = $row['product_title'];

    if($product_quantity != $_SESSION['product_'. $_GET['add']]){

        $_SESSION['product_'. $_GET['add']] += 1;
        location("../public/checkout.php");

    } else {

        set_message("Sorry! We have only " . $product_quantity . " " . " ". $product_title. " " . "available");
        location("../public/checkout.php");
    }


 }   

// $_SESSION['product_'. $_GET['add']] += 1;
// location("index.php");

}

if(isset($_GET['remove'])){

    $_SESSION['product_'. $_GET['remove']]--;

    if($_SESSION['product_'. $_GET['remove']] < 1){

        location("../public/checkout.php");

    } else {

        location("../public/checkout.php");
    }


}

if(isset($_GET['delete'])){

    $_SESSION['product_'. $_GET['delete']] = '0';

    location("../public/checkout.php");

}    


function cart(){

    $total = 0;
    $item_Quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;

    foreach($_SESSION as $name => $value) {

      if($value > 0) {

        if(substr($name, 0,8) == "product_") {  

            $length = strlen($name)-8;
            $id = substr($name, 8, $length);

            $query = query("SELECT * FROM products WHERE product_id = {$id}");

            while($row = mysqli_fetch_assoc($query)){

                

            $product_id = $row['product_id'];    
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];    
            $product_title = $row['product_title'];
            $product_image = $row['product_image'];
            $product_quantity = $row['product_quantity'];
            $product_short = $row['product_short_description'];

            $sub = $product_price * $value;
            $item_Quantity += $value;
            

            $product = <<<cart
            
            <tr>
                <td>$product_title <br>
                <img style="width:80px" src="./image/$product_image" alt="">
                
                </td>
                <td>$$product_price</td>
                <td>$value</td>
                <td>$$sub</td>
                <td><a class="btn btn-danger" href="../resource/cart.php?delete=$product_id"><span class="glyphicon glyphicon-remove"></span></a> <a class="btn btn-success" href="../resource/cart.php?add=$product_id"><span class="glyphicon glyphicon-plus"></span></a> <a class="btn btn-warning" href="../resource/cart.php?remove=$product_id"><span class="glyphicon glyphicon-minus"></span></a></td>
                    
            </tr>

    <input type="hidden" name="item_name_{$item_name}" value="$product_title">
    <input type="hidden" name="item_number_{$item_number}" value="$product_id">
    <input type="hidden" name="amount_{$amount}" value="$product_price">
    <input type="hidden" name="amount_{$quantity}" value="$value">

    
    cart;
    echo $product;

    $item_number++;
    $item_name++;
    $amount++;
    $quantity++;
       
    }

    $_SESSION['item_total'] = $total += $sub;
    $_SESSION['item_quantity'] = $item_Quantity += $item_Quantity;


    }

}

}
}

function report(){

    global $connection;
    if(isset($_GET['tx'])){

        $transacton   =   $_GET['tx'];
        $amount       =   $_GET['amt'];
        $status       =   $_GET['st'];
        $currency     =   $_GET['cc'];
      
      
      
  
 

    $total = 0;
    $item_quantity = 0;
  

    foreach($_SESSION as $name => $value) {

      if($value > 0) {

        if(substr($name, 0,8) == "product_") {  

            $length = strlen($name)-8;
            $id = substr($name, 8, $length);

            //FETCHING ORDERS
            $send_query = query("INSERT INTO orders(order_amount,order_transaction_id,order_status,order_currency) VALUES($amount,'{$transacton}','{$status}','{$currency}')"); 
            $last_id = mysqli_insert_id($connection);

            //FETCHING PRODUCTS
            $query = query("SELECT * FROM products WHERE product_id = {$id}");

            while($row = mysqli_fetch_assoc($query)){

                

            $product_id = $row['product_id'];    
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];    
            $product_title = $row['product_title'];
            $product_image = $row['product_image'];
            $product_quantity = $row['product_quantity'];
            $product_short = $row['product_short_description'];

            $sub = $product_price * $value;
            $item_quantity += $value;

            $insert = query("INSERT INTO reports(product_id,product_title,order_id,product_price,product_quantity) VALUES('{$id}','{$product_title}','{$last_id}','{$sub}','{$value}')");

    

       
    }

    $total += $sub;
 


    }

}

}
session_destroy();
    } else {

        location("index.php");
    }

}

function paypal_button(){

if(isset($_SESSION['item_total'])){

$paypal = <<<DELIMETER

<input type="image" name="submit"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">


DELIMETER;
echo $paypal;

}


}



?>

