<?php require_once("../resource/config.php"); ?>
<?php require_once("../resource/cart.php"); ?>
<?php include ("../resource/templates/front/header.php");   ?>




    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">
    <h3 class="text-center bg-danger"><?php display_message(); ?></h3>
      <h1>Checkout</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="atulraj.tewary@my.jcu.edu.au">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="upload" value="1">

    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
           <th>Actions</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>

<?php paypal_button(); ?>

</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php echo $_SESSION['item_quantity']; ?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">

$<?php



echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] ="";
unset($_SESSION['item_total']);


?>


</span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


       

        <!-- Footer -->
       
<?php include ("../resource/templates/front/footer.php");   ?>