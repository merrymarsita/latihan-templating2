                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class="row">
                        <div class="col-lg-8">

                        <?=form_open_multipart('master/ajax_editProductsById');?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Employee Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber"
                                    value="<?= $employeeNumber; ?>" readonly>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lastName" name="lastName">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                    >
                                   
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Extension</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="extension" name="extension">
                                    
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email">
                                    
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Office Code</label>
                            <div class="col-sm-10">
                                    <select name="officeCode" id="officeCode" class="form-control">
                                        <option value="">Select Office Code</option>
                                        <?php foreach ($offices as $o) : ?>
                                        <option value="<?= $o['officeCode']; ?>"><?= $o['city']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Reports To</label>
                            <div class="col-sm-10">
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
                            <div class="col-sm-10">
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
                    editEmployees();
                function editEmployees(){

                var employeeNumber = $('#employeeNumber').val();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('master/ajax_editEmployees'); ?>",
                        dataType : "json", 
                        data: {
                                employeeNumber: employeeNumber,
                              },

                            
                        success: function(merry){
                        //alert(merry.productName);
                        $('#employeeNumber').val(merry.employeeNumber);
                        $('#lastName').val(merry.lastName);
                        $('#firstName').val(merry.firstName);
                        $('#extension').val(merry.extension);
                        $('#email').val(merry.email);
                        $('#officeCode').val(merry.officeCode);
                        $('#reportsTo').val(merry.reportsTo);
                        $('#jobTitle').val(merry.jobTitle);
                        }
                    });

                    $('#btn-edit').click(function(event)
                        {
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
                                    url  : "<?php echo base_url('master/ajax_saveUpdateEmployees')?>",
                                    dataType : "JSON",
                                    data : {employeeNumber: employeeNumber, lastName: lastName, firstName: firstName, extension: extension, email: email, officeCode: officeCode, reportsTo: reportsTo, jobTitle: jobTitle},
                                    success: function(data){
                                        alert("Berhasil");
                                        console.log(data);
                                        //tampilProducts();
                                        //$('#tampilProducts').html(html);
                                    
                                        

                                        if (data == 'Berhasil Update')
                                            window.location.href =  "<?php echo base_url('employee_ajax'); ?>";
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