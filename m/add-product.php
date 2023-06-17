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
    <title>Salon</title>
    <style type="text/css">
       .brand_table td, .brand_table th {
           padding: 8px 3px !important;
        }
    </style>
    <?php include 'includes/header.php';?>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <?php include 'includes/navbar.php';?>
      <?php include 'includes/sidebar.php';?>
      <div class="be-content">
        <div class="outer_add_product">
          <div class="main-content container-fluid">
            <!-- Products Start -->
            <div class="card">
                <div class="card-header">Products</div>
                <div class="tab-container">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#addproduct" data-toggle="tab" role="tab" aria-selected="true">Add Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categories" data-toggle="tab" role="tab" aria-selected="false">Add Categories | Brand</a></li>
                    <li class="nav-item"><a class="nav-link" href="#messages" data-toggle="tab" role="tab" aria-selected="false">Messages</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="addproduct" role="tabpanel">
                      <form method="post" id="product_form">
                        <input type="hidden" id="update_p_id" value="">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="form-label">Retail / In House:</label>
                                  <select class="form-control" id="rtl_inhouse" required>
                                    <option selected disabled></option>
                                    <option value="retail">Retail</option>
                                    <option value="inhouse">In House</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="form-label">Brand:</label>
                                  <select class="form-control" id="select_brand" required>
                                    
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group mb-2">
                              <label class="form-label">Product Name:</label>
                              <input class="form-control" id="prd_name" type="text" placeholder="Title">
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="form-label">Price:</label>
                                  <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">&#8377;</div>
                                    </div>
                                    <input type="number" class="form-control" id="prd_price" min="0" value="0">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group mb-2">
                                  <label class="form-label">Quantity:</label>
                                  <input class="form-control" id="qty_total" type="number" value="0" min="0">
                                </div>
                              </div>
                            </div>
                            <div class="form-group mb-2">
                              <label class="form-label">Item Form:</label>
                              <input class="form-control" id="itm_from" type="text" placeholder="Lotion, Cream, Oil">
                            </div>
                            <div class="form-group mb-2">
                              <label class="form-label">Use for:</label>
                              <input class="form-control" id="use_for" type="text" placeholder="Hands, Legs, Whole Body">
                            </div>
                            <div class="form-group mb-2">
                              <label class="form-label">Active Ingredients:</label>
                              <input class="form-control" id="ingredients" type="text" placeholder="Babuna, Kumari, Genhu, Gulab">
                            </div>
                            <div class="form-group mb-2">
                              <label class="form-label">Item Volume:</label>
                              <input class="form-control" id="itm_volume" type="text" placeholder="10 gm">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="upload_produt">
                              <label class="form-label">Upload image:</label>
                              <div class="upload_panel">
                                <button type="text" class="btn btn-primary btn-sm mx-3" id="upload_image">Upload</button><input id="choose_prd_image" type="file" name="prd_img">
                              </div>
                              <div class="progress mt-3 border" style="height: 8px !important;">
                                <div id="add_progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="transition: 0.5s ease;"></div>
                              </div>
                              <div class="produc_image_add_pro border">
                                <img src="assets/img/l1.jpg" class="img-fluid" style="width: 50%; display: block; margin: auto;">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-label">Product Description:</label>
                              <textarea class="form-control" rows="6" id='prd_discription'></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">About this item:</label><br>
                              <button id="add_field" class="btn btn-sm btn-primary px-4 me-3 add_o">Add</button>
                              <button id="remove_field" class="btn btn-sm btn-danger px-4 me-3 add_i">Remove</button>
                              <br>
                            </div>
                          </div>
                          <div class="col-12">
                            <div id="new_chq">
                              <input type="hidden" value="1" id="total_chq">
                              <input type="text" name='multifield' class="form-control mb-2 new_input_height" id="job_resp" placeholder="e.g ">
                            </div> 
                          </div>
                          <div class="col-md-12">
                            <button class="btn btn-primary px-5" type="submit">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- Brand Start -->
                    <div class="tab-pane" id="categories" role="tabpanel">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-6 pr-1">
                            <div class="main_brad border-right">
                              <h4>Brand</h4>
                              <div class="add_brand">
                                <button class="btn btn btn-primary px-4" data-toggle="modal" data-target="#products"><span class="mr-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg></span> Add Brand</button>
                              </div>
                              <br>
                              <div>
                                <table width="100%" cellspacing="0" cellpadding="0" class="table table-bordered brand_table">
                                  <thead>
                                    <tr>
                                      <th>S no.</th>
                                      <th width="40%">Brand</th>
                                      <th>Active</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody id="product_actin">
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 pl-1">
                            <div class="main_brad">
                              <h4>Retail / In House</h4>
                              <div class="add_brand">
                                <button class="btn btn-sm btn-primary px-4">Add Brand</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel">
                      <p>Consectetur adipisicing elit. Ipsam ut praesentium, voluptate quidem necessitatibus quam nam officia soluta aperiam, recusandae.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos facilis laboriosam, vitae ipsum tenetur atque vel repellendus culpa reiciendis velit quas, unde soluta quidem voluptas ipsam, rerum fuga placeat rem error voluptate eligendi modi. Delectus, iure sit impedit? Facere provident expedita itaque, magni, quas assumenda numquam eum! Sequi deserunt, rerum.</p><a href="#">Read more  </a>
                    </div>
                  </div>
                </div>
              </div>
            <!--  -->
          </div>
        </div>
      </div>
    </div>
    <!-- add brand modal Modal -->
    <div class="modal hide fade" id="products" tabindex="-1" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div id="brand_loader" style="display: none;">
            <div class='progress md-progress primary-color-dark'>
              <div class='indeterminate'></div>
            </div>
          </div>
          <div class="modal-header">
            <h5 class="modal-title" id="productsLabel">Add Brand</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="brand_form">
          <div class="modal-body">
            <label>Upload Brand Logo</label> <br>
            <input type="file" name="brand_image" id="brand_image"><br>
            <small>Image size 300px 300px</small> <br>
            <em class="text-danger" id="set_image_error_brand"></em>
            <br>
            <br>
            <label>Brand Name</label>
            <input type="text" name="brand_name" id="brand_name" class="form-control">
          </div>
          <div class="modal-footer">
            <div id='success_prd' style="display:none;" class="alert alert-success m-0 px-5 py-1" role="alert">
             <span class="mr-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
              <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
              <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
            </svg></span> Inserted Successfully
            </div>
            <a href="" type="button" class="btn btn-secondary">Close</a>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/jqueryui.js"></script>
    <?php include 'includes/footer_script.php' ?>
    <script type="text/javascript">
      // Add Product -------------------------------
      // fetch product -------------------

      function select_brand() {
        $.ajax({
          url: 'ajaxfiles/prduct_fetch_action.php',
          type: 'POST',
          data: {action:'get_product'},
          beforeSend: function () {
            // $('#brand_loader').fadeIn(100);
          },
          success: function (data) {
            $('#select_brand').html(data);
          }
        })
      }
      select_brand();

      // Key Points add remove button ----------------

          $('#add_field').click(function (e) {
            e.preventDefault();
            var new_chq_no = parseInt($('#total_chq').val())+1;
             var new_input="<input class='form-control mb-2 new_input_height' type='text' name='multifield' id='new_"+new_chq_no+"'>";
             $('#new_chq').append(new_input);
             $('#total_chq').val(new_chq_no);
           })

        $('#remove_field').click(function (e) {
          e.preventDefault();
          var last_chq_no = $('#total_chq').val();
          if(last_chq_no>1){
            $('#new_'+last_chq_no).remove();
            $('#total_chq').val(last_chq_no-1);
          }
        })

      // Add Brand Category ------------------------
      function get_brand() {
        $.ajax({
          url: 'ajaxfiles/prduct_fetch_action.php',
          type: 'POST',
          data: {action:'get_brand'},
          beforeSend: function () {
            // $('#brand_loader').fadeIn(100);
          },
          success: function (data) {
            $('#product_actin').html(data);
          }
        })
      }
      get_brand();

      $('#upload_image').click(function (e) {
        e.preventDefault();
        var file_data = $('#choose_prd_image').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
            url: "ajaxfiles/upload_product_image.php",
            type: "POST",
            data:  form_data,
            contentType: false,
            cache: false,
            processData:false,
            xhr: function () {
               let xhr = new window.XMLHttpRequest();
               xhr.upload.addEventListener('progress',(evt) => {
                 if (evt.lengthComputable) {
                   let percentage = (evt.loaded / evt.total) * 100;
                   $('#add_progress').css('width',percentage+'%');
                   if (percentage == 100) {
                     $('#add_progress').css('background-color','#22b129');
                   }
                   //console.log('% ' + percentage);
                 }
               }, false);
               return xhr;
             },
            success: function(data){
                if ($.isNumeric(data)) {
                  $('#update_p_id').val(data);
                } else {
                  alert('Something went wrong');
                }
            }
        });
      });

      $('#product_form').submit(function (e) {
        e.preventDefault();
        var update_p_id     = $('#update_p_id').val();
        var rtl_inhouse     = $('#rtl_inhouse').val();
        var qty_total       = $('#qty_total').val();
        var prd_name        = $('#prd_name').val();
        var select_brand    = $('#select_brand').val();
        var itm_from        = $('#itm_from').val();
        var use_for         = $('#use_for').val();
        var ingredients     = $('#ingredients').val();
        var itm_volume      = $('#itm_volume').val();
        var prd_discription = $('#prd_discription').val();
        var prd_price       = $('#prd_price').val();
        ftxtn = "";
        $("input[name='multifield']").each(function() {
          var txt = $(this).val() || '';
          txt   = txt.trim();
          ftxtn = ftxtn+txt +'#$#$';
        });
        if (ftxtn == '') {
          $("input[name='multifield']").trigger('focus');
          $("input[name='multifield']").css('border-color','red');
          return false;
        }
        if (rtl_inhouse == '') {
          $('#rtl_inhouse').trigger('focus');
          return false;
        }
        if (qty_total == '' || qty_total == 0) {
          $('#qty_total').trigger('focus');
          $('#qty_total').css('border-color','red');
          return false;
        } else {
          $('#qty_total').css('border-color','#d5d8de');
        }
        if (prd_name == '') {
          $('#prd_name').trigger('focus');
          $('#prd_name').css('border-color','red');
          return false;
        } else {
          $('#prd_name').css('border-color','#d5d8de');
        }
        if (select_brand == '') {
          $('#select_brand').trigger('focus');
          return false;
        }
        if (itm_from == '') {
          $('#itm_from').trigger('focus');
          $('#itm_from').css('border-color','red');
          return false;
        } else {
          $('#itm_from').css('border-color','#d5d8de');
        }
        if (use_for == '') {
          $('#use_for').trigger('focus');
          $('#use_for').css('border-color','red');
          return false;
        } else {
          $('#use_for').css('border-color','#d5d8de');
        }
        if (ingredients == '') {
          $('#ingredients').trigger('focus');
          $('#ingredients').css('border-color','red');
          return false;
        } else {
          $('#ingredients').css('border-color','#d5d8de');
        }
        if (itm_volume == '') {
          $('#itm_volume').trigger('focus');
          $('#itm_volume').css('border-color','red');
          return false;
        } else {
          $('#itm_volume').css('border-color','#d5d8de');
        }
        if (prd_discription == '') {
          $('#prd_discription').trigger('focus');
          $('#prd_discription').css('border-color','red');
          return false;
        } else {
          $('#prd_discription').css('border-color','#d5d8de');
        }
        if (update_p_id == '') {
          alert('Upload image');
          return false;
        }
        if (prd_price == '') {
          alert('Upload image');
          return false;
        }
        $.ajax({
          url: 'ajaxfiles/prduct_details.php',
          type: 'POST',
          data: {ftxtn:ftxtn,
                  update_p_id:update_p_id,
                  rtl_inhouse:rtl_inhouse,
                  qty_total:qty_total,
                  prd_name:prd_name,
                  select_brand:select_brand,
                  itm_from:itm_from,
                  use_for:use_for,
                  ingredients:ingredients,
                  itm_volume:itm_volume,
                  prd_discription:prd_discription,
                  prd_price:prd_price
          },
          success: function (data) {
            if (data == '1') {
              var alert = "<div class='alert align-items-center position-fixed hide_in_some_time p-0' style='z-index: 9999; top:78px; right: 11px; background:#38b000; color:#fff;' role='alert'>          <div class='py-3 px-5'><i class='bi bi-check2-circle w-100 pe-3'></i>          <div class='d-inline-block'>            Product added successful          </div><br></div>        <div class='loader'>  <div class='loader__element'></div></div></div>";
              $
              $('body').append(alert);
              setTimeout(function() {
              $('.hide_in_some_time').hide(100);
              }, 7000);
              $('#product_form').trigger('reset');

          }
        }
        }).done(function () {

        });
      });

      $('#brand_form').submit(function (e) {
        $('#products').modal({backdrop: 'static', keyboard: false});
        e.preventDefault();
        var brand_image = $('#brand_image').val();
        var brand_name = $('#brand_name').val();
        if (brand_image == '') {
          $('#set_image_error_brand').html('Please Upload Image *');
          return false;
        } else {
          $('#set_image_error_brand').html('');
        }
        if (brand_name == '') {
          $('#brand_name').css('border-color','red');
          $('#brand_name').trigger('focus');
          return false;
        } else {
          $('#brand_name').css('border-color','#d5d8de');
        }
        var formData = new FormData(document.getElementById('brand_form'));
        $.ajax({
          url: 'ajaxfiles/prduct_action.php',
          type: 'POST',
          processData: false,
          contentType: false,
          data: formData,
          beforeSend: function () {
            $('#brand_loader').fadeIn(300);
          },
          success: function (data) {
            if (data == '1') {
              $('#success_prd').fadeIn(200);
              get_brand();
              select_brand();
              setTimeout(function() {
              $('#success_prd').fadeOut(200);
              }, 3000);
            } else if (data == '2') {
              alert('Something went wrong');
            } else if (data == '3') {
              alert('File send error');
            } else {
              alert('Something went wrong');
            }
          }
        }).done(function () {
          $('#brand_loader').fadeOut(300);
          $('#brand_form').trigger('reset');
        })
      });

      // delete brand --------------

      $(document).on('click','.brnd_delete',function () {
        if (confirm('Do you want to delete this data ?')) {
          var id = $(this).data('delete');
          $.ajax({
            url: 'ajaxfiles/prduct_fetch_action.php',
            type: 'POST',
            data: {action:'delete_brand', id:id},
            beforeSend: function () {
              // $('#brand_loader').fadeIn(100);
            },
            success: function (data) {
              if (data == 1) {
                get_brand();
              }
            }
          })
        }
      })

      // Active brand --------------

      $(document).on('click','.brnd_active',function () {
          var status = $(this).data('active');
          var id = $(this).data('id');
          $.ajax({
            url: 'ajaxfiles/prduct_fetch_action.php',
            type: 'POST',
            data: {action:'active_brand', id:id,status:status},
            beforeSend: function () {
              // $('#brand_loader').fadeIn(100);
            },
            success: function (data) {
              if (data == 1) {
                get_brand();
              }
            }
          })
      })

      // Brand Edit --------------
      $(document).on('click','.brnd_edit',function () {
        // var name = $(this).closest('tr').find("input[name:brand_name]").val();
        $(this).parents("tr").find("input[name='brand_name']").removeAttr("readonly");
        $(this).parents("tr").find("input[name='brand_name']").trigger("focus");
      });
      $(document).on('change','.brnd_name_edit',function () {
          var name = $(this).parents("tr").find("input[name='brand_name']").val();
          var id = $(this).parents("tr").find("input[name='brand_name']").data('id');
          $.ajax({
            url: 'ajaxfiles/prduct_fetch_action.php',
            type: 'POST',
            data: {action:'edit_brand', id:id,name:name},
            beforeSend: function () {
              // $('#brand_loader').fadeIn(100);
            },
            success: function (data) {
              if (data == 1) {
                get_brand();
                name.parents("tr").find("input[name='brand_name']").attr("readonly");
              }
            }
          })
      })

    //   $.ajax({
    //    url: 'ajaxfils/get_applicant_details.php',
    //    type: 'POST',
    //    data: formData,
    //    contentType: false,
    //    processData: false,
    //    xhr: function () {
    //      let xhr = new window.XMLHttpRequest();
    //      xhr.upload.addEventListener('progress',(evt) => {
    //        if (evt.lengthComputable) {
    //          let percentage = (evt.loaded / evt.total) * 100;
    //          $('#add_progress').css('width',percentage+'%');
    //          // if (percentage == 100) {
    //          //   $('.check_green_color').fadeIn();
    //          // }
    //        }
    //      }, false);
    //      return xhr;
    //    },
    //    success: function (data) {
    //    }
    // });
      
    </script>
     <!-- https://foxythemes.net/preview/products/beagle/form-validation.html -->
  </body>
</html>