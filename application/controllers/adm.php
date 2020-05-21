<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('batchModel');
        $emp = $this->session->userdata('empcode');
        if (empty($this->session->userdata('nama'))) {        
            redirect(site_url());
        }
        elseif ($this->session->userdata('rolecode') != 'ADM') {
            redirect('emp');
        }
    }

    public function index()
    {
      $monthToDate = date("n");
      $this->load->database();
      $this->db->select('leaveRequest.id,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,format(leaveRequest.approvedcost,0) as approvedcost,format(leaveRequest.usedcost,0) as usedcost,leaveRequest.status,leaveRequest.attachment,leaveRequest.approvalstatus,leaveRequest.close,leaveRequest.month,leaveRequest.year');
      $this->db->from('employeeleaverequests as leaveRequest');
      $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
      $this->db->where('leaveRequest.close',1);
      $query = $this->db->get();
      $data['paylist'] = $query->result_array();

      $this->db->select('format(COALESCE(SUM(leaveRequest.usedcost),0),0) as useamt');
      $this->db->from('employeeleaverequests as leaveRequest');
      $this->db->where('leaveRequest.close',1);
      $this->db->where('leaveRequest.month',$monthToDate);
      $gettable = $this->db->get();    
      $data['useamt'] = $gettable->row_array();

      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/dashboard',$data);
    }

    // Attribute

    public function attribute()
    {
      $this->load->database();
      $this->db->select('lookups.code,lookups.lookupname, lookups.name, lookups.value');
      $this->db->from('appsgloballookupvariables as lookups');
      $query = $this->db->get();
      $data['lookups'] = $query->result_array();
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/attribute',$data);
    }

    public function attribute_add()
    {
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/attribute_add');
    }

    public function attprocess()
    {
      $code = strtoupper(substr(uniqid($this->input->post('lookupname')),0,3)).substr(rand(),0,7);
      $lookupname = $this->input->post('lookupname');
      $name = $this->input->post('attname');
      $value = $this->input->post('attvalue');
      $this->load->database();

      $data = array(
        'code' => $code,
        'lookupname' => $lookupname,
        'name' => $name,
        'value' => $value,
      );
      
      $insertquery =  $this->db->insert('appsgloballookupvariables', $data);
      if (!!$insertquery) {
        
        $this->session->set_flashdata('message','Success!');
        redirect('adm/attribute');
      }
    }

    public function attribute_update($code)
    {
      $this->load->database();
      $this->db->select('lookups.code,lookups.lookupname, lookups.name, lookups.value');
      $this->db->from('appsgloballookupvariables as lookups');
      $this->db->where('lookups.code',$code);
      $query = $this->db->get();
      $data['lookups'] = $query->row_array();
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/attribute_update',$data);
    }

    public function att_update_process($code)
    {
      $lookupname = $this->input->post('lookupname');
      $name = $this->input->post('attname');
      $value = $this->input->post('attvalue');
      $this->load->database();

      $data = array(
        'lookupname' => $lookupname,
        'name' => $name,
        'value' => $value,
      );

      $this->db->where('code',$code);
      $updatequery = $this->db->update('appsgloballookupvariables',$data);
      if (!!$updatequery) {
        
        $this->session->set_flashdata('message','Success Edited!');
        redirect('adm/attribute');
      }
    }

    public function attribute_delete($code)
    {
      $this->load->database();
      $this->db->delete('appsgloballookupvariables',array('code' => $code));
      redirect('adm/attribute');
    }

    // END ATTRIBUTE

    // Employee Setting

    public function emp_set()
    {
        $this->load->database();
        $this->db->select('emProfile.employeecode,emProfile.name,emProfile.bankcode,emProfile.bankaccount_number,emProfile.bankaccount_name,
        emProfile.phone_number,emProfile.email,appglobal.code,appglobal.name as bankname');
        $this->db->from('employeeprofile as emProfile');
        $this->db->join('appsgloballookupvariables as appglobal','emProfile.bankcode=appglobal.code');
        $query = $this->db->get();
        $data['profiles'] = $query->result_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/admin/emp_setting',$data);
    }

    public function emp_list()
    {
        $this->load->database();
        $this->db->select('emProfile.employeecode,emProfile.name,emProfile.bankcode,emProfile.bankaccount_number,emProfile.bankaccount_name,
        emProfile.phone_number,emProfile.email,appglobal.code,appglobal.name as bankname,religion.code,religion.name as religionname');
        $this->db->from('employeeprofile as emProfile');
        $this->db->join('appsgloballookupvariables as appglobal','emProfile.bankcode=appglobal.code');
        $this->db->join('appsgloballookupvariables as religion','emProfile.religioncode=religion.code');
        $query = $this->db->get();
        $data['emplists'] = $query->result_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/admin/emp_list',$data);
    }

    public function emp_add()
    {
      $this->load->database();
      $this->db->where('lookupname','Bank');
      $gettable = $this->db->get('appsgloballookupvariables');    
      $data['banks'] = $gettable->result_array();

      $this->db->where('lookupname','Religion');
      $gettable = $this->db->get('appsgloballookupvariables');
      $data['religions'] = $gettable->result_array();
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/emp_add',$data);
    }

    public function employeedataprocess()
    {
      // appuseraccount
      $this->load->database();
      $this->db->select_max("REPLACE(code,'U', '')","maxKode");
      $query = $this->db->get('appsuseraccount');
      $num = 0;
      if (count($query->result()) > 0) {
        $num = $query->result()[0]->maxKode +1;
      }
      $char = "U";
      $newID = $char.sprintf("%03s", $num);
      $appsuseraccount = $newID;
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $email = $this->input->post('email');
      $rolecode = $this->input->post('rolecode');
      $status = $this->input->post('employeestatus');

      $permittedchar = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $codeprofile = substr(str_shuffle($permittedchar),0,8);
      $employeeCode = strtoupper(substr(uniqid($this->input->post('name')),0,2)).substr(rand(),0,6);
      $name = $this->input->post('name');
      $joindate = $this->input->post('joindate');
      $phone_number = $this->input->post('phone_number');
      $bankname = $this->input->post('bankname');
      $bankaccount_number = $this->input->post('bankaccount_number');
      $bankaccount_name = $this->input->post('bankaccount_name');
      $limitcost = $this->input->post('limitcost');
      $religioncode = $this->input->post('religioncode');
      

      $datainformation = array(
        'code' => $employeeCode,
        'joindate' => $joindate,
        'limitcost' => $limitcost
      );

      $dataemployeeprofile = array(
        'code' => $codeprofile,
        'employeecode' => $employeeCode,
        'name' => $name,
        'bankcode' => $bankname,
        'bankaccount_number' => $bankaccount_number,
        'bankaccount_name' => $bankaccount_name,
        'phone_number' => $phone_number,
        'email' => $email,
        'religioncode' => $religioncode,
      );

      $dataappsuser = array(
        'code' => $newID,
        'employeecode' => $employeeCode,
        'name' => $name,
        'username' => $username,
        'password' => md5($password),
        'email' => $email,
        'rolecode' => $rolecode,
        'status' => $status,
      );
  
      $insertquery =  $this->db->insert('appsuseraccount', $dataappsuser);
      $insertquery =  $this->db->insert('employeeinformations', $datainformation);
      $insertquery =  $this->db->insert('employeeprofile', $dataemployeeprofile);

      if (!!$insertquery) {
        
        $this->session->set_flashdata('message','Success Submitted!');
        redirect('adm/emp_set');
      }

    }

    public function emp_update($id)
    {
        $this->load->database();
        $this->db->where('lookupname','Bank');
        $gettable = $this->db->get('appsgloballookupvariables');    
        $data['banks'] = $gettable->result_array();

        $this->db->select('emProfile.employeecode,emProfile.name as employeename,emProfile.bankcode,
        emProfile.bankaccount_number,emProfile.bankaccount_name,
        emProfile.phone_number,emProfile.email,appglobal.code,appglobal.name as bankname,empInfo.limitcost');
        $this->db->from('employeeprofile as emProfile');
        $this->db->join('appsgloballookupvariables as appglobal','emProfile.bankcode=appglobal.code');
        $this->db->join('employeeinformations as empInfo','empInfo.code=emProfile.employeecode');
        $this->db->where(array('emProfile.employeecode' => $id));
        $query = $this->db->get();
        $data['profile'] = $query->row_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/admin/emp_update',$data);
    }

    public function emp_updateprocess($id)
    {
      $this->load->database();
      $name = $this->input->post('name');
      $phone_number = $this->input->post('phone_number');
      $bankname = $this->input->post('bankname');
      $bankaccount_number = $this->input->post('bankaccount_number');
      $bankaccount_name = $this->input->post('bankaccount_name');
      $limitcost = $this->input->post('limitcost');
      $status = $this->input->post('employeestatus');

      $data = array(
        'emProfile.phone_number' => $phone_number,
        'emProfile.bankcode' => $bankname,
        'emProfile.bankaccount_number' => $bankaccount_number,
        'emProfile.bankaccount_name' => $bankaccount_name,
      );

      $datauser = array(
        'appUser.status' => $status
      );

      $datalimit = array(
        'empInfo.limitcost' => $limitcost
      );

      $where1 = array('employeecode' => $id);
      $where2 = array('code' => $id);

      $updatequery = $this->batchModel->updates('employeeprofile as emProfile', $data,$where1);
      $updatequery = $this->batchModel->updates('appsuseraccount as appUser', $datauser,$where1);
      $updatequery = $this->batchModel->updates('employeeinformations as empInfo', $datalimit,$where2);

      if (!!$updatequery) {
        
        $this->session->set_flashdata('message','Success Edited!');
        redirect('adm/emp_set');
      }

    }

    public function emp_delete($id)
    {
      $this->load->database();
      $this->db->delete('employeeinformations',array('code' => $id));
      $this->db->delete('employeeprofile',array('employeecode' => $id));
      $this->db->delete('appsuseraccount',array('employeecode' => $id));
      redirect('adm/emp_set');
    }

    // END EMPLOYEE SETTING

    public function payment()
    {
      $this->load->database();
      $this->db->select('leaveRequest.id,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,format(leaveRequest.approvedcost,0) as approvedcost,format(leaveRequest.usedcost,0) as usedcost,leaveRequest.attachment,leaveRequest.status, leaveRequest.approvalstatus,leaveRequest.close');
      $this->db->from('employeeleaverequests as leaveRequest');
      $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
      $this->db->where('leaveRequest.close',0);
      // $this->db->or_where('leaveRequest.status','Not Claimed');
      $query = $this->db->get();
      $data['payment'] = $query->result_array();
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/payment',$data);
    }

    public function approval($id)
    {
      $this->load->database();
      $this->db->select('leaveRequest.id,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,leaveRequest.status, leaveRequest.approvalstatus,leaveRequest.notes');
      $this->db->from('employeeleaverequests as leaveRequest');
      $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
      $this->db->where('leaveRequest.id =',$id);
      $query = $this->db->get();
      $data['approve'] = $query->row_array();
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('auth/admin/approval',$data);
    }

    public function approval_process($id)
    {
      $this->load->database();
      $approvecost = $this->input->post('coveredamount');

      $dataapproval = array(
        'approvedcost' => $approvecost,
        'approvalstatus' => 1,
      );
      
      $this->db->where('id', $id);
      $updatequery = $this->db->update('employeeleaverequests', $dataapproval);
      if (!!$updatequery) {
        $this->session->set_flashdata('message','Success');      
        redirect('adm/payment');
      }
    }

    public function pay_close($id)
    {
      $this->load->database();
      $data = array(
        'close' => '1'
      );
      $this->db->where('id',$id);
      $updatequery = $this->db->update('employeeleaverequests',$data);
      if (!!$updatequery) {
        redirect('adm/payment');
      }
      
    }

    // END ADMIN SCOPE
    
}
