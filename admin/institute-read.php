<?php include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php 

function getBranches(){
  include "include/dbconfig.php"; 
  $sql = "SELECT `institutes`.*, `branches`.id AS `branch_id`,`users`.`user_id`, `branches`.name  FROM `institutes`
          INNER JOIN `branches` ON `institutes`.`branch_id` = `branches`.id
          INNER JOIN `users` ON `users`.`org_id` = `institutes`.id";
  $res = mysqli_query($conn, $sql);
  
  while($row = mysqli_fetch_assoc($res))
  {
    extract($row);
    echo '<tr>
              <td>'.$id.'</td>
              <td>'.$name.'</td>
              <td width="45%">'.$institute_name.'</td>
              <td>'.$contact.'</td>
              <td>'.$address.'</td>
              <td>'.$user_id.'</td>
              <td><span class="tag tag-success">'.$status.'</span></td>
              <td>
                <a href="institute-edit.php?id='.$id.'"&action=edit>
                  <button type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
                </a>
                <a href="institute-edit?id='.$id.'"&action=delete>
                  <button type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
                </a>
              </td>
             
         </tr>';
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
            <?php if(isset($_SESSION['success_msg'])){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']);?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Branches</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                  <a href="institute-create.php"><button class="btn btn-sm btn-primary">Add New</button></a>
                    &nbsp;
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-sm text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Branch</th>
                      <th>Institute Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Login Id</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php getBranches(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php include "include/footer.php"; ?>
