<?php require_once("../resource/config.php"); ?>
<?php include ("../resource/templates/front/header.php");   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
        <h1>Shop Your Favourites</h1>
        </header>

        <hr>

        <!-- Title -->
      
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

           <?php ShopProducts();?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <?php include ("../resource/templates/front/footer.php");   ?>