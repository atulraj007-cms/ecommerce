<?php require_once("../resource/config.php"); ?>
<?php include ("../resource/templates/front/header.php");   ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

           <?php include ("../resource/templates/front/category.php"); ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                      
                    <?php include ("../resource/templates/front/slider.php");?>

                    </div>

                </div>

                <div class="row">

               <!-- <h1> <?php echo $_SESSION['product_1']; ?> </h1> -->

                <?php getProducts(); ?>

                    
                           
                           
                           
                            <!-- <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div> -->
                        </div>
                    </div>


                    <!-- <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                    </div> -->

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

  <?php include("../resource/templates/front/footer.php");
