

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Description</th>
           <th>Short Desc</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Action</th>
      </tr>
    </thead>
    <tbody>




     <?php show_products_in_admin(); ?>

     <?php 

     if(isset($_GET['delete'])){

      $delete = $_GET['delete'];

      $query = query("DELETE FROM products WHERE product_id = {$delete}");
      location("index.php?products");


     }
      
     ?>

  </tbody>
</table>











                
                 


             </div>

          

   