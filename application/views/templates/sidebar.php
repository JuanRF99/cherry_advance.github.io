<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->session->userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cherry Advance</title>
    <script src="<?php echo asset_url() ?>js/jquery.min.js"></script>
    <link href="<?php echo asset_url() ?>/img/favicon.ico" rel="shortcut icon" />
    <script src="<?php echo asset_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url() ?>js/script.js"></script>
    <script src="<?php echo asset_url() ?>DataTables/datatables.min.js"></script>
    <script src="<?php echo asset_url() ?>DataTables/js/jszip.js"></script>
    <link rel="stylesheet" href="<?php echo asset_url()?>DataTables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo asset_url()?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset_url()?>css/style.css">
    <link rel="stylesheet" href="<?php echo asset_url()?>css/all.min.css">
</head>
<body>
    
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
    <div class="sidebar-brand-icon">
    <img src="<?php echo asset_url() ?>img/cherrylogo.png" alt="cherry" width="40" height="30">
    </div>
    <div class="sidebar-brand-text mx-3">Cherry Advance</div>
    </a>

    <!-- Divider -->
  <hr class="sidebar-divider my-2">

    <li class="nav-item">
    <a href="<?php echo base_url(); ?>" class="nav-link">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span>
    </a>
    </li>

    <?php if($this->session->userdata('rolecode') == "ADM"){?>

    <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('adm/payment'); ?>">
    <i class="fas fa-scroll"></i>
    <span>Advance</span>
    </a>
    </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-user"></i>
    <span>Personel</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Personel Utilities</h6>
      <a class="collapse-item" href="<?php echo base_url('adm/emp_list'); ?>"> <i class="fas fa-fw fa-table"></i> <span> Employee Lists </span> </a>
      <a class="collapse-item" href="<?php echo base_url('adm/emp_set'); ?>"> <i class="fas fa-user-cog"></i> <span> Manage Employees </span> </a>
      </div>
    </div>
    </li>

    <?php } if($this->session->userdata('rolecode') == 'EMP'){?>

    <li class="nav-item">
    <a href="<?php echo base_url('emp/advanceform'); ?>" class="nav-link">
    <i class="fas fa-file-contract"></i>
    <span>Advance Form</span>
    </a>
    </li>

    <li class="nav-item">
    <a href="<?php echo base_url('emp/advance_list/'.$user['empcode']); ?>" class="nav-link">
    <i class="fas fa-fw fa-table"></i>
    <span>Advance List</span>
    </a>
    </li>

    <?php }?>

    <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  </ul>
  <!-- End Sidebar -->