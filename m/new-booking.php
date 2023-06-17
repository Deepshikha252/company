<?php 
   include 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/logo-fav.png">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <title>Salon</title>
    <?php include 'includes/header.php';?>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php include 'includes/navbar.php';?>
      <?php include 'includes/sidebar.php';?>
      <div class="be-content">
        <div class="outer_add_product">
          <div class="main-content container-fluid mt-3">
            <div class="row">
              <div class="col-12 pr-0 pl-0">
                <div class="appointment_table">



                <button>Add new select</button>
                <div id="dynamic-container">

                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/jqueryui.js"></script>
    <script type="text/javascript" src="assets/js/tooltip.js"></script>
    <script type="text/javascript" src="assets/js/floattime.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <?php include 'includes/footer_script.php' ?>
    <script type="text/javascript">

      $(function() {
            $("button").on("click", function() {
              $("#dynamic-container").append($("<select><option>test Check</option><option>test Check</option><option>test Check</option><option>test Check</option><option>test Check</option><option>test Check</option><option>test Check</option><option>test Check</option><select/>"));
            });

            // select the target node
            var target = document.getElementById('dynamic-container');

            if (target) {
              // create an observer instance
              var observer = new MutationObserver(function(mutations) {
                //loop through the detected mutations(added controls)
                mutations.forEach(function(mutation) {
                //addedNodes contains all detected new controls
                  if (mutation && mutation.addedNodes) {
                    mutation.addedNodes.forEach(function(elm) {
                    //only apply select2 to select elements
                      if (elm && elm.nodeName === "SELECT") {
                        $(elm).select2();
                      }
                    });
                  }
                });
              }); 
              
              // pass in the target node, as well as the observer options
              observer.observe(target, {
                childList: true
              });

              // later, you can stop observing
              //observer.disconnect();
            }
          });
    </script>
  </body>
</html>