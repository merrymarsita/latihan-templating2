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
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('master/insertOffice/'); ?>" class='btn btn-primary' >Add New Office</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                       
                        <th scope="col">Office Code</th>
                        <th scope="col">City</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address Line 1</th>
                        <th scope="col">Address Line 2</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Postal Codee</th>
                        <th scope="col">Territory</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="show_data"> 
                     
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

      <!--MODAL HAPUS-->
      <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Office</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="productCode" id="productCode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->



<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        tampilOffices();   //pemanggilan fungsi tampil products
          
        //fungsi tampil products
        function tampilOffices(){
            $.get({
               
                url   : "<?php echo base_url('master/ajax_get_offices'); ?>",
                data :   '',
                type : "POST",
                dataType : "json",             
                success : function(data){
                  console.log(data);
                    var str_html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        str_html += '<tr>'+
                                '<td>'+data[i].officeCode+'</td>'+
                                '<td>'+data[i].city+'</td>'+
                                '<td>'+data[i].phone+'</td>'+
                                '<td>'+data[i].addressLine1+'</td>'+
                                '<td>'+data[i].addressLine2+'</td>'+
                                '<td>'+data[i].state+'</td>'+
                                '<td>'+data[i].country+'</td>'+
                                '<td>'+data[i].postalCode+'</td>'+
                                '<td>'+data[i].territory+'</td>'+
                                '<td>'+

                                    '<a href="<?= base_url('master/edit_Employees/')?>'+data[i].officeCode+'" class="badge badge-success">Edit</a>'+
                                    '<a href="<?= base_url('master/ajax_deleteEmployees/')?>'+data[i].officeCode+'" class="item_hapus badge badge-danger">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(str_html);
                }
 
            });

        var urlDelete;
        $('#show_data').on('click','.item_hapus',function(){
          
           urlDelete = $(this).attr('href');
           console.log (urlDelete);
           // var id=$(this).attr('data');
           $('#ModalHapus').modal('show');
           // $('[name="productCode"]').val(productCode);
           return false;
        });

        //Hapus 
        $('#btn_hapus').on('click',function(){
            
            $.ajax({
                    url  : urlDelete,
                    success: function(data){
                      $('#ModalHapus').modal('hide');
                      tampilEmployees();
                    }
                });
                return false;
            });
      
      }
      });
      
 
</script>