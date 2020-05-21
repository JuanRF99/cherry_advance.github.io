<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="p-5 text-primary-500">Employee List</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <table class="table table-bordered table-responsive table-striped display" id="reportTable" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Employee Name</th>
              <th>Bank Name</th>
              <th>Bank Account Number</th>
              <th>Bank Account Name</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Religion</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($emplists as $emp) {?>
              <tr>
              <td><?= $no ?></td> 
              <td><?php echo $emp['name'] ?> </td>
              <td><?php echo $emp['bankname'] ?> </td>
              <td><?php echo $emp['bankaccount_number'] ?> </td>
              <td><?php echo $emp['bankaccount_name'] ?> </td>
              <td><?php echo $emp['phone_number'] ?> </td>
              <td><?php echo $emp['email'] ?> </td>
              <td><?php echo $emp['religionname']?></td>
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