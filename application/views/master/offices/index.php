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
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('master/insertOffices/'); ?>" class='btn btn-primary' >Add New Office</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table id= "table" class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Office Code</th>
                        <th scope="col">City</th>
                        <th scope="col">Phone</th>
                        <th scope="col">AddressLine1</th>
                        <th scope="col">AddressLine2</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">Territory</th>
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
                                echo "<td>".$value['officeCode']."</td>";
                                echo "<td>".$value['city']."</td>";
                                echo "<td>".$value['phone']."</td>";
                                echo "<td>".$value['addressLine1']."</td>";
                                echo "<td>".$value['addressLine2']."</td>";
                                echo "<td>".$value['state']."</td>";
                                echo "<td>".$value['country']."</td>";
                                echo "<td>".$value['postalCode']."</td>";
                                echo "<td>".$value['territory']."</td>";
                                echo "<td><a href='".base_url('master/editOffices/').$value['officeCode']."' class='badge badge-success'>Edit</a>
                                <a href='".base_url('master/deleteOffices/').$value['officeCode']."' class='badge badge-danger' >
                                Delete</a></<a></td>";
                            echo "</tr>";
                            $no++;
                        }
                      ?>
                    </tbody>
                  </table>

                  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
                  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
                  <script type="text/javascript">
 
                  var save_method; //for save method string
                  var table;
 
                  $(document).ready(function() {
                      //datatables
                      table = $('#table').DataTable({ 
                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.
                        // Load data for the table's content from an Ajax source
                        "ajax": {
                          "url": '<?php echo site_url('master/jsonOffice'); ?>',
                          "type": "POST"
                      },
                      //Set column definition initialisation properties.
                        "columns": [
                          {"data": "officeCode",width:170},
                          {"data": "city",width:100},
                          {"data": "phone",width:100},
                          {"data": "addressLine1",width:100},
                          {"data": "addressLine2",width:100},
                          {"data": "state",width:100},
                          {"data": "country",width:100},
                          {"data": "postalCode",width:100},
                          {"data": "territory",width:100}
                        ],
 
                      });
 
                     });
                   </script>

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

     
