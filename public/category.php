<?php require_once("../resource/config.php"); ?>
<?php include ("../resource/templates/front/header.php");   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">

           <?php getProductCategories(); ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <?php include ("../resource/templates/front/footer.php");   ?>