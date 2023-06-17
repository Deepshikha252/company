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
    <!-- <link rel="shortcut icon" href="assets/img/logo-fav.png"> -->
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
              <div class="col-6 ">
                <div>
                  <h3>Female</h3>
                </div>
              </div>
              <div class="col-6">
                <div>
                  <h3>Male</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="price_table">
                  <table width="100%" cellspacing="0" class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Services</th>
                        <th>Price</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody id="pricing">
                      <tr>
                        <td>1.</td>
                        <td>Hair cut</td>
                        <td><input type="text" value="200" name=""></td>
                        <td><button class="btn-outline-dark">edit</button></td>
                      </tr>
                    </tbody>
                  </table>
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
    <?php include 'includes/footer_script.php' ?>
    <script type="text/javascript">

    </script>
  </body>
</html>