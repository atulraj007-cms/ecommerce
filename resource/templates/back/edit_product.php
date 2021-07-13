<?php

if(isset($_GET['id'])){

$id = $_GET['id'];


$query = query("SELECT * FROM products WHERE product_id = {$id} ");
while($row = mysqli_fetch_array($query)){

  $product_id = $row['product_id'];  
  $product_category_id = $row['product_category_id'];    
  $product_price = $row['product_price'];
  $product_description = $row['product_description'];    
  $product_title = $row['product_title'];
  $product_image = $row['product_image'];
  $product_quantity = $row['product_quantity'];
  $product_Short = $row['product_short_description'];


}



}









?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">
       
    </div>


    <div class="form-group">
           <label for="product-description">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control" value="<?php echo $product_description; ?>"></textarea>
    </div>

    <div class="form-group">
           <label for="product-short">Product Short Description</label>
      <textarea name="product_short_description" id="" cols="30" rows="5" class="form-control" value="<?php echo $product_Short; ?>"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
      </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
     
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
     
        <select name="product_category_id" id="" class="form-control">
        <option value="">Select Category</option>
        <?php getCategories_for_Add_products(); ?>  
               
           
        </select>


</div>





    <!-- Product Brands-->


    <div class="form-group">
      <label for="product-title">Product Quantity</label>
      <input type="number" name="product_quantity" value="<?php echo $product_quantity; ?>" class="form-control">         
    </div>


<!-- Product Tags -->


    <!-- <div class="form-group">
          <label for="product-title">Product Keywords</label>
        <input type="text" name="product_tags" class="form-control">
    </div> -->

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file"> <br>

        <img style="width:200px;" src="../image/<?php echo $product_image; ?>" alt="">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                

