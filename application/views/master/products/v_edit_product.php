                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class="row">
                        <div class="col-lg-8">

                        <?=form_open_multipart('master/ajax_editProducts');?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Product Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productCode" name="productCode"
                                    value="<?= $productCode; ?>" readonly>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="productName">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Line</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productLine" name="productLine"
                                    >
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Scale</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productScale" name="productScale">
                                    
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Vendor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productVendor" name="productVendor">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Product Description</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productDescription" name="productDescription">
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity In Stock</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="quantityInStock" name="quantityInStock">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Buy Price</label>
                            <div class="col-sm-10">
                                    <input type="text" class="form-control" id="buyPrice" name="buyPrice">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">MSRP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MSRP" name="MSRP">
                                   
                                </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" id="btn-edit" class="btn btn-primary">Edit</button>

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
                    //alert("tes");
                //Update Barang
                    editProducts();
                function editProducts(){

                var productCode = $('#productCode').val();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('master/ajax_editProducts'); ?>",
                        dataType : "json", 
                        data: {
                                productCode: productCode,
                              },

                            
                        success: function(merry){
                        //alert(merry.productName);
                        $('#productName').val(merry.productName);
                        $('#productLine').val(merry.productLine);
                        $('#productScale').val(merry.productScale);
                        $('#productVendor').val(merry.productVendor);
                        $('#productDescription').val(merry.productDescription);
                        $('#quantityInStock').val(merry.quantityInStock);
                        $('#buyPrice').val(merry.buyPrice);
                        $('#MSRP').val(merry.MSRP);
                        }
                    });

                    $('#btn-edit').click(function(event)
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
                                    url  : "<?php echo base_url('master/ajax_saveUpdateProducts')?>",
                                    dataType : "JSON",
                                    data : {productCode: productCode, productName: productName, productLine: productLine, productScale: productScale, productVendor: productVendor, productDescription: productDescription, quantityInStock: quantityInStock, buyPrice: buyPrice, MSRP: MSRP},
                                    success: function(data){
                                        alert("Berhasil");
                                        console.log(data);
                                        //tampilProducts();
                                        //$('#tampilProducts').html(html);
                                    
                                        

                                        if (data == 'Berhasil Update')
                                            window.location.href =  "<?php echo base_url('products'); ?>";
                                        else
                                            $('#error-msg').html('<div class="alert alert-danger">' +  + '</div>');
                                        //tampilProducts();
                                        //location.replace("master/ajax_get_products")*/
                                    }
                                });
                            // return false;
                            });   

                    }

             
            });
            </script>