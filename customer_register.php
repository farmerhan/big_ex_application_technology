<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>


<!-- MAIN -->
<main>
  <!-- HERO -->
  <div class="nero">
    <div class="nero__heading">
      <span class="nero__bold">Đăng kí</span>
    </div>
    <p class="nero__text">
    </p>
  </div>
</main>


<div id="content">
  <!-- content Starts -->
  <div class="container">
    <!-- container Starts -->

    <div class="col-md-12">
      <!-- col-md-12 Starts -->

      <div class="box">
        <!-- box Starts -->

        <div class="box-header">
          <!-- box-header Starts -->

          <center>
            <!-- center Starts -->

            <h2> Đăng kí tài khoản mới </h2>

          </center><!-- center Ends -->

        </div><!-- box-header Ends -->
        <div class="container-fluid">
          <form action="customer_register.php" method="post" enctype="multipart/form-data">
            <div class="form-row align-items-center">
              <div class="col-sm-6 my-1">
                <label>Họ và tên: </label>
                <input type="text" class="form-control" name="c_name" required>

                <label>Email: </label>
                <input type="text" class="form-control" name="c_email" required>

                <label>Mật khẩu: </label>
                <div class="input-group">
                  <!-- input-group Starts -->

                  <span class="input-group-addon">
                    <!-- input-group-addon Starts -->

                    <i class="fa fa-check tick1"> </i>

                    <i class="fa fa-times cross1"> </i>

                  </span><!-- input-group-addon Ends -->

                  <input type="password" class="form-control" id="pass" name="c_pass" required>
                </div><!-- input-group Ends -->
                <div id="mess">

                </div>

                <label>Xác nhận lại mật khẩu: </label>
                <div class="input-group">
                  <!-- input-group Starts -->

                  <span class="input-group-addon">
                    <!-- input-group-addon Starts -->

                    <i class="fa fa-check tick2"> </i>

                    <i class="fa fa-times cross2"> </i>

                  </span><!-- input-group-addon Ends -->

                  <input type="password" class="form-control confirm" id="con_pass" required>

                </div><!-- input-group Ends -->
              </div>
              <div class="col-sm-6 my-1">
                <label>Số điện thoại: </label>
                <input type="text" class="form-control" name="c_phone" required>

                <label>Địa chỉ: </label>
                <input type="text" class="form-control" name="c_address" required>
              </div>

              <div class="col-sm-12">
                <div class="text-center">
                  <!-- text-center Starts -->

                  <button type="submit" name="register" class="btn btn-primary btn-register">

                    <i class="fa fa-user-md"></i> Đăng kí

                  </button>

                </div><!-- text-center Ends -->
              </div>
            </div>
          </form>
        </div>


      </div><!-- box Ends -->

    </div><!-- col-md-12 Ends -->



  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {

    $('.tick1').hide();
    $('.cross1').hide();

    $('.tick2').hide();
    $('.cross2').hide();


    $('.confirm').focusout(function() {

      var password = $('#pass').val();

      var confirmPassword = $('#con_pass').val();

      if (password == confirmPassword) {

        $('.tick1').show();
        $('.cross1').hide();

        $('.tick2').show();
        $('.cross2').hide();



      } else {

        $('.tick1').hide();
        $('.cross1').show();

        $('.tick2').hide();
        $('.cross2').show();

      }

    });

  });
</script>

<script>
  $(document).ready(function() {
    $('#pass').blur(() => {
      document.getElementById("mess").innerHTML = "";
    })
    $("#pass").on("input", function() {

      check_pass();

    });

  });

  function check_pass() {
    var val = document.getElementById("pass").value;
    var meter = document.getElementById("meter");
    var no = 0;
    if (val != "") {
      // If the password length is less than or equal to 6
      if (val.length <= 6) no = 1;

      // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
      if (val.length > 6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))) no = 2;

      // If the password length is greater than 6 and contain alphabet,number,special character respectively
      if (val.length > 6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))) no = 3;

      // If the password length is greater than 6 and must contain alphabets,numbers and special characters
      if (val.length > 6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) no = 4;

      if (no == 1) {
        document.getElementById("mess").innerHTML = "<p class='text-danger'>Mật khẩu nên có hơn 6 kí tự</p>";
      }

      if (no == 2) {
        document.getElementById("mess").innerHTML = "<p class='text-secondary'>Mật khẩu nên thêm số hoặc kí tự </p>";
      }

      if (no == 3) {
        document.getElementById("mess").innerHTML = "";
      }

      if (no == 4) {
        document.getElementById("mess").innerHTML = "";
      }
    } else {
      document.getElementById("mess").innerHTML = "";
    }
  }
</script>

</body>

</html>

<?php

if (isset($_POST['register'])) {
    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_pass = $_POST['c_pass'];

    $c_phone = $_POST['c_phone'];

    $c_address = $_POST['c_address'];

    $get_email = "select * from khach_hang where email='$c_email'";

    $run_email = mysqli_query($con, $get_email);

    $check_email = mysqli_num_rows($run_email);

    if ($check_email == 1) {

      echo "<script>alert('Email này đã có người sử dụng, hãy dùng email khác.')</script>";

      exit();
    }

    $insert_customer = "insert into khach_hang (ten_kh,email,dia_chi,so_dt) values ('$c_name','$c_email','$c_address','$c_phone')";

    $run_customer = mysqli_query($con, $insert_customer);

    $insert_account = "insert into tai_khoan (email,mat_khau,phan_quyen) values ('$c_email','$c_pass','')";

    $run_account = mysqli_query($con, $insert_account);


    $_SESSION['customer_email'] = $c_email;

    echo "<script>alert('Bạn đã đăng kí thành công')</script>";

    echo "<script>window.open('index.php','_self')</script>";
}

?>