<?php
date_default_timezone_set('Asia/Kolkata');
require_once('connection/connection.php');
$stmt=$mainconn->prepare("SELECT vch_no,date_format(date,'%d/%m/%Y') as date,party_name,naration,amount from tbl_receipt");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Multiple data Add/Edit/Delete and Listing</title>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             
            </div>
            <div class="clearfix"></div>
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  <ul class="nav side-menu">
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
         
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="col-md-3">
                <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
              </div>
              <div class="col-md-6">
              </div>
              <div class="col-md-3" style="padding: 0;">
                <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                 
                    <li><a href="javascript:void();"><i class="fa fa-user" aria-hidden="true"></i> </a></li>
                    <li style="border-top: 1px solid #fff;"><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
     <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12" style="color: #2b3f54; padding: 5px; margin-bottom: 50px; border: 1px solid #c3c3c3; background: #e4e4e4;">
              <div class="col-md-8">
                 <h2 style="font-weight: 600;">Receipt</h2>
               </div>
               <div class="col-md-2">
                 <a href="frmreceipt.php" class="btn btn-primary btn-block" style="border-radius: 0;">Add</a>
               </div>
              
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive" style="overflow: hidden;">
                <table id="myTable-item" class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th style="font-size:10px;" class="col-md-1">Vch No.</th>
           <th style="font-size:10px;" class="col-md-2">Date</th>
                    <th style="font-size:10px;" class="col-md-4">Name</th>
                    <th style="font-size:10px;" class="col-md-3">Remark</th>
            <th style="font-size:10px;" class="col-sm-2">Amount</th>
                    <th>
                        <center>Edit</center>
                    </th>
                    <th>
                        <center>Remove</center>
                    </th>
      
          
                </tr>
            </thead>
            <tbody>
               <?php 
          
          foreach($result as $it) { ?>
                    <tr align="center">
                        <td style="font-size:12px;"  align="left"><?php echo $it['vch_no']; ?></td>
            <td style="font-size:12px;"  align="left"><?php echo  $it['date']; ?></td>
                        <td style="font-size:12px;" align="left"  ><?php echo ucwords($it['party_name']); ?></td>
              <td style="font-size:12px;" align="left"><?php echo $it['naration']; ?></td>
                        <td style="font-size:12px;" align="right"  ><?php echo number_format($it['amount'],2); ?></td>
                        <td>
                          <a href="frmreceiptedit.php?id=<?php echo $it['vch_no'] ?>" type="button" class="btn btn-success btn-sm btn-block"> Edit <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> </a>
                        </td>
                        <td>
                          <a href="recdelete.php?id=<?php echo $it['vch_no'] ?>"  onclick="return confirm('Are you sure you want to delete?')" type="button" class="btn btn-danger btn-sm btn-block"> Delete <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                        </td>
            
                    </tr>
                <?php }
  ?>
        
            </tbody>
        </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.content -->
      </div>
        <footer style="background: #172d44;">
          <p class="pull-right">
            EBS Accounts Portal <a href="https://ebssoftware.co.in">ebssoftware.co.in</a>
          </p>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->

    <!-- bootstrap-daterangepicker -->
    <script src="build/js/custom.min.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#myTable-item').DataTable();
    });
</script>
	
  </body>
</html>
