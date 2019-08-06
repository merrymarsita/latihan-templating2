                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class= "container">
                    <div class="row">
                        <div class="col-lg-12">

                        <form class="form-horizontal" action="<?= base_url('master/insertEmployees'); ?>" method="post">
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
                                    <input type="text" class="form-control" id="employeeNumber" name="employeeNumber" placeholder="" value="<?= set_value('employeeNumber'); ?>">
                                    <?= form_error('employeeName', '<small class="text-danger">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="<?= set_value('lastName'); ?>">
                                <?= form_error('employeeName', '<small class="text-danger">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="<?= set_value('firstName'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Extension</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="extension" name="extension" placeholder="" value="<?= set_value('extension'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= set_value('email'); ?>">
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
                                <button type="submit" class="btn btn-primary">Add</button>

                        </form>
                        </div>
                    </div>

                    </div>
                    </div>
                

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->