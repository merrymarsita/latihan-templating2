
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php 
          if($sub_menu):
            echo $sub_menu; 
          else:
            echo $title;
          endif;
          ?>
          </h1>
         
          <div class="row">
            <div class='col-lg-12'>
            <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('master/insertEmployees/'); ?>" class='btn btn-primary' >Add New Employee</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table id="table_id" class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ENumber</th>
                        <th scope="col">FirstName</th>
                        <th scope="col">LastName</th>
                        <th scope="col">Extention</th>
                        <th scope="col">Email</th>
                        <th scope="col">OfficeCode</th>
                        <th scope="col">Report To</th>
                        <th scope="col">JobTitle</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no=1;
                        foreach ($data_dari_database as  $value) {
                            # code...
                            echo "<tr>";
                                echo "<td>".$no."</td>";
                                echo "<td>".$value['employeeNumber']."</td>";
                                echo "<td>".$value['firstName']."</td>";
                                echo "<td>".$value['lastName']."</td>";
                                echo "<td>".$value['extension']."</td>";
                                echo "<td>".$value['email']."</td>";
                                echo "<td>".$value['officeCode']."</td>";
                                echo "<td>".$value['reportsTo']."</td>";
                                echo "<td>".$value['jobTitle']."</td>";
                                echo "<td><a href='".base_url('master/editEmployees/').$value['employeeNumber']."' class='badge badge-success'>Edit</a>
                                <a href='".base_url('master/deleteEmployees/').$value['employeeNumber']."' class='badge badge-danger' >
                                Delete</a></<a></td>";
                            echo "</tr>";
                            $no++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('menu/addMenuHeader'); ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Header Menu">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="urutan" name="urutan" placeholder="Urutan Header Menu">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

     
