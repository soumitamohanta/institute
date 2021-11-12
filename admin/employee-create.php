<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
include "functions.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  
  $employeeName = trim(mysqli_real_escape_string($conn, $employeeName));
  $contact = trim(mysqli_real_escape_string($conn, $contact));
  
  
  if(isset($employeeName)){
    $sql = "INSERT INTO `employees`(`employee_name`,`contact`, `status`)
            VALUES('$employeeName', '$contact','active')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      
      $_SESSION['success_msg'] = "Employee saved successfully.";
     
      header('location: employee-read.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
  }
  

}

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">New Employee</h3>

            <div class="card-tools">
             <!--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="employeeName" id="employeeName">
                   
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Contact</label>
                  <input type="text" class="form-control" name="contact" id="contact">
              </div>
                
              </div>
              <!-- /.col -->
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
          </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php include "include/footer.php"; ?>
