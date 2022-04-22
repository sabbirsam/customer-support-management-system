<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  ob_start();
  $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Home";
  ?>
  <title><?php echo $title ?> | Customer Support System</title>
  <?php ob_end_flush() ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/dist/css/styles.css">
	<script src="assets/plugins/jquery/jquery.min.js"></script>
 <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
<!-- login style  -->
 <link rel="stylesheet" href="./scripts/login.css">
<!-- login style  -->

  <!-- chat  -->

  <link href="scripts/chat.css" rel="stylesheet" type="text/css" />
  <!-- <link href="scripts/bootstrap-material-design.css" rel="stylesheet" type="text/css" /> -->

  <!-- chart js  -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- chart js  -->

  <script type="text/javascript" src="scripts/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="scripts/chat.js"></script>
  <script type="text/javascript" src="scripts/login.js"></script>
  <script type="text/javascript" src="scripts/bootstrap.min.js"></script>

  <script>
  function ajaxCall() {
      $.ajax({
          url: "boxScript.php", 
          success: (function (result) {

        // console.log(result);

              $("#vegan").html(result);
          })
      })
  };
  ajaxCall(); // To output when the page loads
  setInterval(ajaxCall, (1 * 1000)); // x * 1000 to get it in seconds

  </script>



</head>