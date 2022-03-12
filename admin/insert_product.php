<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

  <div class="row"><!-- row Starts -->

    <div class="col-lg-12"><!-- col-lg-12 Starts -->

      <ol class="breadcrumb"><!-- breadcrumb Starts -->

        <li class="active">

          <i class="fa fa-dashboard"> </i> Dashboard / Insert Products

        </li>

      </ol><!-- breadcrumb Ends -->

    </div><!-- col-lg-12 Ends -->

    </div><!-- row Ends -->


    <div class="row"><!-- 2 row Starts --> 

      <div class="col-lg-12"><!-- col-lg-12 Starts -->

        <div class="panel panel-default"><!-- panel panel-default Starts -->

          <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title">

              <i class="fa fa-money fa-fw"></i> Insert Products

            </h3>

          </div><!-- panel-heading Ends -->

          <div class="panel-body"><!-- panel-body Starts -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

            <div class="form-group" ><!-- form-group Starts -->

            <label class="col-md-3 control-label" > Product Name </label>

            <div class="col-md-6" >

            <input type="text" name="product_name" class="form-control" required >

            </div>

            </div><!-- form-group Ends -->

            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-3 control-label" > Product Url </label>

              <div class="col-md-6" >

                <input type="text" name="product_url" class="form-control" required >

                <br>

                <p style="font-size:15px; font-weight:bold;">

                  Product Url Example : navy-blue-t-shirt

                </p>

              </div>

            </div><!-- form-group Ends -->


            <div class="form-group" ><!-- form-group Starts -->

              <div class="col-md-6" >

              </div>

            </div><!-- form-group Ends -->


            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-3 control-label" > </label>

              <div class="col-md-6" >

              </div>

            </div><!-- form-group Ends -->

            <div class="form-group" ><!-- form-group Starts -->

              <label class="col-md-3 control-label" > Product Image </label>

              <div class="col-md-6" >

              <input type="file" name="product_img" class="form-control" required >

            </div>

            </div><!-- form-group Ends -->

              <div class="form-group" ><!-- form-group Starts -->

                <label class="col-md-3 control-label" > Product Price </label>

                <div class="col-md-6" >

                  <input type="text" name="product_price" class="form-control" required >

                </div>

              </div><!-- form-group Ends -->

              <div class="form-group" ><!-- form-group Starts -->

                <label class="col-md-3 control-label" ></label>

                <div class="col-md-6" >

                  <input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

                </div>

              </div><!-- form-group Ends -->

            </form><!-- form-horizontal Ends -->

          </div><!-- panel-body Ends -->

        </div><!-- panel panel-default Ends -->

      </div><!-- col-lg-12 Ends -->

    </div><!-- 2 row Ends --> 

</body>

</html>

<?php

if(isset($_POST['submit'])){

  $product_name = $_POST['product_name'];

  $product_price = $_POST['product_price'];

  $product_url = $_POST['product_url'];

  $product_img = $_FILES['product_img']['name'];

  $temp_name = $_FILES['product_img']['tmp_name'];

  move_uploaded_file($temp_name,"product_images/$product_img");

  $insert_product = "insert into do_the_thao (ten_sp,gia_sp,anh_chup,url_san_pham) values ('$product_name',$product_price,'$product_img', '$product_url')";

  $run_product = mysqli_query($con,$insert_product);

  if($run_product){

    echo "<script>alert('Product has been inserted successfully')</script>";

    echo "<script>window.open('index.php?insert_product','_self')</script>";

  }

}

?>

<?php } ?>
