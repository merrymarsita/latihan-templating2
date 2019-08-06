                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class="row">
                        <div class="col-lg-8">

                        <?=form_open_multipart('master/editEmployees/'.$data_employee['employeeNumber']);?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Employee Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber"
                                    value="<?= $data_employee['employeeNumber']; ?>" readonly>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                    value="<?= $data_employee['lastName']; ?>">
                                    <?= form_error('lastName', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                    value="<?= $data_employee['firstName']; ?>">
                                    <?= form_error('firstName', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Extension</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="extension" name="extension"
                                    value="<?= $data_employee['extension']; ?>">
                                    <?= form_error('extension', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email"
                                    value="<?= $data_employee['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Office Code</label>
                                <div class="col-sm-10">
                                <select name="officeCode" id="officeCode" class="form-control">
                                <?php
                                foreach ($data_office_for_dropdown as  $value) {
                                    # code...
                                    if($data_office['officeCode']==$value['officeCode']){
                                        echo "<option value='".$value['officeCode']."' selected>".$value['officeCode']." - ".$value['city']."</option>";
                                    }else{
                                        echo "<option value='".$value['officeCode']."'>".$value['officeCode']." - ".$value['city']."</option>";
                                    }
                                    
                                }
                            ?>
                                </select>
                                    <?= form_error('officeCode', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Report To</label>
                            <div class="col-sm-10">
                            <select class="form-control" name='reportsTo'>
                            <?php
                                foreach ($data_employee_for_dropdown as  $value) {
                                    # code...
                                    if($data_employee['reportsTo']==$value['employeeNumber']){
                                        echo "<option value='".$value['employeeNumber']."' selected>".$value['employeeNumber']." - ".$value['firstName']."</option>";
                                    }else{
                                        echo "<option value='".$value['employeeNumber']."'>".$value['employeeNumber']." - ".$value['firstName']."</option>";
                                    }
                                    
                                }
                            ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Job Title</label>
                                <div class="col-sm-10">
                                <select class="form-control" id="jobTitle" name="jobTitle">
                                <option value= "<?= $data_employee['jobTitle']; ?>">
                                <?= $data_employee['jobTitle']; ?></option>
                                <option>President</option>
                                <option>VP Sales</option>
                                <option>VP Marketing</option>
                                <option>Sales Manager (APAC)</option>
                                <option>Sales Manager (EMEA)</option>
                                <option>Sales Manager (NA)</option>
                                <option>Sales Rep</option>
                                </select>
                                    <?= form_error('jobTitle', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>

                        </form>
                        </div>
                    </div>

                    </div>
                    </div>
                

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->