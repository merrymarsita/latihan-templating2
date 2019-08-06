                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

                    <div class="row">
                        <div class="col-lg-10">

                        <?=form_open_multipart('master/editOffices/'.$data_office['officeCode']);?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Office Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="officeCode" name="officeCode"
                                    value="<?= $data_office['officeCode']; ?>" readonly>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="city" name="city"
                                    value="<?= $data_office['city']; ?>">
                                    <?= form_error('city', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                    value="<?= $data_office['phone']; ?>">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="addressLine1" name="addressLine1"
                                    value="<?= $data_office['addressLine1']; ?>">
                                    <?= form_error('addressLine1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Address Line 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="addressLine2" name="addressLine2"
                                    value="<?= $data_office['addressLine2']; ?>">
                                    <?= form_error('addressLine2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="state" name="state"
                                    value="<?= $data_office['state']; ?>">
                                    <?= form_error('state', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="country" name="country"
                                    value="<?= $data_office['country']; ?>">
                                    <?= form_error('country', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                                    value="<?= $data_office['postalCode']; ?>">
                                    <?= form_error('postalCode', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Territory</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="territory" name="territory"
                                    value="<?= $data_office['territory']; ?>">
                                    <?= form_error('territory', '<small class="text-danger pl-3">', '</small>'); ?>
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