<?php 
    $this->load->database();
    $this->db->select('leaveRequests.id,leaveRequests.code,emProfile.employeecode,emProfile.name,emProfile.bankcode,emProfile.bankaccount_number,
    emProfile.bankaccount_name,leaveRequests.trippurpose,leaveRequests.destination,date_format(leaveRequests.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequests.untildate,"%d %b %Y") as untildate,format(leaveRequests.requestedcost,0) as requestedcost,format(leaveRequests.approvedcost,0) as approvedcost,leaveRequests.status,leaveRequests.approvalstatus,leaveRequests.reminderdate,appglobal.code,appglobal.name as bankname');
    $this->db->from('employeeprofile as emProfile');
    $this->db->join('employeeleaverequests as leaveRequests','emProfile.employeecode=leaveRequests.employeecode');
    $this->db->join('appsgloballookupvariables as appglobal','emProfile.bankcode=appglobal.code');
    // $this->db->where('leaveRequests.reminderdate',date('Y-m-d'));
    // $this->db->where('leaveRequests.approvedcost >', 0);
    $this->db->where('leaveRequests.approvalstatus','0');
    $this->db->limit(5);
    $query = $this->db->get();
    $data = $query->result_array();  
    $rows = $query->num_rows();

    $this->db->select('leaveRequests.id,leaveRequests.employeecode,leaveRequests.destination, leaveRequests.trippurpose, date_format(leaveRequests.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequests.untildate,"%d %b %Y") as untildate, format(leaveRequests.requestedcost,0) as requestedcost,format(leaveRequests.approvedcost,0) as approvedcost,leaveRequests.status');
    $this->db->from('employeeleaverequests as leaveRequests');
    $this->db->where('leaveRequests.status','Not Claimed');
    $this->db->where('leaveRequests.approvalstatus', '1');    
    $this->db->where('leaveRequests.employeecode',$this->session->userdata('empcode'));
    $this->db->limit(5);
    $empquery = $this->db->get();
    $empdata = $empquery->result_array();
    $emprows = $empquery->num_rows();        
?>

<div class="container-fluid">
  <div class="row">

<!-- Topbar -->
<nav class="navbar bg-white topbar">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
  </button>

<ul class="nav ml-auto">
  <?php if ($this->session->userdata('rolecode') == 'ADM') { ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('adm/attribute') ?>">
    <i class="fas fa-tasks"></i>
    &nbsp; Attribute List
    </a>
  </li>

<!-- Alert -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown notif" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>

    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter"><?= ' ' ?></span>
    </a>          
<!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header"> Payment Due Date </h6>
                                
  <table id="myTable">
<?php foreach ($data as $data) {?>  
  <tr>
    <input type="number" id="notifileaveRequeststions" value="<?= $rows ?>" hidden>
    <td>
      <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('/adm/approval/'.$data['id']) ?>" title="Adjust Amount">
      <div class="mr-3">
      <div class="icon-circle icon-primary">
      <i class="fas fa-donate text-white"></i>
      </div>
      </div>
      </a>
    </td>
              
    <td>
      <div class="small text-primary"><?= $data['name'] ?></div>
      <div class="small text-primary-300"><?= $data['leavedate'] ?></div>
      <div class="text-primary-500"><?= $data['trippurpose'] ?></div>
    </td>
  </tr>
<?php }?>
  </table>
    </div>
  </li>

  <?php } else{?>
     <!-- Alert -->
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown notif" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fas fa-bell fa-fw"></i>

  <!-- Counter - Alerts -->
  <span class="badge badge-danger badge-counter"><?= ' ' ?></span>
  </a>
          
  <!-- Dropdown - Alerts -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
  <h6 class="dropdown-header"> Trip Not Claimed </h6>
                                
  <table id="myTable">
<?php foreach ($empdata as $empdata) {?>  
  <tr>
    <input type="number" id="notifileaveRequeststions" value="<?= $emprows ?>" hidden>
    <td>
      <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('/emp/claimform/'.$empdata['id']) ?>" title="Adjust Amount">
      <div class="mr-3">
      <div class="icon-circle icon-primary">
      <i class="fas fa-donate text-white"></i>
      </div>
      </div>
      </a>
    </td>
              
    <td>
      <div class="small text-primary"><?= $empdata['destination'] ?></div>
      <div class="small text-primary-300"><?= $empdata['trippurpose'] ?></div>
      <div class="text-primary-500"><?= $empdata['approvedcost'] ?></div>
    </td>
  </tr>
<?php }?>
  </table>
     </div>
     </li>
  <?php }?>
<!-- Nav Item - User Information -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama'); ?></span>
    <i class="fas fa-user"></i>
    </a>
            
<!-- Dropdown -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                        
      <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Logout
      </a>
    </div>
  </li>
  </ul>    
</nav>

    <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('/login/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
      <!-- End Topbar -->
  </div>
