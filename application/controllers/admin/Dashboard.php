<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/dashboard_model');
        $this->load->model('admin/Beneficiaire_model');
    }

    public function index() {
//        if (!$this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin()) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        } else {
            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $countbenef = $this->Beneficiaire_model->get_beneficiaire();
            if (!$countbenef)
                $this->data['count_beneficiaire'] = 0;
            else
                $this->data['count_beneficiaire'] = count($this->Beneficiaire_model->get_beneficiaire());
            
            $this->data['count_users'] = $this->dashboard_model->get_count_record('users');
            $this->data['count_monoparental'] = $this->Beneficiaire_model->count_monoparental();
            
            $this->data['memory_usepercent'] = $this->dashboard_model->memory_usepercent(TRUE, FALSE);


            

            /* Load Template */
            $this->template->admin_render('admin/dashboard/index', $this->data);
        }
    }

}
