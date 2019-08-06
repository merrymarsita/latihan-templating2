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
                           
                            <label for="email" class="col-sm-2 col-form-label">Employee Number</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" placeholder="">
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="lastName" name="lastName" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="firstName" name="firstName" placeholder="" >
                                
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Extension</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="extension" name="extension" placeholder="" >
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                <input type="text"  class="form-control" id="email" name="email" placeholder="">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Office Code</label>
                            <div class="col-sm-6">
                                    <select name="officeCode" id="officeCode" class="form-control">
                                        <option value="">Select Office Code</option>
                                        <?php foreach ($offices as $o) : ?>
                                        <option value="<?= $o['officeCode']; ?>"><?= $o['city']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Reports To</label>
                            <div class="col-sm-6">
                            <select name="reportsTo" id="reportsTo" class="form-control">
                                <option value="">Select Reports To</option>
                                <?php foreach ($employees as $e) : ?>
                                <option value="<?= $e['employeeNumber']; ?>"><?= $e['firstName']."  ".$e['lastName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Job Title</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="jobTitle" name="jobTitle">
                                <option>Select Job Title</option>
                                <option>President</option>
                                <option>VP Sales</option>
                                <option>VP Marketing</option>
                                <option>Sales Manager (APAC)</option>
                                <option>Sales Manager (EMEA)</option>
                                <option>Sales Manager (NA)</option>
                                <option>Sales Rep</option>
                                </select>
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
       //Simpan Barang

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

                                    '<a href="<?= base_url('master/editProducts/')?>'+data[i].productCode+'" class="badge badge-success">Edit</a>'+
                                    '<a href="<?= base_url('master/ajax_deleteProducts/')?>'+data[i].productCode+'" class="item_hapus badge badge-danger">Hapus</a>'+
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

        var employeeNumber = $('#employeeNumber').val();
        var lastName = $('#lastName').val();
        var firstName = $('#firstName').val();
        var extension = $('#extension').val();
        var email = $('#email').val();
        var officeCode = $('#officeCode').val();
        var reportsTo = $('#reportsTo').val();
        var jobTitle = $('#jobTitle').val();
        
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('master/ajax_insertEmployee')?>",
                data : {employeeNumber: employeeNumber, lastName: lastName, firstName: firstName, extension: extension, email: email, officeCode: officeCode, reportsTo: reportsTo, jobTitle: jobTitle},
                success: function(data){
                    
                    console.log(data);
                   
                    if (data == 'Berhasil')
                        window.location.href =  "<?php echo base_url('employee_ajax'); ?>";
                    else
                        $('#error-msg').html('<div class="alert alert-danger">' + resp.message + '</div>');
                    
                }
            });
           // return false;
        });
    });


      </script>