<div class="row">
  <!-- Content -->
  <div class="container-fluid">  
  <h3 class="p-5 text-primary-500">Attributes Setting</h3>
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
      <a class="text-primary" href="<?php echo base_url('adm/attribute_add'); ?>"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> <span> Add Attribute </span></a>
      </div>
      <table class="table table-striped display" id="tabledata" width="100%">
          <thead>
            <tr>
              <th>Variable</th>
              <th>Name</th>
              <th>Value</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($lookups as $look) {?>
              <tr>
              <td><?php echo $look['lookupname'] ?> </td>
              <td><?php echo $look['name'] ?> </td>
              <td><?php echo $look['value'] ?> </td>
              <td width="200">
              <a title="Edit Data" class="btn btn-outline-primary" href="<?php echo site_url('/adm/attribute_update/'.$look['code']) ?>"><i class="far fa-edit"></i></a> 
              <a title="Delete Data" onclick="return confirm('Are you sure want to delete this data?')" class="btn btn-outline-danger" href="<?php echo site_url('/adm/attribute_delete/'.$look['code']) ?>"><i class="fas fa-trash-alt"></i></a>
              </td>
              </tr>
            <?php }?>
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