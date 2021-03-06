<?php
include 'session.php';
include 'crud.php';
$oop = new CRUD();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Golden Pharmaceutical</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- DataTables Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fixedColumns.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/buttons.dataTables.min.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style_css.css">
 </head>
<body>
<div id="wrapper">
    <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <img src="../img/logo.png" alt="Company Logo" style="height:55px;width: 55px;">   
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">       
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="not"><i class="fa fa-bell fa-lg"></i><span class="label label-warning badge" id="notify">
                    <?php
                        echo $counting0;
                    ?>
                    </span>
                </a> 
               <ul class="dropdown-menu scrollables-menu" >
                   <li>
                   <?php 
                        while ($row = mysqli_fetch_array($mysql,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Expiring Product</li>";
                            echo "<li><a href='viewProduct'>".$row['name'].' ('.$row['lot_no'].') '.$row['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql2,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Out of Stocks</li>";
                            echo "<li><a href='viewProduct'>".$rows['name'].' ('.$rows['lot_no'].') '.$rows['packing']."</a></li>";
                        }
                        while ($rows = mysqli_fetch_array($mysql3,MYSQLI_ASSOC)) {
                            echo "<li class='dropdown-header'>Overdue</li>";
                            echo "<li><a href='viewInvoice'>Sales No. ".sprintf('%04d',$rows['sales_no'])."</a></li>";
                        }
                   ?>
                   </li>
                   <li class='divider'></li>
               </ul>
            </li>        
            <li>
                    <a href="index"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="viewCR"><i class="fa fa-fw fa-inbox"></i> Collections Receipt</a>
                </li>
                <li>
                    <a href="viewCM"><i class="fa fa-fw  fa-credit-card"></i> Credit/Debit Memo </a>
                </li>
                <li>
                    <a href="viewPO"><i class="fa fa-fw  fa-shopping-cart"></i> Purchase Orders</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-9"><i class="fa fa-fw  fa-ruble"></i> Expenses<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-9" class="collapse">
                        <li><a href="viewExCat"><i class="fa fa-align-left">&nbsp;</i>Expenses Category</a></li>
                        <li><a href="viewExList"><i class="fa fa-align-right">&nbsp;</i>Expeses List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewInvoice"><i class="fa fa-fw fa-tags"></i> Sales</i></a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="viewProduct"><i class="fa fa-list">&nbsp;</i>View</a></li>
                        <li><a href="viewInvOut"><i class="fa fa-minus">&nbsp;</i>Inventory Out</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="viewCustomers"><i class="fa fa-users">&nbsp;</i>View</a></li>
                        <li><a href="viewCustPro"><i class="fa fa-user-circle">&nbsp;</i>Customers Profile</a></li>
                    </ul>
                </li>
                <li>
                    <a href="viewSup"><i class="fa fa-fw fa-truck"></i> Suppliers</a>
                </li>
                <?php 
                if ($user_type=='admin') {
                ?>
                <li>
                    <a href="viewEmployee"><i class="fa fa-fw fa-id-card"></i> Employee</a>
                </li>
                <li>
                    <a href="viewUser" ><i class="fa fa-fw fa-user">&nbsp;</i> Users</a>
                </li>
                <li>
                    <a href="settings"><i class="fa fa-fw fa-cogs">&nbsp;</i>Settings</a>
                </li>
                <?php 
                }
                 ?>
                <li>
                    <hr>
                    <center>
                        <div class="container-fluid" style="color: #fff;">
                            <p><b style="font-size:16px;">Golden Pharmaceutical</b><br>
                            <i style="font-size: 10px;">Bolonsiri Road, Camaman-an,</i><br><i style="font-size: 9px"> Cagayan De Oro City</i><br><i style="font-size: 8px;">Telefax (088) 857-3088</i></p> 
                             <p>All Rights Reserved 2017.</p>   
                        </div>
                    </center>                    
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
              <ol class="breadcrumb">
              <li><a href="index.php">Dashboard</a></li>
              <li class="active">View Customers</li>
              </ol>
              <hr>
          </div>
        </div>
<?php
if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');          
            //skip first line
            fgetcsv($csvFile);
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                $sql = mysqli_query($db,"SELECT * FROM tbl_customers WHERE tin = '".$line[1]."'");
                $result = mysqli_fetch_assoc($sql);
                if($result > 0){
                    //update member data
                    $query1 = mysqli_query($db,"UPDATE tbl_customers SET full_name = '".$line[0]."',  terms = '".$line[2]."', opidno = '".$line[3]."', bstyle = '".$line[4]."', address = '".$line[5]."' WHERE tin = '".$line[1]."'");
                }else{
                    //insert member data into database
                    $query2 = mysqli_query($db,"INSERT INTO tbl_customers (full_name, tin, terms, opidno, bstyle, address) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."')");
                }
            }
            
            //close opened csv file
            fclose($csvFile);
            $qstring = '?status=succ';                                
            ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Imported!</strong>
                      </div>
            <?php
        }else{
            $qstring = '?status=err';
            ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Failed to Import CSV File!</strong>Try Again.
                      </div>
            <?php            
        }
    }else{
        $qstring = '?status=invalid_file';              
            ?>
                      <div class="alert alert-danger alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Invalid CSV File!</strong>
                      </div>
            <?php        
    }
}
?>        
        <div class="row">
            <div class="col-sm-2">
                <button type="button" id="import" class="btn btn-default form-control"><b class="fa fa-upload">&nbsp;</b>Import CSV</button>
            </div>
            <div class="col-sm-8"></div>
            <div class="col-sm-2"><button class="btn btn-primary form-control" data-toggle="modal" data-target="#addcust"><i class="fa fa-user-plus">&nbsp;</i>Add Customer</button></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div id="showimport" style="display: none;">
                   <form action="" method="post" enctype="multipart/form-data" id="importFrm">
                       <input type="file" name="file" class="form-control" required="">
                       <input type="submit" class="btn btn-primary form-control" name="importSubmit" value="IMPORT">
                   </form>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
           <?php
            if (isset($_POST['update'])){
                $id = mysqli_real_escape_string($db,$_POST['id']);
                $fn = mysqli_real_escape_string($db,$_POST['name']);
                $tin = mysqli_real_escape_string($db,$_POST['tin']);
                $add = mysqli_real_escape_string($db,$_POST['add']);
                $bstyle = mysqli_real_escape_string($db,$_POST['bstyle']);
                $terms = mysqli_real_escape_string($db,$_POST['terms']);
                $opidno = mysqli_real_escape_string($db,$_POST['opidno']);
                $d1 = mysqli_real_escape_string($db,$_POST['dis1']);
                $d2 = mysqli_real_escape_string($db,$_POST['dis2']);
                $sql=$oop->updateCust($id,$fn,$add,$tin,$bstyle,$terms,$opidno,$d1,$d2);
                if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Update!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Updated!</strong>
                      </div>
                  <?php
                }
            }elseif (isset($_POST['delete'])) {
                $id = mysqli_real_escape_string($db,$_POST['delid']);
                $sql = $oop->deleteCust($id);
                if(!$sql){
                   ?>
                      <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-times fa-bg">&nbsp;</b>Failed to Delete Customer!</strong> Try Again.
                      </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><b class="fa fa-check fa-bg">&nbsp;</b>Successfully Deleted!</strong>
                      </div>
                  <?php
                }
            }elseif (isset($_POST['addCust'])) {
                $fn = mysqli_real_escape_string($db,$_POST['name']);
                $tin = mysqli_real_escape_string($db,$_POST['tin']);
                $add = mysqli_real_escape_string($db,$_POST['add']);
                $bstyle = mysqli_real_escape_string($db,$_POST['bstyle']);
                $terms = mysqli_real_escape_string($db,$_POST['terms']);
                $opidno = mysqli_real_escape_string($db,$_POST['opidno']);
                $d1 = mysqli_real_escape_string($db,$_POST['dis1']);
                $d2 = mysqli_real_escape_string($db,$_POST['dis2']);
                $sql=$oop->insertCust($fn,$add,$tin,$bstyle,$terms,$opidno,$d1,$d2);
                if(!$sql){
                   ?>
                        <div class="alert alert-warning alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Already Registered!</strong>Try Again.
                        </div>
                  <?php
                }else{
                    ?>
                      <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Successfully Registered!</strong>
                      </div>
                  <?php
                }
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" width="100%" id="datatables">
                    <thead>
                        <tr>
                            <th>IDs</th>
                            <th>Customer's Name</th>
                            <th>Address</th>
                            <th>TIN/SC-TIN</th>
                            <th>Business Style</th>
                            <th>OSCA/PWD ID No.</th>
                            <th>Terms</th>
                            <th>Discount 1</th>
                            <th>Discount 2</th>
                            <th>Date Added</th>                       
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                        $i = 1;
                      $result = mysqli_query($db, "SELECT * FROM tbl_customers") or die(mysql_error());
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['address']; ?></td>            
                            <td><?php echo $row['tin']; ?></td> 
                            <td><?php echo $row['bstyle']; ?></td> 
                            <td><?php echo $row['opidno']; ?></td> 
                            <td><?php echo $row['terms']; ?></td> 
                            <td><?php echo $row['discount1']; ?></td> 
                            <td><?php echo $row['discount2']; ?></td> 
                            <td><?php echo $row['timestamp']; ?></td>    
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edit btn btn-warning btn-xs"  data-title="Edit" data-id="<?php echo $row['cus_id']; ?>"  data-fn="<?php echo $row['full_name']; ?>" data-ad="<?php echo $row['address']; ?>" data-tin="<?php echo $row['tin']; ?>" data-bstyle="<?php echo $row['bstyle']; ?>" data-opidno="<?php echo $row['opidno']; ?>" data-terms="<?php echo $row['terms']; ?>" data-dis1="<?php echo $row['discount1']; ?>" data-dis2="<?php echo $row['discount2']; ?>" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                              <?php 
                              if ($user_type=='admin') {
                              ?>
                                <b data-placement="top" title="Delete"><button class="btn-delete btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['cus_id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
                              <?php 
                              }
                              ?>
                            </td> 
                          </tr>
                      <?php } ?>
                    </tbody>
                </table>            
                </div>
          </div>
        </div>
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Customer Details</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
                <input type="hidden" name="id" id="cust_id">
                <input type="text" id="cust" name="name" placeholder="Customers Name" class="form-control" required="">
                <input type="number" id="tin" name="tin" placeholder="TIN/SC-TIN" class="form-control">
                <input type="text" id="add" name="add" placeholder="Address" class="form-control">
                <input type="text" id="bstyle" name="bstyle" placeholder="Business Style" class="form-control">
                <input type="text" id="terms" name="terms" placeholder="Terms" class="form-control">
                <input type="text" id="opidno" name="opidno" placeholder="OSCA/PWD ID No." class="form-control">
                <input type="number" step="any" name="dis1" id="edit_dis1" class="form-control" placeholder="Discount 1">
                <input type="number" step="any" name="dis2" id="edit_dis2" class="form-control" placeholder="Discount 2">
                
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit" name="update"><b class="fa fa-pencil-square-o fa-bg">&nbsp;</b>Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>

  </div>
</div>
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Customer</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
                <input type="hidden" name="delid" id="delid">
                <b><strong>Are you sure do you want to delete this customer?</strong></b>       
      </div>
      <div class="modal-footer">
            <button class="btn btn-danger" type="submit" name="delete"><b class="fa fa-trash fa-bg">&nbsp;</b>Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div id="addcust" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Customer</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
            <input type="text" name="name" placeholder="Customers Name" class="form-control" required="">
            <input type="number" name="tin" placeholder="TIN/SC-TIN" class="form-control">
            <input type="text" name="add" placeholder="Address" class="form-control" required="">
            <input type="text" name="bstyle" placeholder="Business Style" class="form-control">
            <input type="text" name="terms" placeholder="Terms" class="form-control" required="">
            <input type="text" name="opidno" placeholder="OSCA/PWD ID No." class="form-control">
            <input type="number" step="any" name="dis1" placeholder="Discount 1 (%)" class="form-control" value="">
            <input type="number" step="any" name="dis2" placeholder="Discount 2 (%)" class="form-control" value="">
      </div>
      <div class="modal-footer">
            <button class="btn btn-primary" type="submit" name="addCust">Add</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>
            <!-- /.row -->
        <!-- /.container-fluid -->
     </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="../js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/buttons.flash.min.js"></script>
<script type="text/javascript" src="../js/jszip.min.js"></script>
<script type="text/javascript" src="../js/pdfmake.min.js"></script>
<script type="text/javascript" src="../js/vfs_fonts.js"></script>
<script type="text/javascript" src="../js/buttons.html5.min.js"></script>
<script type="text/javascript" src="../js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datatables').dataTable({
        "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        fixedColumns:{
            leftColumns: 2
        },
        "oLanguage": {
          "sSearch": "<b class='fa fa-search fa-lg'>&nbsp;</b>",
          "sLengthMenu": "<b id='data-menu'><b class='fa fa-eye fa-lg'>&nbsp;</b>Show _MENU_ records</b>&nbsp;"
        },
        "pagingType": "full_numbers",
        dom: 'lBfrtip',
        buttons: [
            {
              "extend":'copy', "text":'<span class="fa fa-copy fa-lg">&nbsp;</span>Copy',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'excel', "text":'<span class="fa fa-file-excel-o fa-lg">&nbsp;</span>Excel',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'pdf', "text":'<span class="fa fa-file-pdf-o fa-lg">&nbsp;</span>PDF',"className": 'btn btn-primary btn-xs' 
            },{
              "extend":'print', "text":'<span class="fa fa-print fa-lg">&nbsp;</span>Print',"className": 'btn btn-primary btn-xs' 
            }
        ]
    });
    $(".btn-edit").click(function(){
        var id = $(this).data("id");
        var fn = $(this).data("fn");
        var terms = $(this).data("terms");
        var bstyle = $(this).data("bstyle");
        var opidno = $(this).data("opidno");
        var tin = $(this).data("tin");
        var ad = $(this).data("ad");
        var d1 = $(this).data("dis1");
        var d2 = $(this).data("dis2");
        $("#cust_id").val(id);    
        $("#cust").val(fn);    
        $("#tin").val(tin);
        $("#terms").val(terms);
        $("#opidno").val(opidno);
        $("#bstyle").val(bstyle);
        $("#add").val(ad);
        $("#edit_dis1").val(d1);
        $("#edit_dis2").val(d2);
    });
    $(".btn-delete").click(function(){
        var did = $(this).data("did");
        $("#delid").val(did);
    });
    $("#import").click(function(event) {
        $("#showimport").slideToggle('100');
    });
        $("#not").click(function(event) {
        $("#notify").hide();
    });
    function check() {
        var val = $("#notify").text();
        if (val==0) {
            $("#notify").hide();
        }
    }
    check();
});
</script>
</body>
</html>