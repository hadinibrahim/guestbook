<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property Guestbook_model $Guestbook_model
 */

class Guestbook extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guestbook_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('guest_form');
        } else {
            $this->Guestbook_model->insert_guest([
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'message' => $this->input->post('message', TRUE),
            ]);
            redirect('guestbook');
        }
    }

    public function admin()
    {
        $this->load->model('Guestbook_model');

        $star_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        if ($this->input->get('export') === '1') {
            $guests = $this->Guestbook_model->get_all_guests($star_date, $end_date);
            $this->_export_csv($guests);
            return;
        }

        $data['guests'] = $this->Guestbook_model->get_filtered_guests($star_date, $end_date);
        $data['start_date'] = $star_date;
        $data['end_date'] = $end_date;

        $this->load->view('admin_guestbook', $data);
    }

    private function _export_csv($guests)
    {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="guestbook_export.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Nama', 'Email', 'Pesan', 'Tanggal']);

        foreach ($guests as $g) {
            fputcsv($output, [
                $g->name,
                $g->email,
                $g->message,
                $g->created_at
            ]);
        }
        fclose($output);
    }
}
