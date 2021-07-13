<?php include("../../resource/templates/back/admin_header.php"); ?>
<?php require_once("../../resource/config.php"); ?> 

 <?php
 
 if(!isset($_SESSION['username'])){

    location("../index.php");
} 

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1> -->
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            <?php 


                    if($_SERVER['REQUEST_URI'] = "/ecommerce/public/admin/index.php" ) {

                       include("../../resource/templates/back/admin_content.php"); 


                    } 


                    if(isset($_GET['orders'])){


                        include("../../resource/templates/back/orders.php");
                    }

                    if(isset($_GET['categories'])){


                        include("../../resource/templates/back/categories.php");
                    }

                    if(isset($_GET['add_product'])){


                        include("../../resource/templates/back/add_product.php");
                    }

                    if(isset($_GET['edit_product'])){


                        include("../../resource/templates/back/edit_product.php");
                    }

                    if(isset($_GET['products'])){


                        include("../../resource/templates/back/products.php");
                    }
                    
                
                    
                    
                    
                    ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include("../../resource/templates/back/admin_footer.php"); ?>
