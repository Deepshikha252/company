<?php 
include 'includes/config.php';
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
    <title>Login</title>
    <?php include 'includes/header.php'; ?>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card overflow-hidden">
              <div class="loader_on_login" id="loader" style="height:8px;">
                
              </div>
              <div class="card-header"><img class="logo-img" src="https://gliss.in/assets/img/logo/logo.png" alt="logo" width="67" height="55"><span class="splash-description">Please provide your login credentials.</span>
                <div class="text-center" style="font-size:1rem;" id="show_message"> </div>
              </div>
              <div class="card-body">
                <form id="login-form">
                  <div class="form-group">
                    <input class="form-control" id="username" type="text" placeholder="Username" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="password" type="password" placeholder="Password">
                  </div>
                  <!-- <div class="form-group row login-tools">
                    <div class="col-6 login-remember">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="checkbox1">
                        <label class="custom-control-label" for="checkbox1">Remember Me</label>
                      </div>
                    </div>
                    <div class="col-6 login-forgot-password"><a href="pages-forgot-password.html">Forgot Password?</a></div>
                  </div> -->
                  <button class="btn btn-primary btn-xl d-block w-100" value="login" name='login'>Log in</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'includes/footer.php';?>
    <script type="text/javascript">
      var loader = "<div class='progress md-progress primary-color-dark'>                    <div class='indeterminate'></div>                </div>";
      $('#login-form').submit(function (e) {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();
        if (username == '') {
          $('#username').css('border','1px solid red');
          $('#username').trigger('focus');
          return false;
        } else {
          $('#username').css('border','1px solid #d5d8de');
        }
        if (password == '') {
          $('#password').css('border','1px solid red');
          $('#password').trigger('focus');
          return false;
        } else {
          $('#password').css('border','1px solid #d5d8de');
        }
        // console.log(password + username);
        var m1 = "<span class='text-success'>logged in successfull Redirecting...</span>";
        var m2 = "<span class='text-danger'>Invalid login credential</span>";
        var m3 = "<span class='text-danger'>Something went wrong</span>";
        var m4 = "<span class='text-secondary'>verifying...</span>";
        $.ajax({
          url:'ajaxfiles/log-in-out.php',
          type: 'POST',
          data: {action:'login',username:username,password:password},
          beforeSend: function () {
            $('#show_message').html(m4);
            $('#loader').html(loader);
          },
          success: function (data) {
            if (data == '1') {
              $('#show_message').html(m1);
              setInterval(function(){
                window.location.href="<?php echo $base_url; ?>"+"admin.php";
              },2000);
            } else if (data == '2') {
              $('#show_message').html(m2);
              $('#loader').html('');
            } else {
              $('#show_message').html(m3);
              $('#loader').html('');
            }
          }
        }).done(function () {
          
        });
      })
      

    </script>
  </body>
</html>