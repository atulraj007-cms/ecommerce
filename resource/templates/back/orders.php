
<div class="col-md-12">

<div class="row">

<h1 class="page-header">

   All Orders

</h1>

</div>

<div class="row">

<table class="table table-hover">

    <thead>

      <tr>
           <th>Order ID</th>
           <th>Transaction ID</th>
           <th>Amount</th>
           <th>Currency</th>
           <th>Status</th>
           <th>Delete</th>
          
      </tr>
    </thead>
    <tbody>
       
       
       <?php display_orders(); ?>
        

    </tbody>
</table>
</div>

<?php 

if(isset($_GET['id'])){

$order_id = $_GET['id'];    
$query = query("DELETE FROM orders WHERE order_id = {$order_id}");
location("index.php?orders");


}


?>





    <!-- jQuery -->
  
    <?php include("../../resource/templates/back/admin_footer.php"); ?>