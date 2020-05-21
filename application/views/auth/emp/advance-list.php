<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="p-5 pt-4 text-primary-500">Advance List</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <table class="table table-responsive table-striped" id="tabledata" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Destination</th>
              <th>Trip Purpose</th>
              <th>Leave Date</th>
              <th>Requested Cost</th>
              <th>Approved Cost</th>
              <th>Used Cost</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($advance as $adv) {?>
              <tr>
              <td><?= $no ?></td> 
              <td><?php echo $adv['destination'] ?> </td>
              <td><?php echo $adv['trippurpose'] ?> </td>
              <td><?php echo $adv['leavedate'].' '.'until'.' '.$adv['untildate']?> </td>
              <td class="text-right"><?php echo $adv['requestedcost'] ?> </td>
              <td class="text-right"><?php echo $adv['approvedcost'] ?> </td>
              <td class="text-right"><?php echo $adv['usedcost'] ?></td>
              <td><?= $adv['status'] ?></td>
              <td>
              <a id="reimburse" class="icon-circle bg-success" href="<?php echo site_url('emp/claimform/'.$adv['id']) ?>" title="Claim">
              <i class="fas fa-donate text-white"></i>
              </a>
              </td>
              </tr>
            <?php $no++; }?>
          </tbody>
      </table>
      </div>
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