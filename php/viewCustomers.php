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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
<style type="text/css" media="screen">
.modal-header{
  background-color: #4dffb8;
  color: #fff;
}
.modal-footer{
    background-color: #333333;
}    
</style>
 </head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-brand">
            <b style="background-color: transparent;font-family: 'Impact', Georgia, sans-serif;"><b class="fa fa-address-book-o fa-bg" style="font-size: 50px;"></b>|<i>SIMS</i></b>
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
            <li>
                    <a href="index.php"><i class="fa fa-fw fa-tachometer">&nbsp;</i>Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="fa fa-fw fa-user-md"></b><?php echo $name;?><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="collections.php"><i class="fa fa-fw fa-inbox">&nbsp;</i> Collections</a>
                </li>
                <li>
                    <a href="viewPayments.php"><i class="fa fa-fw fa-credit-card fa-bg">&nbsp;</i>Payment Reports</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-tags"></i> Sales <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="addInvoice.php"><i class="fa fa-plus">&nbsp;</i>Add Invoice</a></li>
                        <li><a href="viewInvoice.php"><i class="fa fa-list">&nbsp;</i>Sales Report</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-archive">&nbsp;</i>Inventory<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="addProduct.php"><i class="fa fa-plus">&nbsp;</i>Add Products</a></li>
                        <li><a href="viewProduct.php"><i class="fa fa-list">&nbsp;</i>List Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-o"></i> Customers <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="addCustomer.php"><i class="fa fa-user-plus">&nbsp;</i>Add Customer</a></li>
                        <li><a href="viewCustomers.php"><i class="fa fa-users">&nbsp;</i>View Customers</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-id-card"></i> Employee <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="addEmployee.php"><i class="fa fa-user-plus">&nbsp;</i>Add Employees</a></li>
                        <li><a href="viewEmployee.php"><i class="fa fa-users">&nbsp;</i>View Employees</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5"><i class="fa fa-fw fa-user"></i> Users <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="addUser.php"><i class="fa fa-user-plus">&nbsp;</i>Add Users</a></li>
                        <li><a href="viewUser.php"><i class="fa fa-users">&nbsp;</i>View Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="settings.php"><i class="fa fa-fw fa-cogs">&nbsp;</i> Settings</a>
                </li>
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
                $sql=$oop->updateCust($id,$fn,$add,$tin,$bstyle,$terms,$opidno);
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
            }
            ?>
            <?php
            if (isset($_POST['delete'])) {
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
            }
            ?>
            <div class="table-responsive">
                <table class="table table-hover" id="datatables">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Customer's Name</th>
                            <th>Address</th>
                            <th>TIN/SC-TIN</th>
                            <th>Business Style</th>
                            <th>OSCA/PWD ID No.</th>
                            <th>Terms</th>
                            <th>Date Added</th>                       
                            <th>Edit</th> 
                            <th>Delete</th> 
                        </tr>
                    </thead>
                    <?php
                      $result = mysqli_query($db, "SELECT * FROM tbl_customers") or die(mysql_error());
                    ?>
                    <tbody>
                      <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
                          <tr>
                            <td><?php echo $row['cus_id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['address']; ?></td>            
                            <td><?php echo $row['tin']; ?></td> 
                            <td><?php echo $row['bstyle']; ?></td> 
                            <td><?php echo $row['opidno']; ?></td> 
                            <td><?php echo $row['terms']; ?></td> 
                            <td><?php echo $row['timestamp']; ?></td>    
                            <td>
                               <b data-placement="top"  title="Edit"><button class="btn-edit btn btn-warning btn-xs"  data-title="Edit" data-id="<?php echo $row['cus_id']; ?>"  data-fn="<?php echo $row['full_name']; ?>" data-ad="<?php echo $row['address']; ?>" data-tin="<?php echo $row['tin']; ?>" data-bstyle="<?php echo $row['bstyle']; ?>" data-opidno="<?php echo $row['opidno']; ?>" data-terms="<?php echo $row['terms']; ?>" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></b> 
                            </td>      
                            <td>
                                <b data-placement="top" title="Delete"><button class="btn-delete btn btn-danger btn-xs"  data-title="delete" data-did="<?php echo $row['cus_id']; ?>" data-toggle="modal"  data-target="#delete" ><span class=" glyphicon glyphicon-trash"></span></button></b>   
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
      <div class="modal-body">
        <form method="POST" action="">
                <input type="hidden" name="delid" id="delid">
                <b><strong>Are you sure do you want to delete this customer?</strong></b>
            
      </div>
      <div class="modal-footer">
            <button class="btn btn-danger" type="submit" name="delete"><b class="fa fa-trash fa-bg">&nbsp;</b>Delete</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </form>
      </div>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#datatables').dataTable({
        "pageLength": -1,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
    $(".btn-edit").click(function(){
        var id = $(this).data("id");
        var fn = $(this).data("fn");
        var terms = $(this).data("terms");
        var bstyle = $(this).data("bstyle");
        var opidno = $(this).data("opidno");
        var tin = $(this).data("tin");
        var ad = $(this).data("ad");
        $("#cust_id").val(id);    
        $("#cust").val(fn);    
        $("#tin").val(tin);
        $("#terms").val(terms);
        $("#opidno").val(opidno);
        $("#bstyle").val(bstyle);
        $("#add").val(ad);
    });
    $(".btn-delete").click(function(){
        var did = $(this).data("did");
        $("#delid").val(did);
    });
});
</script>
</body>
</html>