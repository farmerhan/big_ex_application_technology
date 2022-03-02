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
      <span class="nero__bold">shop</span> AT AVE
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
      <!--- col-md-12 Starts -->



    </div>
    <!--- col-md-12 Ends -->

    <div class="col-md-3">
      <!-- col-md-3 Starts -->

      <?php include("includes/sidebar.php"); ?>

    </div><!-- col-md-3 Ends -->

    <div class="col-md-9">
      <!-- col-md-9 Starts --->


      <?php getProducts(); ?>

    </div><!-- row Ends -->

    <center>
      <!-- center Starts -->

      <ul class="pagination">
        <!-- pagination Starts -->

        <?php getPaginator(); ?>

      </ul><!-- pagination Ends -->

    </center><!-- center Ends -->

  </div><!-- col-md-9 Ends --->



</div>
<!--- wait Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {

    /// Hide And Show Code Starts ///

    $('.nav-toggle').click(function() {

      $(".panel-collapse,.collapse-data").slideToggle(700, function() {

        if ($(this).css('display') == 'none') {

          $(".hide-show").html('Show');

        } else {

          $(".hide-show").html('Hide');

        }

      });

    });

    /// Hide And Show Code Ends ///

  });
</script>


<script>
  $(document).ready(function() {

    // getProducts Function Code Starts

    function getProducts() {

      $.ajax({

        url: "load.php",

        method: "POST",

        data: {
          
        },

        success: function(data) {

          $('#Products').html('');

          $('#Products').html(data);

        }

      });

    }

  });
</script>

</body>

</html>