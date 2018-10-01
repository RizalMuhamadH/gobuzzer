<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backround extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Backround_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $backround = $this->Backround_model->get_all();

        $data = array(
            'backround_data' => $backround
        );

        $this->template->load('template','backround_list', $data);
    }

    public function getBackround(){
        $q = isset( $_GET['q'] ) ? $_GET['q'] : '';

        echo json_encode($this->Backround_model->get_all_backround($q));
    }

    public function read($id) 
    {
        $row = $this->Backround_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'n_backround' => $row->n_backround,
	    );
            $this->template->load('template','backround_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backround'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('backround/create_action'),
	    'id' => set_value('id'),
	    'n_backround' => set_value('n_backround'),
	);
        $this->template->load('template','backround_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'n_backround' => $this->input->post('n_backround',TRUE),
	    );

            $this->Backround_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('backround'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Backround_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('backround/update_action'),
		'id' => set_value('id', $row->id),
		'n_backround' => set_value('n_backround', $row->n_backround),
	    );
            $this->template->load('template','backround_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backround'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'n_backround' => $this->input->post('n_backround',TRUE),
	    );

            $this->Backround_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('backround'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Backround_model->get_by_id($id);

        if ($row) {
            $this->Backround_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('backround'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('backround'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('n_backround', 'n backround', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "backround.xls";
        $judul = "backround";
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
	xlsWriteLabel($tablehead, $kolomhead++, "N Backround");

	foreach ($this->Backround_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->n_backround);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Backround.php */
/* Location: ./application/controllers/Backround.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-09-28 08:50:18 */
/* http://harviacode.com */