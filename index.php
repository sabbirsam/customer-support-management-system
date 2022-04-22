<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 

// start 
    
    
	if(!isset($_SESSION['login_id'])){
    header('location:login.php'); // it call on index.php initially
  }
	  
	include 'header.php' ;

  // start 
  include("db_connect.php");
    // if(!isset($_SESSION['email']))
    // {
    //   header("location:index.php");
    // }

    if(!empty($_POST))
    {
      $msg = $_POST['msg'];
      $email = $_SESSION['email'];
      $sql = mysqli_query($conn,"SELECT * FROM customers WHERE email='$email'");
      $b= mysqli_fetch_array($sql);
      $name = $b['firstname'];
      // $email = $b['email'];
      $date = date('d-M-Y');

      $time = date('h:i a');

        // print_r($name); 

      mysqli_query($conn,"INSERT INTO box(sender,email,msg,time,date) VALUES('$name','$email','$msg','$time','$date')");
    }
// end 



?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  
/* .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}


.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} */

</style>
</head>



<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'topbar.php' ?>
  <?php include 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
            <hr class="border-primary">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <?php 
          $page = isset($_GET['page']) ? $_GET['page'] : 'home';
          include $page.'.php';
          ?>
<!-- chat system Start--------------------------------------------------------------------------------- -->
    <!-- start  -->
          <!-- <div id="chat-circle" class="btn btn-raised">
                  <div id="chat-overlay"></div>
                  <i class="material-icons">▶</i>     
            </div>
            <div class="chat-box" id="sample">
                  <span class="heading"></span><span style="float:right"> 
                      <a href="ajax.php?action=logout"><img src="images/logout.png" height="50" width="100"  /></a>
                  </span>
                  <div class="chat-box-header">
                  <span class="chat-box-toggle"><i class="material-icons">close</i></span>
                  </div>
                      <div class="chat-box-body" id="vegan">
                      <div class="chat-box-overlay">   
                      </div>
                      <div class="chat-logs">
                      </div>
                      </div>
                  <form method="post" action="" id="myForm"><form method="post" action="" id="myForm">
                      <div class="chat-input">         
                          <input name="msg" id="msg" class="fields" type="text" placeholder="Enter Your Message" required="required" style="height:50px;" size="60" />
                          <input type="submit" value="▶" class="commandButton chat-submit" style="height:54px;" />
                  </form>      
              </div>
            </div>
            
          </div> -->

        <!-- chat system End  -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">Walton </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Customer Service Management System</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>

<!-- <script type="text/javascript" src="scripts/jquery-3.1.1.min.js"></script> -->

<!-- end  chat widgets-->

  <!-- <script>
      window.onload=function() {
          document.getElementById("sample").style.display = 'block';
      };
  </script> -->


<!-- <script>

$("#togBtn").on('change', function() {
        if ($(this).is(':checked')) {
            $(this).attr('value', 'true');
            document.getElementById("sample").style.display = 'none';

        }

        else {
           $(this).attr('value', 'false');;
          document.getElementById("sample").style.display = 'block';
        }
    });

  </script> -->


</body>
</html>
