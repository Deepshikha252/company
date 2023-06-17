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
              <div class="col-12 pr-0 pl-0">
                <div class="appointment_table">
                  <table width="100%" cellspacing="0" class="table table-bordered">
                    <thead class="table_head">
                      <tr>
                        <th>S.no</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Service Type</th>
                        <th>Preferred Date</th>
                        <th>Preferred Time</th>
                        <th>Status</th>
                        <th>Scheduling</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="print_bookings">
                      <tr>
                        <td class="text-center">01</td>
                        <td>26-08-2022</td>
                        <td>Avinash</td>
                        <td>Male</td>
                        <td>9898784859</td>
                        <td>abc@gmail.com</td>
                        <td>Hair Cut</td>
                        <td>26-08-2022</td>
                        <td><div class="d-flex justify-content-between"><input type="text" name="" value="9 AM" class="time" readonly><button class="btn btn-sm"><i class="bi bi-pencil-square"></i></button></div></td>
                        <td><div class="upcoming comman_status up_yellow">Upcoming</div></td>
                        <td><button class="btn btn-dark btn-sm not_confirmed" data-bs-toggle="tooltip" title="Click to Confirm">Not Confirmed</button></td>
                        <td><input type="text" name="" value="Sundar p." class="time" readonly></td>
                      </tr>
                      <tr>
                        <td class="text-center">01</td>
                        <td>26-08-2022</td>
                        <td>Avinash</td>
                        <td>Male</td>
                        <td>9898784859</td>
                        <td>abc@gmail.com</td>
                        <td>Hair Cut</td>
                        <td>26-08-2022</td>
                        <td>9 AM</td>
                        <td><div class="completed comman_status up_green">Completed</div></td>
                        <td>Confirmed</td><td><input type="text" name="" value="Sundar p." class="time" readonly></td>
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
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
      })

      // fetch bookings ----------------

      function fectch_bookings() {
        $.ajax({
          url: 'ajaxfiles/fectch_bookings.php',
          type: 'POST',
          beforeSend: function () {
            console.log('finding');
          },
          data: {action: 'bookings'},
          success: function (data) {
            $('#print_bookings').html(data);
          }
        }).done(function () {
          // body...
        })
      }
      fectch_bookings();
    </script>
  </body>
</html>