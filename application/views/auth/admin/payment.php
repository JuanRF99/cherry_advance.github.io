<div class="row">
  <!-- Content -->
  <div class="container-fluid">
  <h3 class="p-5 pt-4 text-primary-500">Advance and Claim</h3>
  <div class="card my-1 ml-2 shadow-lg">
    <div class="card-body">
      <div class="p-3 text-primary">
      <table class="table table-responsive table-striped display" id="tabledata" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Employee Name</th>
              <th>Destination</th>
              <th>Trip Purpose</th>
              <th>Leave Date</th>
              <th>Requested Cost</th>
              <th>Approved Cost</th>
              <th>Used Cost</th>
              <th>Status</th>
              <th>Attachment</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($payment as $pay) {?>
              <tr>
              <td><?= $no ?></td> 
              <td><?php echo $pay['name'] ?> </td>
              <td><?php echo $pay['destination'] ?> </td>
              <td><?php echo $pay['trippurpose'] ?> </td>
              <td><?php echo $pay['leavedate'].' '.'until'.' '.$pay['untildate']?> </td>
              <td class="text-right"><?php echo $pay['requestedcost'] ?> </td>
              <td class="text-right"><?php echo $pay['approvedcost'] ?> </td>
              <td class="text-right"><?= $pay['usedcost'] ?></td>
              <td><?= $pay['status'] ?><input type="text" name="approvalstatus[]" value="<?php echo $pay['approvalstatus'];?>" hidden></td>
              <td align="center">
                <?php if(!!$pay['attachment']) {?>
                  <a class="btn" href="#" data-toggle="modal" data-target="#attachmentModal<?= $no ?>" title="View Attachment">
                  <i class="fas fa-file mr-2 text-gray-500"></i>
                    <!-- Attachment Modal-->
<div class="modal fade" id="attachmentModal<?=$no ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: auto; height:auto;">
      <div class="modal-header">
      <h5 class="modal-title" id="ModalLabel">Attachment</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
        <div class="modal-body">
          <div class="row justify-content-center">
            <img src="<?php echo asset_url()?>upload/<?php echo $pay['attachment'] ?>" alt="Attachment" 
            style="width: 100%; height: 100%; padding:2px;">
          </div> 
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
  <!-- End Attachment Modal -->
                <?php }else{?>
                  <a class="btn" href="#" data-toggle="modal" title="View Attachment">
                  <i class="fas fa-file mr-2 text-gray-500"></i>
                <?php }?>
              </td>
              <td>
              <a name="approve[]" id="approve" class="icon-circle bg-success" href="<?php echo site_url('adm/approval/'.$pay['id']) ?>" title="Approve">
              <i class="fas fa-donate text-white"></i>
              </a><a title="Close" onclick="return confirm('Are you sure want to close this case?')" class="btn btn-outline-danger" href="<?php echo site_url('/adm/pay_close/'.$pay['id']) ?>"><i class="fas fa-check-circle"></i></a>
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