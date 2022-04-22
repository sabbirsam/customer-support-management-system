<?php include('db_connect.php') ?>

<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM customers")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Staff</span>
                 <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM staff")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-columns"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Departments</span>
                <span class="info-box-number"><?php echo $conn->query("SELECT * FROM departments")->num_rows; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-ticket-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Tickets</span>
                <span class="info-box-number"><?php echo $conn->query("SELECT * FROM tickets")->num_rows; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <!-- extra  -->

        <div id="root">
          <div class="container pt-5">
            <div class="row align-items-stretch">
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Ticket Solved<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                    <?php 
                    
                    // echo $conn->query("SELECT SUM(status), status FROM tickets GROUP BY status DESC")->num_rows; 
                    // echo $conn->query("select status from tickets group by status having count(*) =1")->num_rows; 
                    echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=2")->num_rows; 
                    
                    ?>
                    </span>
                </div>
              </div>
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Pending<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                    <?php 
                       echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=0")->num_rows; 
                      ?>

                    </span>
                    
                    <!-- <span
                    class="hind-font caption-12 c-dashboardInfo__subInfo">Total month: 30</span> -->
                </div>
              </div>
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Ongoing<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                      <?php 
                       echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=1")->num_rows; 
                      ?>
                    </span>
                </div>
              </div>

              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Supplier<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                      <?php 
                       echo $conn->query("SELECT `id` FROM `supplier`")->num_rows; 
                      ?>
                    </span>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php endif; ?>

<?php if($_SESSION['login_type'] == 2): ?>
	    <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>

      <div id="root">
          <div class="container pt-5">
            <div class="row align-items-stretch">
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total Ticket Solved<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                    <?php 
                    
                    // echo $conn->query("SELECT SUM(status), status FROM tickets GROUP BY status DESC")->num_rows; 
                    // echo $conn->query("select status from tickets group by status having count(*) =1")->num_rows; 
                    echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=2")->num_rows; 
                    
                    ?>
                    </span>
                </div>
              </div>
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Pending<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                    <?php 
                       echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=0")->num_rows; 
                      ?>

                    </span>

                </div>
              </div>
              <div class="c-dashboardInfo col-lg-3 col-md-6">
                <div class="wrap">
                  <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Ongoing<svg
                      class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                      </path>
                    </svg></h4><span class="hind-font caption-12 c-dashboardInfo__count">
                      <?php 
                       echo $conn->query("SELECT `status` FROM `tickets` WHERE `status`=1")->num_rows; 
                      ?>
                    </span>
                </div>
              </div>
              
            </div>
          </div>
        </div>


<?php endif; ?>



        <!-- extra  -->


<?php if($_SESSION['login_type'] == 3): ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
<?php endif; ?>



<?php if($_SESSION['login_type'] == 4): ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
          <div class="card">
          	<div class="card-body">
          		<!-- New add  tickets-->
                <div class="card card-outline card-info">
                <p class="ml-2 d-list"><b> Emergency Tickets for work</b></p>
                 
                  <div class="card-body">
                    <table class="table table-hover table-bordered" id="list">
                      <colgroup>
                        <col width="5%">
                        <col width="10%">
                        <col width="15%">
                        <col width="20%">
                        <col width="15%">
                        <col width="25%">
                        <col width="10%">
                        <col width="10%">
                      </colgroup>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>SR Number</th>
                          <th>Date Created</th>
                          <th>Customer Name</th>
                          <th>Subject</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        $where = '';
                       

                        if($_SESSION['login_type'] == 4)
                        // $where .= " where t.department_id = {$_SESSION['login_department_id']} ";  // main and assign ticket department wise
                        $where .= "  where t.supplier_id= {$_SESSION['login_id']} "; // assign ticket selected  wise

                      
                          
                        $qry = $conn->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id $where order by unix_timestamp(t.date_created) desc");
                        
                        while($row= $qry->fetch_assoc()):
                          $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                          unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                          $desc = strtr(html_entity_decode($row['description']),$trans);
                          $desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
                        ?>
                        <tr>
                          <th class="text-center"><?php echo $i++ ?></th>
                          <th class="text-center"><?php echo "WDTN00".$row['id']?></th>
                          <td><b><?php echo date("M d, Y",strtotime($row['date_created'])) ?></b></td>
                          <td><b><?php echo ucwords($row['cname']) ?></b></td>
                          <td><b><?php echo $row['subject'] ?></b></td>
                          <td><b class="truncate"><?php echo strip_tags($desc) ?></b></td>
                          <td>
                            <?php if($row['status'] == 0): ?>
                              <span class="badge badge-primary">Pending/Open</span>
                            <?php elseif($row['status'] == 1): ?>
                              <span class="badge badge-Info">Processing</span>
                            <?php elseif($row['status'] == 2): ?>
                              <span class="badge badge-success">Done</span>
                            <?php else: ?>
                              <span class="badge badge-secondary">Closed</span>
                            <?php endif; ?>
                          </td>
                          <td class="text-center">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              Action
                            </button>
                            <div class="dropdown-menu" style="">
                              <a class="dropdown-item view_ticket" href="./index.php?page=view_ticket&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">View Ticket</a>
                              <!-- <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="./index.php?page=edit_ticket&id=<?php echo $row['id'] ?>">Edit</a> -->
                              <!-- <div class="dropdown-divider"></div>
                              <a class="dropdown-item delete_ticket" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a> -->
                            </div>
                          </td>
                        </tr>	
                      <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          
          		<!-- New add  -->
          	</div>
          </div>
      </div>
<?php endif; ?>
<!-- new ticket End -->

<div class="col-12">
          <div class="card">
          		<!-- chat system  -->
                    <div id="chat-circle" class="btn btn-raised">
                            <div id="chat-overlay"></div>
                            <!-- <i class="material-icons">speaker_phone</i> -->
                            <i class="material-icons">▶</i>
                            
                      </div>
                      <!-- jump chat ball  -->
                      
                      <div class="chat-box" id="sample">
                            <span class="heading"></span><span style="float:right"> 

                                <a href="ajax.php?action=logout"><img src="images/logout.png" height="50" width="100"  /></a>
                            </span>

                            <div class="chat-box-header">
                            <span class="chat-box-toggle"><i class="material-icons">close</i></span>
                            </div>

                            
                            <!-- <form method="post" action="" id="myForm"><form method="post" action="" id="myForm"> -->
                                <div class="chat-box-body" id="vegan">
                                <div class="chat-box-overlay">   
                                </div>
                                <div class="chat-logs">
                                
                                </div><!--chat-log -->
                                </div>
                            <form method="post" action="" id="myForm"><form method="post" action="" id="myForm">
                                <div class="chat-input">      
                                
                                    <!-- <input type="text" id="chat-input" placeholder="Send a message..."/> -->
                                    <input name="msg" id="msg" class="fields" type="text" placeholder="Enter Your Message" required="required" style="height:50px;" size="60" />
                                    <input type="submit" value="▶" class="commandButton chat-submit" style="height:54px;" />
                            </form>      
                        </div>
                      </div>
                      
                    </div>
          <!-- end ------------------------------------------------------------ -->
          </div>
      </div>

  <script>
      window.onload=function() {
          document.getElementById("sample").style.display = 'block';
      };
  </script>