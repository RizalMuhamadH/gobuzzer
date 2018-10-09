<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Domisili extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Domisili_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $domisili = $this->Domisili_model->get_all();

        $data = array(
            'domisili_data' => $domisili
        );

        $this->template->load('template','domisili_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Domisili_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'n_domisili' => $row->n_domisili,
	    );
            $this->template->load('template','domisili_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('domisili'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('domisili/create_action'),
	    'id' => set_value('id'),
	    'n_domisili' => set_value('n_domisili'),
	);
        $this->template->load('template','domisili_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'n_domisili' => $this->input->post('n_domisili',TRUE),
	    );

            $this->Domisili_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('domisili'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Domisili_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('domisili/update_action'),
		'id' => set_value('id', $row->id),
		'n_domisili' => set_value('n_domisili', $row->n_domisili),
	    );
            $this->template->load('template','domisili_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('domisili'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'n_domisili' => $this->input->post('n_domisili',TRUE),
	    );

            $this->Domisili_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('domisili'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Domisili_model->get_by_id($id);

        if ($row) {
            $this->Domisili_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('domisili'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('domisili'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('n_domisili', 'n domisili', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "domisili.xls";
        $judul = "domisili";
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
	xlsWriteLabel($tablehead, $kolomhead++, "N Domisili");

	foreach ($this->Domisili_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->n_domisili);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=domisili.doc");

        $data = array(
            'domisili_data' => $this->Domisili_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('domisili_doc',$data);
    }

}

/* End of file Domisili.php */
/* Location: ./application/controllers/Domisili.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-10-09 09:42:42 */
/* http://harviacode.com */