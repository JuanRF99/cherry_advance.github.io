<?php
defined ('BASEPATH') or exit('No direct script access allowed!');
?>
<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <?php if ($this->session->userdata('rolecode') == 'ADM') { ?>
  <div class="row justify-content-center my-5">
  <div class="col-sm-4">
    <div class="card shadow-lg">
    <div class="card-body">
      <p class="card-text">Total Usage This Month</p>
      <hr>
      <h6 class="card-title text-primary-500">IDR <?= $useamt['useamt']; ?></h6>
    </div>
    </div>
  </div>
  </div>
  <h3 class="pt-3 pl-3 text-primary-500">Advance List</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <table class="table table-bordered  table-responsive table-striped display" id="payListTable" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Employee Name</th>
              <th>Destination</th>
              <th>Trip Purpose</th>
              <th>Leave Date</th>
              <th>Approved Amount</th>
              <th>Used Amount</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($paylist as $pay) {?>
              <tr>
              <td><?= $no ?></td> 
              <td><?php echo $pay['name'] ?> </td>
              <td><?php echo $pay['destination'] ?> </td>
              <td><?php echo $pay['trippurpose'] ?> </td>
              <td><?php echo $pay['leavedate'].' '.'until'.' '.$pay['untildate']?></td>
              <td class="text-right"><?php echo $pay['approvedcost'] ?> </td>
              <td class="text-right"><?php echo $pay['usedcost']?></td>
              <td><?php echo 'Bulan Ke-'.$pay['month'].' '.'Tahun'.' '.$pay['year']?></td>
              </tr>
            <?php $no++; }?>
          </tbody>
      </table>
      </div>
    </div>
  </div>
<?php } if ($this->session->userdata('rolecode') == 'EMP') {  ?>
<div class="pt-5 text-primary">
<h3 class="text-center">Hai <?= $this->session->userdata('nama'); ?>, Welcome to Cherry Advance!</h3>
<div class="row justify-content-center my-5">
  <div class="col-sm-4">
    <div class="card shadow-lg">
    <div class="card-body">
      <p class="card-text">Your Total Usage This Month</p>
      <hr>
      <h6 class="card-title text-primary-500">IDR <?= $empamt['empamt']; ?></h6>
    </div>
    </div>
  </div>
  </div>
  <h3 class="pt-3 pl-3 text-primary-500">Advance List</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <table class="table table-bordered table-responsive table-striped display" id="payListTable" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <!-- <th>Employee Name</th> -->
              <th>Destination</th>
              <th>Trip Purpose</th>
              <th>Leave Date</th>
              <th>Approved Amount</th>
              <th>Used Amount</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($paylist as $pay) {?>
              <tr>
              <td><?= $no ?></td> 
              <!-- <td><?php echo $pay['name'] ?> </td> -->
              <td><?php echo $pay['destination'] ?> </td>
              <td><?php echo $pay['trippurpose'] ?> </td>
              <td><?php echo $pay['leavedate'].' '.'until'.' '.$pay['untildate']?></td>
              <td class="text-right"><?php echo $pay['approvedcost'] ?> </td>
              <td class="text-right"><?php echo $pay['usedcost']?></td>
              <td><?php echo 'Bulan Ke-'.$pay['month'].' '.'Tahun'.' '.$pay['year']?></td>
              </tr>
            <?php $no++; }?>
          </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  </div>
      <!-- End Content -->
</div>
<!-- Wrapper -->
    </div>
  </div>
</body>
</html>