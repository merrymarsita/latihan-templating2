                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class= "container">
                    <div class="row">
                        <div class="col-lg-12">

                        <form class="form-horizontal" action="<?= base_url('master/insertOffices'); ?>" method="post">
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
                                    <input type="text" class="form-control" id="officeCode" name="officeCode" placeholder="" value="<?= set_value('officeCode'); ?>">
                                    <?= form_error('officeCode', '<small class="text-danger">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?= set_value('city'); ?>">
                                <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?= set_value('phone'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 1</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="" value="<?= set_value('addressLine1'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 2</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="" value="<?= set_value('addressLine2'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?= set_value('state'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="country" name="country" placeholder="" value="<?= set_value('country'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="" value="<?= set_value('postalCode'); ?>">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Territory</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="territory" name="territory" placeholder="" value="<?= set_value('territory'); ?>">
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