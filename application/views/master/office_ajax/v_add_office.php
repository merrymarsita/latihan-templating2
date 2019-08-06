                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class= "container">
                    <div class="row">
                        <div class="col-lg-12">

                        <form class="form-horizontal" id ="add_employee" action="<?= base_url('master/ajax_insertEmployees'); ?>" method="post">
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
                           
                            <label for="email" class="col-sm-2 col-form-label">Office Code</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="officeCode" name="officeCode" placeholder="">
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="city" name="city" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="phone" name="phone" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 1</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="addressLine1" name="addressLine1" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 2</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="addressLine2" name="addressLine2" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="state" name="state" placeholder="">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="country" name="country" placeholder="">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Postal Code</label>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="postalCode" name="postalCode" placeholder="">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Territory</label>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control" id="territory" name="territory" placeholder="">
                                </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                            <button type="submitl"  id="btn-tambah" class="btn btn-primary">Tambah</button>

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
        }

       $('#btn-tambah').click(function(event)
       {
           alert('sukses');
           event.preventDefault();

        var officeCode = $('#officeCode').val();
        var city = $('#city').val();
        var phone = $('#phone').val();
        var addressLine1 = $('#addressLine1').val();
        var addressLine2 = $('#addressLine2').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var postalCode = $('#postalCode').val();
        var territory = $('#territory').val();
        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('master/ajax_insertOffice')?>",
                data : {officeCode: officeCode, city: city, phone: phone, addressLine1: addressLine1, addressLine2: addressLine2, state: state, country: country, postalCode: postalCode, territory: territory},
                success: function(data){
                    
                    console.log(data);
                   
                    if (data == 'Berhasil')
                        window.location.href =  "<?php echo base_url('office_ajax'); ?>";
                    else
                        $('#error-msg').html('<div class="alert alert-danger">' + resp.message + '</div>');
                    
                }
                
            });
           // return false;
        });
    });


      </script>