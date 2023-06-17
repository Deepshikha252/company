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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- <link rel="shortcut icon" href="assets/img/logo-fav.png"> -->
    <title>Salon</title>
    <style type="text/css">
      .price_table {
        overflow: auto;
      }
    </style>
    <?php include 'includes/header.php';?>
  </head>
  <body>
    <!--  -->
    


    <div class="be-wrapper be-fixed-sidebar">
      <?php include 'includes/navbar.php';?>
      <?php include 'includes/sidebar.php';?>
      <div class="be-content">
        <div class="outer_add_product">
          <div class="main-content container-fluid mt-1">
            <div class="row mb-3">
              <div class="col-12">
                <h3>Subscription Payment Details</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="price_table">
                  <table width="100%" cellspacing="0" class="table table-striped table-bordered" id="subscription">
                    <thead>
                      <tr>
                        <th class="text-center"><input type="checkbox" id='checkAll' checked disabled></th>
                        <th>S.no</th>
                        <th>Date</th>
                        <th>Pay Status</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Mid</th>
                        <th>Txnid</th>
                        <th>Txnamount</th>
                        <th>Paymentmode</th>
                        <th>Currency</th>
                        <th>Txndate</th>
                        <th>Respcode</th>
                        <th>Respmsg</th>
                        <th>Gatewayname</th>
                        <th>Banktxnid</th>
                        <th>Bankname</th>
                        <th>Checksumhash</th>
                      </tr>
                    </thead>
                    <tbody id="user_subscription">
                      <?php 
                        include '../includes/config.php';
                        $sql = "SELECT * FROM `subscription_payment` ORDER BY s_no DESC";
                        $result = mysqli_query($conn , $sql);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                          <td>
                            <?php 
                            if ($row['send_mail'] == '1') { ?>
                              <input type="checkbox" class="confirm_check" data-id="<?php echo $row['s_no']?>" checked>
                            <?php } else {?>
                              <input type="checkbox" class="confirm_check" data-id="<?php echo $row['s_no']?>">
                            <?php }
                            ?>
                          </td>
                         <td><?php echo $i?></td>
                         <td><?php
                         if (date("j-n-Y") == $row['date']) {?>
                          <div class="bg-success text-white text-center rounded"><?php echo "Today"; ?></div>
                         <?php } else if (date('j-n-Y',strtotime("yesterday")) == $row['date']) {
                           echo "Yesterday";
                         } else {
                          echo $row['date'];
                         }
                          ?></td>
                         <td><?php if ($row['status_pay'] == 'TXN_SUCCESS') {?>
                           <div class="bg-success text-white text-center rounded w-100 px-2"><?php echo " Success "; ?></div>
                         <?php } else {?>
                          <div class="bg-danger text-white text-center rounded w-100 px-2"><?php echo " Failure "; ?></div>
                         <?php } ?>
                         </td>
                         <td><?php echo $row['time']?></td>
                         <td><?php echo $row['username']?></td>
                         <td><?php echo $row['user_email']?></td>
                         <td><?php echo $row['user_mobile']?></td>
                         <td><?php echo $row['user_orderid']?></td>
                         <td><?php echo $row['user_txn_amount']?></td>
                         <td><?php echo $row['status']?></td>
                         <td><?php echo $row['mid']?></td>
                         <td><?php echo $row['txnid']?></td>
                         <td><?php echo $row['txnamount']?></td>
                         <td><?php echo $row['paymentmode']?></td>
                         <td><?php echo $row['currency']?></td>
                         <td><?php echo $row['txndate']?></td>
                         <td><?php echo $row['respcode']?></td>
                         <td><?php echo $row['respmsg']?></td>
                         <td><?php echo $row['gatewayname']?></td>
                         <td><?php echo $row['banktxnid']?></td>
                         <td><?php echo $row['bankname']?></td>
                         <td><?php echo $row['checksumhash']?></td>
                       </tr> 
                      <?php
                      $i++;
                        }
                        ?>
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
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script> -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <?php include 'includes/footer_script.php' ?>
    <script type="text/javascript">
      $(document).on('change','.confirm_check',function () {
        var id = $(this).data('id');
        $.ajax({
          url:'ajaxfiles/subscription_action.php',
          type: 'POST',
          data: {action:'check_confirm',id:id},
          success: function (data) {
            console.log(data);
          }
        })
      })
    </script>
  </body>
</html>