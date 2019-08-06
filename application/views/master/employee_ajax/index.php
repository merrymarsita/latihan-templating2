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
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('master/insertEmployee/'); ?>" class='btn btn-primary' >Add New Employee</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                       
                        <th scope="col">Employee Number</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Extension</th>
                        <th scope="col">Email</th>
                        <th scope="col">Office Code</th>
                        <th scope="col">Reports To</th>
                        <th scope="col">Job Title</th>
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
                        <h4 class="modal-title" id="myModalLabel">Hapus Product</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="employeeNumber" id="employeeNumber" value="">
                            <div class="alert alert-warning"><p>Are you sure delete thid employee?</p></div>
                                         
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
        tampilEmployees();   //pemanggilan fungsi tampil products
          
        //fungsi tampil products
        function tampilEmployees(){
            $.get({
               
                url   : "<?php echo base_url('master/ajax_get_employees'); ?>",
                data :   '',
                type : "POST",
                dataType : "json",             
                success : function(data){
                  console.log(data);
                    var str_html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        str_html += '<tr>'+
                                '<td>'+data[i].employeeNumber+'</td>'+
                                '<td>'+data[i].lastName+'</td>'+
                                '<td>'+data[i].firstName+'</td>'+
                                '<td>'+data[i].extension+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].officeCode+'</td>'+
                                '<td>'+data[i].reportsTo+'</td>'+
                                '<td>'+data[i].jobTitle+'</td>'+
                                '<td>'+

                                    '<a href="<?= base_url('master/edit_Employees/')?>'+data[i].employeeNumber+'" class="badge badge-success">Edit</a>'+
                                    '<button type="button" class="badge badge-danger" id="hapus" onclick="hapus('+data[i].employeeNumber+')">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(str_html);
                }
 
            });

           // var urlDelete;
        /*$('#show_data').on('click','.item_hapus',function(){
          
           urlDelete = $(this).attr('href');
           console.log (urlDelete);
           // var id=$(this).attr('data');
           $('#ModalHapus').modal('show');
           // $('[name="productCode"]').val(productCode);
           return false;
        });*/

        //Hapus 
        function hapus(){
          $.ajax({
              type: 'POST',
              data: {employeeNumber: employeeNumber},
              url: "<?php echo base_url('master/ajax_deleteEmployees');?>",
              success: function(result) {
              var response = JSON.parse(result);
              if(response.status){     
                  alert('berhasil');
              }else{                 
                  alert('gagal');
              }
              }
          });
        }

        /*$('#btn_hapus').on('click',function(e){
          e.preventDefault();
          var employeeNumber = $('#employeeNumber').val();
            $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('master/ajax_deleteEmployees');?>",
                    dataType : "JSON",
                    data : {employeeNumber: employeeNumber},
                    success: function(data){
                      alert("Berhasil");
                      //$('#ModalHapus').modal('hide');
                        if(data == "ok"){
                          window.location.href =  "<?php echo base_url('employee_ajax'); ?>";
                        } else{
                         
                        }
                      
                    }
                });
                //return false;
            });
      
      }
      });*/
      
 
</script>