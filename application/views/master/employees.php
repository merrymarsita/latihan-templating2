                <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

<div class="row">
<div class="col-lg">
    <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
            <?php endif; ?>

<?= $this->session->flashdata('message'); ?>

<a href="<?= base_url('master/insert/'); ?>" class="btn btn-primary mb-3">Add New Employee</a>

<table class="table table-hover">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Employee Number</th>
<th scope="col">Last Name</th>
<th scope="col">First Name</th>
<th scope="col">Extension</th>
<th scope="col">Email</th>
<th scope="col">Office Code</th>
<th scope="col">Reports to</th>
<th scope="col">Job Title</th>
<th scope="col">Action</th>

</tr>
</thead>
<tbody>
<?php $i = 1; ?>
<?php

foreach ($employees as $e) : ?>
<tr>
<th scope="row"><?= $i;?></th>
    <td><?= $e['employeeNumber']; ?></td>
    <td><?= $e['lastName']; ?></td>
    <td><?= $e['firstName']; ?></td>
    <td><?= $e['extension']; ?></td>
    <td><?= $e['email']; ?></td>
    <td><?= $e['officeCode']; ?></td>
    <td><?= $e['reportsTo']; ?></td>
    <td><?= $e['jobTitle']; ?></td>
    <td>
        <a href="" class="badge badge-success">edit</a>
        <a href="" class="badge badge-danger">delete</a>
    </td>
  
</tr>
<?php $i++ ?>
<?php endforeach; ?>
</tbody>
</table>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Button trigger modal -->

<!-- Modal -->
<!--<div class="modal fade" id="newsubmenumodal" tabindex="-1" role="dialog" aria-labelledby="newsubmenumodalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="newsubmenumodalLabel">Add New Sub Menu</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form action="<?= base_url('menu/submenu'); ?>" method="post">
<div class="modal-body">
<div class="form-group">
<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
</div>
<div class="form-group">
<select name="menu_id" id="menu_id" class="form-control">
    <option value="">Select Menu</option>
    <?php foreach ($user_menu as $um) : ?>
    <option value="<?= $um['id']; ?>"><?= $um['menu']; ?></option>
    <?php endforeach; ?>
</select>
</div>
<div class="form-group">
<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
</div>
<div class="form-group">
<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
</div>
<div class="form-group">
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" for="is_active" checked>
  <label class="form-check-label" for="defaultCheck1">
    Active?
  </label>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>
</div>
</div>
</div>
</div>
