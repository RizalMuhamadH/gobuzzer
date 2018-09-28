<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_buzzer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_buzzer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data_buzzer = $this->Data_buzzer_model->get_all();

        $data = array(
            'data_buzzer_data' => $data_buzzer
        );

        $this->template->load('template','data_buzzer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_buzzer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'domisili' => $row->domisili,
		'akun' => $row->akun,
		'follower' => $row->follower,
		'backround' => $row->backround,
		'interest' => $row->interest,
		'client' => $row->client,
		'gender_audiens' => $row->gender_audiens,
		'target_audiens' => $row->target_audiens,
		'capture_profile' => $row->capture_profile,
	    );
            $this->template->load('template','data_buzzer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_buzzer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data_buzzer/create_action'),
	    'id' => set_value('id'),
	    'domisili' => set_value('domisili'),
	    'akun' => set_value('akun'),
	    'follower' => set_value('follower'),
	    'backround' => set_value('backround'),
	    'interest' => set_value('interest'),
	    'client' => set_value('client'),
	    'gender_audiens' => set_value('gender_audiens'),
	    'target_audiens' => set_value('target_audiens'),
	    'capture_profile' => set_value('capture_profile'),
	);
        $this->template->load('template','data_buzzer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'domisili' => $this->input->post('domisili',TRUE),
		'akun' => $this->input->post('akun',TRUE),
		'follower' => $this->input->post('follower',TRUE),
		'backround' => $this->input->post('backround',TRUE),
		'interest' => $this->input->post('interest',TRUE),
		'client' => $this->input->post('client',TRUE),
		'gender_audiens' => $this->input->post('gender_audiens',TRUE),
		'target_audiens' => $this->input->post('target_audiens',TRUE),
		'capture_profile' => $this->input->post('capture_profile',TRUE),
	    );

            $this->Data_buzzer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_buzzer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_buzzer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_buzzer/update_action'),
		'id' => set_value('id', $row->id),
		'domisili' => set_value('domisili', $row->domisili),
		'akun' => set_value('akun', $row->akun),
		'follower' => set_value('follower', $row->follower),
		'backround' => set_value('backround', $row->backround),
		'interest' => set_value('interest', $row->interest),
		'client' => set_value('client', $row->client),
		'gender_audiens' => set_value('gender_audiens', $row->gender_audiens),
		'target_audiens' => set_value('target_audiens', $row->target_audiens),
		'capture_profile' => set_value('capture_profile', $row->capture_profile),
	    );
            $this->template->load('template','data_buzzer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_buzzer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'domisili' => $this->input->post('domisili',TRUE),
		'akun' => $this->input->post('akun',TRUE),
		'follower' => $this->input->post('follower',TRUE),
		'backround' => $this->input->post('backround',TRUE),
		'interest' => $this->input->post('interest',TRUE),
		'client' => $this->input->post('client',TRUE),
		'gender_audiens' => $this->input->post('gender_audiens',TRUE),
		'target_audiens' => $this->input->post('target_audiens',TRUE),
		'capture_profile' => $this->input->post('capture_profile',TRUE),
	    );

            $this->Data_buzzer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_buzzer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_buzzer_model->get_by_id($id);

        if ($row) {
            $this->Data_buzzer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_buzzer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_buzzer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('domisili', 'domisili', 'trim|required');
	$this->form_validation->set_rules('akun', 'akun', 'trim|required');
	$this->form_validation->set_rules('follower', 'follower', 'trim|required');
	$this->form_validation->set_rules('backround', 'backround', 'trim|required');
	$this->form_validation->set_rules('interest', 'interest', 'trim|required');
	$this->form_validation->set_rules('client', 'client', 'trim|required');
	$this->form_validation->set_rules('gender_audiens', 'gender audiens', 'trim|required');
	$this->form_validation->set_rules('target_audiens', 'target audiens', 'trim|required');
	$this->form_validation->set_rules('capture_profile', 'capture profile', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_buzzer.xls";
        $judul = "data_buzzer";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Domisili");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun");
	xlsWriteLabel($tablehead, $kolomhead++, "Follower");
	xlsWriteLabel($tablehead, $kolomhead++, "Backround");
	xlsWriteLabel($tablehead, $kolomhead++, "Interest");
	xlsWriteLabel($tablehead, $kolomhead++, "Client");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender Audiens");
	xlsWriteLabel($tablehead, $kolomhead++, "Target Audiens");
	xlsWriteLabel($tablehead, $kolomhead++, "Capture Profile");

	foreach ($this->Data_buzzer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->domisili);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->follower);
	    xlsWriteLabel($tablebody, $kolombody++, $data->backround);
	    xlsWriteLabel($tablebody, $kolombody++, $data->interest);
	    xlsWriteLabel($tablebody, $kolombody++, $data->client);
	    xlsWriteLabel($tablebody, $kolombody++, $data->gender_audiens);
	    xlsWriteLabel($tablebody, $kolombody++, $data->target_audiens);
	    xlsWriteLabel($tablebody, $kolombody++, $data->capture_profile);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Data_buzzer.php */
/* Location: ./application/controllers/Data_buzzer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-28 08:49:56 */
/* http://harviacode.com */