<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
  } else{

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> R & R Auto Care</title>
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="../assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

          <?php include_once('includes/sidebar.php');?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                 <?php include_once('includes/header.php');?>

                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Enquiry History</h4>
                                    <p class="text-muted m-b-30 font-14">
                                       
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
         
<table class="table table-bordered mg-b-0">
              <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Enquiry Number</th>
                                   <th>Enquiry Date</th>
                   <th>Action</th>
                </tr>
              </thead>
              <?php
              $enid=$_SESSION['sid'];
              $rno=mt_rand(10000,99999);
$ret=mysqli_query($con,"select * from  tblenquiry where UserId=$enid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <tbody>
                <tr>
                  <td><?php echo $cnt;?></td>
                <td><?php  echo $row['EnquiryNumber'];?></td>
                <td><?php  echo $row['EnquiryDate'];?></td>
<td><a href="enquiry-view.php?ticid=<?php echo base64_encode($row['ID'].$rno);?>">View Detail</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
               
              </tbody>
            </table>

</div>

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                    </div> <!-- container -->

                </div> <!-- content -->

             <?php include_once('includes/footer.php');?>
            </div>

        </div>
        <!-- END wrapper -->

</div>
</div>

        <!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>
<?php }  ?>