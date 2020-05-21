<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emp extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('batchModel');
        $emp = $this->session->userdata('empcode');
        if (empty($this->session->userdata('nama'))) {        
            redirect(site_url());
        }
        elseif ($this->session->userdata('rolecode') != 'EMP') {
            
            redirect('adm');
            
        }
    }

    public function index()
    {
        $this->load->database();
        $this->db->select('leaveRequest.id,leaveRequest.employeecode,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,format(leaveRequest.approvedcost,0) as approvedcost,format(leaveRequest.usedcost,0) as usedcost,leaveRequest.status,leaveRequest.attachment,leaveRequest.approvalstatus,leaveRequest.close,leaveRequest.month,leaveRequest.year');
        $this->db->from('employeeleaverequests as leaveRequest');
        $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
        $this->db->where('leaveRequest.close',1);
        $this->db->where('leaveRequest.employeecode',$this->session->userdata('empcode'));
        $query = $this->db->get();
        $data['paylist'] = $query->result_array();
        $monthToDate = date("n");       
        $this->db->select('format(COALESCE(SUM(leaveRequest.usedcost),0),0) as empamt');
        $this->db->from('employeeleaverequests as leaveRequest');
        $this->db->where('leaveRequest.close',1);
        $this->db->where('leaveRequest.month',$monthToDate);
        $this->db->where('leaveRequest.employeecode',$this->session->userdata('empcode'));
        $gettable = $this->db->get();    
        $data['empamt'] = $gettable->row_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/dashboard',$data);
    }

    // EMPLOYEE SCOPE

    public function advance_list()
    {
        $this->load->database();
        $this->db->select('leaveRequest.id,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,format(leaveRequest.approvedcost,0) as approvedcost,format(leaveRequest.usedcost,0) as usedcost,leaveRequest.status');
        $this->db->from('employeeleaverequests as leaveRequest');
        $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
        $this->db->where('leaveRequest.employeecode =',$this->session->userdata('empcode'));
        $query = $this->db->get();
        $data['advance'] = $query->result_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/emp/advance-list',$data);
    }

    public function advanceform()
    {
        $this->load->database();
        $query = $this->db->query("SELECT MAX(REPLACE(code,'AR/".date('m')."/".date('Y')."/','')) as maxKode FROM employeeleaverequests WHERE substring(code,4,2)=".date('m')." and substring(code,7,4)=".date('Y')."");
        $num = 0;
        if (count($query->result()) > 0) {
            $num = $query->result()[0]->maxKode+1;
        }
        $char = "AR/".date('m')."/".date('Y')."/";
        $newID = $char . sprintf("%03s",$num);
        $data['newID'] = $newID;
        $this->db->select('information.limitcost as lcost');
        $this->db->from('employeeinformations as information');
        $this->db->where('information.code',$this->session->userdata('empcode'));
        $gettable = $this->db->get();    
        $data['lcost'] = $gettable->row_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/emp/advance-form',$data);
    }

    public function advanceprocess()
    {
        $code = $this->input->post('formcode');
        $requestor = $this->session->userdata('empcode');
        $leavedate = $this->input->post('leavedate');
        $untildate = $this->input->post('untildate');
        $reminderdate = $this->input->post('reminderdate');
        $destination = $this->input->post('destination');
        $trippurpose = $this->input->post('trippurpose');
        $notes = $this->input->post('notes');
        $requestedcost = $this->input->post('requestedcost');
        $monthToDate = date_format(date_create($leavedate),"n");
        $yearToDate = date_format(date_create($leavedate),"Y");

        $leaverequest = array(
            'code' => $code,
            'employeecode' => $requestor,
            'leavedate' => $leavedate,
            'untildate' => $untildate,
            'reminderdate' => $reminderdate,
            'destination' => ucwords($destination),
            'trippurpose' => ucwords($trippurpose),
            'notes' => $notes,
            'requestedcost' => $requestedcost,
            'month' => $monthToDate,
            'year' => $yearToDate,
            'insertstamp' => date("Y-m-d")
        );

        $insertquery = $this->db->insert('employeeleaverequests',$leaverequest);
        if (!!$insertquery) {
            $this->session->set_flashdata('message', 'Success Submitted');
            redirect('emp/advance_list');
        }
    }

    public function claimform($id)
    {
        $this->load->database();
        $this->db->select('leaveRequest.id,leaveRequest.code as leaveCode,ep.name, leaveRequest.destination, leaveRequest.trippurpose, date_format(leaveRequest.leavedate,"%d %b %Y") as leavedate, date_format(leaveRequest.untildate,"%d %b %Y") as untildate, format(leaveRequest.requestedcost,0) as requestedcost,format(leaveRequest.approvedcost,0) approvedcost,leaveRequest.status');
        $this->db->from('employeeleaverequests as leaveRequest');
        $this->db->join('employeeprofile as ep','ep.employeecode=leaveRequest.employeecode');
        $this->db->where('leaveRequest.id =',$id);
        $query = $this->db->get();
        $data['claim'] = $query->row_array();
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('auth/emp/claim-form',$data);
    }

    public function claimprocess($id)
    {
        $usedamount = $this->input->post('usedamount');
        $permittedchar = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $datemonth = date('Ymd');
        $leavecode = $this->input->post('leavecode');
        $description = $_POST['description'];
        $descs = $_POST['description'];
        $amount = $this->input->post('amount');
        $notes = $this->input->post('notes');
        $file = '';
        $file = $_FILES['image'];
        $filename = strtotime(date('d-M-Y H:i:s')).$file['name'];
        move_uploaded_file($file['tmp_name'], dirname(__FILE__).'/../../public/assets/upload/'.$filename);
        $data = array();

        $index = 0;
        foreach ($description as $description) {
            array_push($data, array(
                'code' => strtoupper(substr(str_shuffle($descs[$index].$permittedchar),0,10)),
                'leavecode'=> $leavecode,
                'items' =>ucwords($descs[$index]),
                'amount' => $amount[$index],
                'notes' => $notes[$index],
            ));
            $index++;
        }
        $amt = array_column($data,'amount');
        $arrsum = array_sum($amt);
        $dataupdate = array(
            'usedcost' => $arrsum,
            'attachment' => $filename,
            'status' => 'Claimed'
        );
        $this->db->where('id',$id);
        $updatequery = $this->db->update('employeeleaverequests',$dataupdate);
        $sql = $this->batchModel->save_batch($data);
        if ($sql && !!$updatequery) {
            echo "<script>alert('Data Berhasil Disimpan'); </script>";
            redirect('','refresh');
        }else{
            echo "<script>alert('Data Gagal Disimpan'); </script>";
            redirect('','refresh');
        }
    }
    
}

?>