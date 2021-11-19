<?php
date_default_timezone_set('Asia/Kolkata');
require_once('include/session.php');
require_once('connection/connection.php');
$cdate=date('Y-m-d');

$stmt=$mainconn->prepare("SELECT max(vch_no) as vchno FROM tbl_receipt");
$stmt->execute();
$maxrow=$stmt->fetch(PDO::FETCH_ASSOC);
$maxID=$maxrow['vchno'];
$maxID++;
$payno=$maxID;

 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    
  </head>
  <body class="nav-sm">
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
                  <a href="javascript:void();" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li style="border-top: 1px solid #fff;"><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
              </div>
            </nav>
          </div>
        </div>
     <form name="receipt" method="post" action="recsave.php">
        <div class="right_col" role="main">
          <div class="row">
            <div class="dashboard_graph" style="color: #2b3f54; padding: 0; margin-bottom: 30px; border: 1px solid #c3c3c3; background: #e4e4e4;">
              <div class="panel-heading clearfix">
                <h2 class="panel-title pull-left" style="padding-top: 7.5px; font-weight: 600;">Receipt Entry</h2>
                <div class="btn-group pull-right">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save</button>
                             <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back </a>

                </div>
              </div>
           
          </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">
                  <div class="table-responsive">
                    <table id="myTable-item" class="table table-bordered table-hover table-striped">
                      <tr>
                        <td style="font-size:12px; font-weight:bold;" class="col-sm-2">Receipt No.</td>
                        <td style="font-size:10px;" class="col-sm-3"><input name="payno" id="payno" required  type="text" tabindex="1" class="form-control" value="<?php echo $payno;?>"  style=" height:30px;  color:#2A0000; font-size:11px;"></td>
                        <td style="font-size:12px; font-weight:bold;" class="col-sm-2">Date</td>
                        <td style="font-size:10px;" class="col-sm-3"><input name="paydate" id="paydate" value="<?php echo $cdate;?>" required  type="date" tabindex="1" class="form-control" ></td>
                      </tr>
                    </table>
                    <table class="table table-bordered table-hover" id="invoiceTable">
                      <thead>
                        <tr>
                          <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                          <th style = "font-size:12px;" width="10%">Code</th>
                          <th style = "font-size:12px;" width="30%">Account Name <i class="fa fa-plus btn btn-primary btn-sm pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"></i></th>
                          <th style = "font-size:12px;" width="40%">Naration</th>
                          <th style = "font-size:12px;" width="10%">Amount</th>
                        </tr>
                      </thead>
                      <tr>
                        <td><input class="case" type="checkbox"></td>

              <td style="font-size:11px;"><input type="text" autofocus data-type="code" name="data[0][code_id]" id="codeno_1" class="form-control autocomplete" autocomplete="off"></td>
                        
              <td><input type="text" autofocus data-type="pname" name="data[0][pname]" id="pname_1" class="form-control autocomplete" autocomplete="off"></td>

                         <td style="font-size:11px;"><input type="text" autofocus data-type="remark" name="data[0][remark]" id="remark_1" class="form-control autocomplete" autocomplete="off"></td>

                        <td><input type="float" style="text-align:right;" autofocus data-type="total" name="data[0][total]" id="total_1" class="form-control total amount_entered" value="0.00" ondrop="return false;" onpase="return false" autocomplete="off"></td>
                      </tr>
                    </table>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <button id="addmore" class="btn btn-primary addmore" type="button">Add</button>
                      <button id="delete" class="btn btn-danger delete" type="button">Delete</button>
                   
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
</div>
<footer>
  
  <div class="clearfix"></div>
</footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
function userdecimal() {
  var soles1 = document.getElementById('salerate').value;
    var total1 = Math.floor(parseFloat(soles1)* 100) / 100;
  document.getElementById("salerate").value =total1.toFixed(2);

  var soles1 = document.getElementById('discorate').value;
    var total1 = Math.floor(parseFloat(soles1)* 100) / 100;
  document.getElementById("discorate").value =total1.toFixed(2);

  var soles1 = document.getElementById('roomrate').value;
    var total1 = Math.floor(parseFloat(soles1)* 100) / 100;
  document.getElementById("roomrate").value =total1.toFixed(2);

  var soles1 = document.getElementById('gardenrate').value;
    var total1 = Math.floor(parseFloat(soles1)* 100) / 100;
  document.getElementById("gardenrate").value =total1.toFixed(2);
}
</script>



     <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->

    <!-- bootstrap-daterangepicker -->
    <script src="build/js/custom.min.js"></script>
     <script src="entry.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  </body>
</html>
