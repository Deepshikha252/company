<?php 
   include 'includes/session.php';
?>
<?php
include 'includes/config.php';
$booking_id = $_GET['booking-id'];
$sql = "SELECT * FROM `appointment_data` WHERE bill_id='$booking_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  foreach ($result as $key => $value) {
    // echo "<pre>";
    // print_r($value);
    // echo "</pre>";
    $name = $value['name'];
    $email = $value['email'];
    $contact = $value['contact'];
  }
}
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
    <title>Salon</title>
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/icon.css"/>
    <link rel="stylesheet" type="text/css" href="assets/dependencis/jvmap.css"/>
    <link rel="stylesheet" type="text/css" href="assets/dependencis/jquerythem.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/> -->
    <?php include 'includes/header.php';?>
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php include 'includes/navbar.php';?>
      <?php include 'includes/sidebar.php';?>
      <div class="be-content">
        <div class="outer_add_product">
          <div class="card">

                <!-- <div class="card-header">Client Folio</div> -->
                <div class="row">
                  <div class="col-md-5">
                    <div class="client_details mb-3 ml-2 mt-2">
                              <div>
                                <h4><?php echo $name;?></h4>
                                <div id="subscription_member">
                                  <div class="member_subs">
                                    <span><i class="bi bi-coin"></i></span> &nbsp; <span>Gold Member</span>
                                  </div>
                                </div>
                              </div>
                              <table width="100%" cellspacing="0" cellpadding="2">
                                <tbody>
                                  <tr>
                                    <th>Email</th>
                                    <td><?php echo $email;?></td>
                                  </tr>
                                  <tr>
                                    <th>Mobile</th>
                                    <td><?php echo $contact;?></td>
                                  </tr>
                                </tbody>
                              </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="tab-container">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link" href="#bookings" data-toggle="tab" role="tab" aria-selected="true">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab" role="tab" aria-selected="false">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="#addmembership" data-toggle="tab" role="tab" aria-selected="false">Membership</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#billing" data-toggle="tab" role="tab" aria-selected="false">Billing</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane " id="bookings" role="tabpanel">
                      <div class="main-content container-fluid">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="client_details p-0">
                              <div class="header_coman">
                                <h4>Bookings</h4>
                              </div>
                              <div class="p-2">
                                <div class="bookings_details">
                                  <div class="row">
                                    <div class="col-md-6 text-left">
                                      <span>Upcoming</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                      <span>23 aug 2022</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                      <span>Preferred Time</span><span>9:00 AM</span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12 d-flex justify-content-between">
                                      <span>Booking Date</span><span>22 aug 2022</span>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                      <span>Booking Time</span><span>11:00 AM</span>
                                    </div>
                                    <div class="col-12">
                                      <div class="btn btn-success text-center">
                                        Upcomming
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                      <p>Coming soon...</p>
                    </div>
                    <div class="tab-pane" id="addmembership" role="tabpanel">
                      <p>Coming soon...</p>
                    </div>
                    <div class="tab-pane active" id="billing" role="tabpanel">
                      <div class="container-fluid">
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <div class="client_details p-0">
                              <div class="header_coman">
                                <h4>Checkout</h4>
                              </div>
                              <?php   
                                    $booking_id = $_GET['booking-id'];
                              ?>
                              <input type="hidden" value="<?php echo $booking_id?>" name="" id="add_row">
                              <input type="hidden" value="1" id="total_start">
                              <input type="hidden" value="1" id="total_start_product">
                              <input type="hidden" value="1" id="total_start_extra">
                              <div class="add_btn_expense">
                                <div class="" id="add_btn_area">

                                </div>
                                <div class="add_expences pl-3 pr-3 pt-1 pb-1 mt-2 mb-2">
                                  <button class="btn btn-space btn-primary mr-3" id='add_services'>Add Services</button>
                                  <button class="btn btn-space btn-primary mr-3" id='add_product'>Add Product</button>
                                  <button class="btn btn-space btn-primary mr-3" id='add_membership'>Add Membership</button>
                                  <button class="btn btn-space btn-primary mr-3" id='add_extra'>Extra Charges</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-5">
                            <div>
                              <label>Notes</label> 
                              <textarea class="form-control" rows="3" class="w-100"></textarea>
                            </div>
                          </div>
                          <div class="col-md-7 ml-auto">
                            <div class="client_details">
                              <div class="billing_details">
                                <h4>Billing</h4>
                                <div class="amount_area">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable">Gross Total Amount</h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable" ><span>₹</span> <span id='gross_total'>0</span></h6>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable">CGST (5%) <input id="input_cgst" type="hidden" value="5"></h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable">₹ <span id="cgst">0</span></h6>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable">SGST (10%) <input id="input_sgst" type="hidden" value="10"></h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable">₹ <span id="sgst">0</span></h6>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable">Miscellaneous Charges</h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable">₹ 0</h6>
                                    </div>
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable">Other Charges</h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable"><button class="btn-new new_btn_css">Add</button></h6>
                                    </div>
                                  </div>
                                  <div id="add_more_row">
                                    <div class="row">
                                      <div class="col-6 text-left">
                                        <h6 class="checkout_lable"><input type="" class="form-control custom_input_clas" value="Hair Cut" name=""></h6>
                                      </div>
                                      <div class="col-6 text-right">
                                        <h6 class="checkout_lable"><input type="" class="form-control custom_input_clas" value="100" name=""></h6>
                                      </div>
                                    </div>
                                  </div> -->
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h6 class="checkout_lable" style="font-size: 1.3rem;">Net Total</h6>
                                    </div>
                                    <div class="col-6 text-right">
                                      <h6 class="checkout_lable" style="font-size: 1.3rem;">₹ <span id="net_total">0</span></h6>
                                    </div>
                                  </div>
                                  <div>
                                    <h6 class="checkout_lable">Total Amount Payable &nbsp; &nbsp; ₹ 1800/-</h6>
                                  </div>
                                  <div class="payment_mode_area">
                                    <h4 class="mb-4">Payment Mode</h4>
                                    <div class="row">
                                      <div class="col-md-3">
                                        <div class="main_settlement_option border">
                                          <span class="settle_in_option">Cash</span>
                                          <input type="" name="" class="settle_in_input">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="main_settlement_option border">
                                          <span class="settle_in_option">Card</span>
                                          <input type="" name="" class="settle_in_input">
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="main_settlement_option border">
                                          <span class="settle_in_option">UPI</span>
                                          <input type="" name="" class="settle_in_input">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
    <!-- <script type="text/javascript" src="assets/js/tooltip.js"></script> -->
    <!-- <script type="text/javascript" src="assets/js/floattime.js"></script> -->
    <?php include 'includes/footer_script.php' ?>
    <script type="text/javascript">
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
      })

      // fetch bookings ----------------

      // function fectch_bookings() {
      //   $.ajax({
      //     url: 'ajaxfiles/fectch_bookings.php',
      //     type: 'POST',
      //     beforeSend: function () {
      //       console.log('finding');
      //     },
      //     data: {action: 'bookings'},
      //     success: function (data) {
      //       $('#print_bookings').html(data);
      //     }
      //   }).done(function () {
      //     // body...
      //   })
      // }
      // fectch_bookings();

      // $add_services
      // add_product
        function gst() {
          var sum = 0;
            $("input[class *= 'stotal']").each(function(){
                sum += +$(this).val();
            });
            $('#gross_total').html(sum);
            var cgst = $('#input_cgst').val();
            var sgst = $('#input_sgst').val();
            var gst = cgst + sgst;
            var cgst_total = sum * cgst / 100;
            var sgst_total = sum * sgst / 100;
            var net_total  = Math.ceil(sum + cgst_total + sgst_total);
            $('#cgst').html(cgst_total);
            $('#sgst').html(sgst_total);
            $('#net_total').html(net_total);
        }
        $(document).on('click','#removeservise',function () {
          if (confirm('Confirm Deleting this row')) {
            var id = $(this).data('id');
            var row_id = $(this).parent().closest('div').parent().parent().attr('id');
            var fade = $(this);
            var removed_total = $(this).parent().closest('div').parent().find('#stotal').val();
            var gross_total   = $('#gross_total').html();
            var final_amt = gross_total - removed_total;
            var ssss =  $(this).parent().closest('div').parent().find('#stotal').attr('class', 's_total_none select_expense select_expense_w_50 form-control');
            gst();
            $('#gross_total').html(final_amt);
            $.ajax({
              url: 'ajaxfiles/add_row.php',
              type: 'POST',
              data: {action: 'delete',id: id, row_id:row_id},
              success: function (data) {
                console.log(data);
                if (data == 1) {
                  $(fade).closest('.add_services_exp').fadeOut('slow');
                }
              }
            })
          }
        })

        // add service ------------

        function get_price_list() {
          $.ajax({
            url: 'ajaxfiles/add_row.php',
            type: 'POST',
            data: {action: 'fetch_data'},
            success: function (data) {
              // if (data == 1) {

              // }
              console.log(data);
              $('.select_expense').html(data);
            }
          })
        }
        get_price_list();
        // add services area -------------
        $('#add_services').click(function () {
          var newIdno = parseInt($('#total_start').val())+1;
          var row = "<div class='add_services_exp service_background' id='s"+newIdno+"'>                                    <div class='d-flex'>                                      <div class='0000 mr-3'>                                      <label>Services</label>                                      <select id='service_dropdown' class='select_expense select_expense_width form-control' name='s_service'>          <?php 
          $sql = "SELECT * FROM `service_pricing` WHERE 1";
            $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value='<?php echo $row['p_service_price']; ?>' data-id='<?php echo $row['p_services_name']; ?>'><?php echo $row['p_services_name']; echo $row['p_service_price']; ?></option>              <?php }
           ?>
        </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Staff</label>                                      <select id='staff' class='select_expense select_expense_w_80 form-control' name='s_service'>                                        <option><option>Richa</option>                                        <option>Riya</option>                                      </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Select Time</label>                                      <select id='timing' class='select_expense select_expense_w_70 form-control' name='s_service'>                                        <option>8 AM</option>                                        <option>9 AM</option>                                      </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Qty</label>                                      <input type='number' name='s_service' id='qty' class='select_expense select_expense_w_50 form-control' value='0' min='0'>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Price</label>                                      <input id='price' readonly type='text' name='s_service' value='0' class='select_expense select_expense_w_50 form-control'>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Discount %</label>                                      <input type='number' id='disc' min='0' max='100' name='s_service' class='select_expense select_expense_w_50 form-control'>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Total</label>                                      <input type='text' readonly class='select_expense select_expense_w_50 form-control stotal' name='s_service' id='stotal' value='0'>                                    </div>                                    <div class='0000'>                                      <label>Remove</label><br>                                      <button class='btn btn-space btn-danger hover' id='removeservise' data-id='<?php echo $booking_id?>'>Delete</button>                                    </div>                                    </div>                                  </div>";
          $('#add_btn_area').append($(row));
          $('#total_start').val(newIdno);
          var new_id_s = 's'+newIdno;
          var id = $('#add_row').val();
          $.ajax({
            url: 'ajaxfiles/add_row.php',
            type: 'POST',
            data: {action: 'add_row',id: id, newIdno: new_id_s},
            success: function (data) {
              console.log(data);
            }
          })
        })
        // add product area -------------
        $('#add_product').click(function () {
          var newIdno = parseInt($('#total_start_product').val())+1;
          var product = "<div class='add_services_exp bg-light service_product' id='p"+newIdno+"'><div class='d-flex'>                                    <div class='0000 mr-3'>                                               <label>Product</label>          <select class='select_expense select_expense_width form-control' name='s_service' id='service_dropdown'> <?php 
          $sql = 'SELECT `id`, `product_name`,`product_price`,`product_status`, `product_delete` FROM `product` WHERE 1';
            $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value='<?php echo $row['product_price']; ?>'><?php echo $row['product_name']; echo $row['product_price']; ?></option>              <?php }
           ?>                                    </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Staff</label>                                      <select id='staff' class='select_expense select_expense_w_80 form-control' name='s_service'>                                        <option>Richa</option>                                        <option>Raman</option>                                      </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Qty</label>                                      <input id='qty' type='number' name='s_service' class='select_expense select_expense_w_50 form-control' value='0' min='0'>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Price</label>                                      <input type='text' id='price' value='0' name='s_service' class='select_expense select_expense_w_50 form-control' disabled>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Discount %</label>                                      <input type='text' id='disc' min='0' max='100' name='s_service' class='select_expense select_expense_w_50 form-control'>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Total</label>                                      <input type='text' id='stotal' class='select_expense select_expense_w_50 form-control stotal' name='s_service' value='0' disabled>                                    </div>                                    <div class='0000'>                                      <label>Remove</label><br>                                      <button class='btn btn-space btn-danger hover' id='removeservise' data-id='<?php echo $booking_id?>'>Delete</button>                                    </div>                                  </div></div>";
           $('#add_btn_area').append(product);
           $('#total_start_product').val(newIdno);
            var new_id_p = 'p'+newIdno;
            var id = $('#add_row').val();
            $.ajax({
              url: 'ajaxfiles/add_row.php',
              type: 'POST',
              data: {action: 'add_row_product',id: id, newIdno: new_id_p},
              success: function (data) {
                console.log(data);
              }
            })
        })
        $('#add_extra').click(function () {
          var newIdno = parseInt($('#total_start_extra').val())+1;
          var extra_charge = "<div class='add_services_exp bg-light service_product' id='e"+newIdno+"'><div class='d-flex'>                                    <div class='0000 mr-3'>                                               <label>Extra Charges</label>          <select class='select_expense select_expense_width form-control' name='s_service' id='service_dropdown'> <?php 
          $sql = 'SELECT `id`, `product_name`,`product_price`,`product_status`, `product_delete` FROM `product` WHERE 1';
            $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value='<?php echo $row['product_price']; ?>'><?php echo $row['product_name']; echo $row['product_price']; ?></option>              <?php }
           ?>                                    </select>                                    </div>                                    <div class='0000 mr-3'>                                      <label>Staff</label>                                      <select id='staff' class='select_expense select_expense_w_80 form-control' name='s_service'>                                        <option>Richa</option>                                        <option>Raman</option>                                      </select>                                    </div>                                                                        <div class='0000 mr-3'>                                      <label>Charges</label>                                      <input type='text' id='charges' name='s_service' class='select_expense select_expense_w_50 form-control' placeholder='0' min='0'>                                    </div>                                                                        <div class='0000 mr-3'>                                      <label>Total</label>                                      <input type='text' id='stotal' class='select_expense select_expense_w_50 form-control stotal' name='s_service' value='0' disabled>                                    </div>                                    <div class='0000'>                                      <label>Remove</label><br>                                      <button class='btn btn-space btn-danger hover' id='removeservise' data-id='<?php echo $booking_id?>'>Delete</button>                                    </div>                                  </div></div>";
           $('#total_start_extra').val(newIdno);
           $('#add_btn_area').append(extra_charge);
            var new_id_p = 'e'+newIdno;
            var id = $('#add_row').val();
            $.ajax({
              url: 'ajaxfiles/add_row.php',
              type: 'POST',
              data: {action: 'add_row_product',id: id, newIdno: new_id_p},
              success: function (data) {
                console.log(data);
              }
            })
        })
        $(document).on('change','#service_dropdown',function () {
          var id = $(this).val();
          $(this).parent().closest('div').parent().find('#price').val(id);
          $(this).parent().closest('div').parent().find('#qty').val('1');
          $(this).parent().closest('div').parent().find('#disc').val('0');
          $(this).parent().closest('div').parent().find('#stotal').val(id);
        })
        $(document).on('input','input[name="s_service"]',function () {
          var service = $(this).parent().closest('div').parent().find('#price').val();
          var qty = $(this).parent().closest('div').parent().find('#qty').val();
          var total = service*qty;
          $(this).parent().closest('div').parent().find('#stotal').val(total);
          var disc = $(this).parent().closest('div').parent().find('#disc').val();
          var total = $(this).parent().closest('div').parent().find('#stotal').val();
          var discounted = total * disc / 100;
          var after_less = Math.ceil(total - discounted);
          $(this).parent().closest('div').parent().find('#stotal').val(after_less);
        })
        $(document).on('change','input[name="s_service"],select[name="s_service"]',function () {
          var service = $(this).parent().closest('div').parent().find('#service_dropdown :selected').data('id');
          var price = $(this).parent().closest('div').parent().find('#price').val();
          var qty = $(this).parent().closest('div').parent().find('#qty').val();
          var stotal = $(this).parent().closest('div').parent().find('#stotal').val();
          var staff = $(this).parent().closest('div').parent().find('#staff').val();
          var timing = $(this).parent().closest('div').parent().find('#timing').val();
          var disc = $(this).parent().closest('div').parent().find('#disc').val();
          var row_id = $(this).parent().closest('div').parent().parent().attr('id');
          var id = $('#add_row').val();
          gst();
          $.ajax({
            url: 'ajaxfiles/add_row.php',
            type: 'POST',
            data: {action: 'update_row_service',service:service,price:price,qty:qty,stotal:stotal,staff:staff,timing:timing,disc:disc,row_id:row_id,id:id},
            success: function (data) {
              console.log(data);
            }
          })
          //console.log(service +'|'+price+'|'+disc+'|'+qty+'|'+stotal+'|'+staff+'|'+timing+'|'+row_id+'|'+id);
        })
        // $(document).on('change','input[name="s_service"],select[name="s_service"]',function () {
        //      var data = $('[id="stotal"][name="s_service"]').val();
        //      console.log(data);
        // })
    </script>

    <!-- https://www.miosalon.com/?gclid=Cj0KCQjw9ZGYBhCEARIsAEUXITXqdjwMFoH91WZUSzTpOI1uSFjes16hdA6EeRrGGa9LR4I5HZjpwsIaArB_EALw_wcB -->

  </body>
</html>