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
                <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('master/insertProducts/'); ?>" class='btn btn-primary' >Add New Product</a></h6>
                </div>
                <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <?php echo validation_errors(); ?>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                       
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Line</th>
                        <th scope="col">Product Scale</th>
                        <th scope="col">Product Vendor</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity In Stock</th>
                        <th scope="col">Buy Price</th>
                        <th scope="col">MSRP</th>
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
                                           
                            <input type="hidden" name="productCode" id="productCode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus product ini?</p></div>
                                         
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
        tampilProducts();   //pemanggilan fungsi tampil products
          
        //fungsi tampil products
        function tampilProducts(){
            $.get({
               
                url   : "<?php echo base_url('master/ajax_get_products'); ?>",
                data :   '',
                type : "POST",
                dataType : "json",             
                success : function(data){
                  console.log(data);
                    var str_html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        str_html += '<tr>'+
                                '<td>'+data[i].productCode+'</td>'+
                                '<td>'+data[i].productName+'</td>'+
                                '<td>'+data[i].productLine+'</td>'+
                                '<td>'+data[i].productScale+'</td>'+
                                '<td>'+data[i].productVendor+'</td>'+
                                '<td>'+data[i].productDescription+'</td>'+
                                '<td>'+data[i].quantityInStock+'</td>'+
                                '<td>'+data[i].buyPrice+'</td>'+
                                '<td>'+data[i].MSRP+'</td>'+
                                '<td>'+

                                    '<a href="<?= base_url('master/editProducts/')?>'+data[i].productCode+'" class="badge badge-success">Edit</a>'+
                                    '<a href="<?= base_url('master/ajax_deleteProducts/')?>'+data[i].productCode+'" class="item_hapus badge badge-danger">Hapus</a>'+
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
                      tampilProducts();
                    }
                });
                return false;
            });
      
      }
      });
      
 
</script>