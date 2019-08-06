                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class= "container">
                    <div class="row">
                        <div class="col-lg-12">

                        <form class="form-horizontal" id ="add_product" action="<?= base_url('master/ajax_insertProducts'); ?>" method="post">
                        <div class="form-group row">
                        <div class="col-sm-6">
                        <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors();?>
                                </div>
                                <?php endif; ?>
                                <?= $this->session->flashdata('message'); ?>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                           
                            <label for="email" class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="productCode" name="productCode" placeholder="">
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="productName" name="productName" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Line</label>
                                <div class="col-sm-6">
                                <select class="form-control" id="productLine" name="productLine">
                                <option value="">Select Product Line</option>
                                <option>Classic Cars</option>
                                <option>Motorcycles</option>
                                <option>Planes</option>
                                <option>Ships</option>
                                <option>Trains</option>
                                <option>Trucks and Buses</option>
                                <option>Vintage Cars</option>
                                </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Scale</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="productScale" name="productScale" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Vendor</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="productVendor" name="productVendor" placeholder="">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="productDescription" name="productDescription" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Quantity In Stock</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="quantityInStock" name="quantityInStock" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Buy Price</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="buyPrice" name="buyPrice" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">MSRP</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="MSRP" name="MSRP" placeholder="" >
                                </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                            <button type="button"  id="btn-tambah" class="btn btn-primary">Tambah</button>

                        </form>
                        </div>
                    </div>

                    </div>
                    </div>
                

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

    <script type="text/javascript" src="<?= base_url().'/assets/js/jquery-3.4.1.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>
      <script type="text/javascript">
      $(document).ready(function(){
       //Simpan Barang

       function tampilProducts(){
            $.get({
               
                url   : "<?php echo base_url('master/ajax_get_products'); ?>",
                data :   '',
                type : "POST",
                dataType : "json",             
                success : function(data){
                  console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
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
                                    '<a href="javascript:;" class="badge badge-success">Edit</a>'+
                                    '<a href="javascript:;" class="badge badge-danger">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

       $('#btn-tambah').click(function(event)
       {
           event.preventDefault();

        var productCode = $('#productCode').val();
        var productName = $('#productName').val();
        var productLine = $('#productLine').val();
        var productScale = $('#productScale').val();
        var productVendor = $('#productVendor').val();
        var productDescription = $('#productDescription').val();
        var quantityInStock = $('#quantityInStock').val();
        var buyPrice = $('#buyPrice').val();
        var MSRP = $('#MSRP').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('master/ajax_insertProducts')?>",

                data : {productCode: productCode, productName: productName, productLine: productLine, productScale: productScale, productVendor: productVendor, productDescription: productDescription, quantityInStock: quantityInStock, buyPrice: buyPrice, MSRP: MSRP},
                success: function(data){
                    
                    console.log(data);
                    //tampilProducts();
                    //$('#tampilProducts').html(html);
                  
                    if (data == 'Berhasil')
                        window.location.href =  "<?php echo base_url('products'); ?>";
                    else
                        $('#error-msg').html('<div class="alert alert-danger">' + resp.message + '</div>');
                    //tampilProducts();
                    //location.replace("master/ajax_get_products")*/
                }
            });
           // return false;
        });
    });

      

      </script>