<div class="row">
  <!-- Content -->
  <div class="container-fluid">  
  <h3 class="p-5 text-primary-500">Employee Setting</h3>
  <?php if ($this->session->flashdata('message') ) { ?>
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
	  <p class="mb-0"><i class="fas fa-check-circle"></i> <?php echo $this->session->flashdata('message');?></p>
  </div>
<?php } ?>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <div class="float-left">
      <a class="text-primary" href="<?php echo base_url('adm/emp_add'); ?>"><i class="fas fa-user-plus"></i> <span> Add Employee </span></a>
      </div>
      <table class="table table-responsive table-striped display" id="tabledata" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Employee Name</th>
              <th>Bank Name</th>
              <th>Bank Account Number</th>
              <th>Bank Account Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($profiles as $profile) {?>
              <tr>
              <td><?= $no ?></td> 
              <td><?php echo $profile['name'] ?> </td>
              <td><?php echo $profile['bankname'] ?> </td>
              <td><?php echo $profile['bankaccount_number'] ?> </td>
              <td><?php echo $profile['bankaccount_name'] ?> </td>
              <td><?php echo $profile['phone_number'] ?> </td>
              <td><?php echo $profile['email'] ?> </td>
              <td width="200">
              <a title="Edit Employee" class="btn btn-outline-primary" href="<?php echo site_url('/adm/emp_update/'.$profile['employeecode']) ?>"><i class="far fa-edit"></i></a> 
              <a title="Delete Employee" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-outline-danger" href="<?php echo site_url('/adm/emp_delete/'.$profile['employeecode']) ?>"><i class="fas fa-trash-alt"></i></a>
              </td>
              </tr>
            <?php $no++; }?>
          </tbody>
      </table>
      </div>
    </div>
  </div>
  </div>
      <!-- End Content -->
</div>
<!-- Wrapper -->
    </div>
  </div>
</body>
</html>