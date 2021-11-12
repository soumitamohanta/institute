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
  $branch = trim(mysqli_real_escape_string($conn, $branch));
  $institute = trim(mysqli_real_escape_string($conn, $institute));
  $address = trim(mysqli_real_escape_string($conn, $address));
  $contact = trim(mysqli_real_escape_string($conn, $contact));
  $instituteCode = trim(mysqli_real_escape_string($conn, $instituteCode));
  
  if(isset($branch)){
    $sql = "INSERT INTO `institutes`(`branch_id`, `institute_name`, `address`, `contact`, `institute_code`, `status`)
            VALUES('$branch', '$institute', '$address', '$contact', '$instituteCode', 'active')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $instituteId = mysqli_insert_id($conn);
      $query = "INSERT INTO `users`(`role_id`, `org_id`, `user_id`, `password`, `status`) 
                VALUES ('2', '$instituteId', '$password', '$loginId', 'active')" ;

      $_SESSION['success_msg'] = "Institute saved successfully.";
      
      mysqli_query($conn, $query);
      header('location: institute-read.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     header('location: institute-read.php');
     
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
            <h1>Institutes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Institutes</li>
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
            <h3 class="card-title">New Institute</h3>

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
                  <label>Branch</label>
                  <select class="form-control select2" style="width: 100%;" name="branch" id="branch">
                    <option value="">Select</option>
                    <?php echo getBranches(); ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Contact</label>
                  <input type="text" class="form-control" name="contact" id="contact">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Institute Name</label>
                  <input type="text" class="form-control" name="institute" id="institute">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Institute Code</label>
                  <input type="text" class="form-control" name="instituteCode" id="instituteCode">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Login Id</label>
                  <input type="text" class="form-control" name="loginId" id="loginId">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" id="address" class="form-control"></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
           
            <!-- /.row -->

            <!-- /.row -->
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
