<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiaire extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        /* Load :: Common */
        $this->lang->load('admin/users');

        /* Load Model */
        $this->load->model('admin/Beneficiaire_model');

        /* Title Page :: Common */
        $this->page_title->push('Benéficiaire');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Benéficiaire', 'admin/beneficiaire');
    }

    public function index() {
        if (!$this->ion_auth->logged_in() || $this->ion_auth->is_admin()) {
            redirect('auth/login', 'refresh');
        } else {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all beneficiary */

            $this->data['beneficiaire'] = $this->Beneficiaire_model->get_beneficiaire();

//            foreach ($this->data['beneficiaire'] as $k => $user) {
//                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
//            }

            /* Load Template */
            $this->template->admin_render('admin/beneficiaire/index', $this->data);
        }
    }

    public function create() {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/beneficiaire/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */

        /* Validate form input */
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('nom_jeune_fille', 'Nom de jeune fille', 'required');
        $this->form_validation->set_rules('prenom_conjoint', 'Prenom conjoint', 'required');
        $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('code_postal', 'Code postal', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');

        if ($this->form_validation->run() == TRUE) {
            $additional_data = array(
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'nom_jeune_fille' => $this->input->post('nom_jeune_fille'),
                'prenom_conjoint' => $this->input->post('prenom_conjoint'),
                'date_naissance' => $this->input->post('date_naissance'),
                'adresse' => $this->input->post('adresse'),
                'ville' => $this->input->post('ville'),
                'code_postal' => $this->input->post('code_postal'),
                'telephone' => $this->input->post('telephone'),
                'civilite' => $this->input->post('civilite'),
                'monoparental' => $this->input->post('monoparental'),
                'livre' => $this->input->post('livre'),
            );
        }

        if ($this->form_validation->run() == TRUE && $this->Beneficiaire_model->save($additional_data)) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('admin/beneficiaire', 'refresh');
        } else {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['civilite'] = array(
                'Mr.' => 'Mr.',
                'Mme' => 'Mme',
                'Mlle' => 'Mlle'
            );

            $this->data['monoparental'] = array(
                '0' => 'Non',
                '1' => 'Oui'
            );

            $this->data['livre'] = array(
                '0' => 'Non',
                '1' => 'Oui'
            );

            $this->data['nom'] = array(
                'name' => 'nom',
                'id' => 'nom',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('nom'),
            );
            $this->data['prenom'] = array(
                'name' => 'prenom',
                'id' => 'prenom',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('prenom'),
            );
            $this->data['nom_jeune_fille'] = array(
                'name' => 'nom_jeune_fille',
                'id' => 'nom_jeune_fille',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('nom_jeune_fille'),
            );


            $this->data['prenom_conjoint'] = array(
                'name' => 'prenom_conjoint',
                'id' => 'prenom_conjoint',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('prenom_conjoint'),
            );

            $this->data['date_naissance'] = array(
                'name' => 'date_naissance',
                'id' => 'date_naissance',
                'type' => 'text',
                'placeholder' => 'Exemple : 2018-01-01',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('date_naissance'),
            );

            $this->data['ville'] = array(
                'name' => 'ville',
                'id' => 'ville',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('ville'),
            );

            $this->data['adresse'] = array(
                'name' => 'adresse',
                'id' => 'adresse',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('adresse'),
            );

            $this->data['telephone'] = array(
                'name' => 'telephone',
                'id' => 'telephone',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('telephone'),
            );

            $this->data['code_postal'] = array(
                'name' => 'code_postal',
                'id' => 'code_postal',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('code_postal'),
            );


            /* Load Template */
            $this->template->admin_render('admin/beneficiaire/create', $this->data);
        }
    }

    public function delete($id) {
        /* Load Template */
        $this->Beneficiaire_model->delete_beneficiaire($id);
        redirect('admin/beneficiaire/', 'refresh');
    }

    public function edit($id) {
        $id = (int) $id;

        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_edit'), 'admin/beneficiaire/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $beneficiaire = $this->Beneficiaire_model->get_beneficiaire_by_id($id)[0];

        /* Validate form input */
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('nom_jeune_fille', 'Nom de jeune fille', 'required');
        $this->form_validation->set_rules('prenom_conjoint', 'Prenom conjoint', 'required');
        $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('code_postal', 'Code postal', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');


        if (isset($_POST) && !empty($_POST)) {
            if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'nom_jeune_fille' => $this->input->post('nom_jeune_fille'),
                    'prenom_conjoint' => $this->input->post('prenom_conjoint'),
                    'date_naissance' => $this->input->post('date_naissance'),
                    'adresse' => $this->input->post('adresse'),
                    'ville' => $this->input->post('ville'),
                    'code_postal' => $this->input->post('code_postal'),
                    'telephone' => $this->input->post('telephone'),
                    'civilite' => $this->input->post('civilite'),
                    'monoparental' => $this->input->post('monoparental'),
                    'livre' => $this->input->post('livre'),
                );


                if ($this->Beneficiaire_model->update($data,$id)) {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect('admin/beneficiaire', 'refresh');
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('admin/beneficiaire/edit/'.$id, 'refresh');
                }
            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        
        $this->data['civilite'] = array(
                'Mr.' => 'Mr.',
                'Mme' => 'Mme',
                'Mlle' => 'Mlle'
            );
        $this->data['oldcivilite'] = $beneficiaire['civilite'];

            $this->data['monoparental'] = array(
                '0' => 'Non',
                '1' => 'Oui'
            );
            $this->data['oldmonoparental'] = $beneficiaire['monoparental'];

            $this->data['livre'] = array(
                '0' => 'Non',
                '1' => 'Oui'
            );
            $this->data['oldlivre'] = $beneficiaire['livre'];

            $this->data['nom'] = array(
                'name' => 'nom',
                'id' => 'nom',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('nom',$beneficiaire['nom']),
            );
            $this->data['prenom'] = array(
                'name' => 'prenom',
                'id' => 'prenom',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('prenom',$beneficiaire['prenom']),
            );
            $this->data['nom_jeune_fille'] = array(
                'name' => 'nom_jeune_fille',
                'id' => 'nom_jeune_fille',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('nom_jeune_fille',$beneficiaire['nom_jeune_fille']),
            );


            $this->data['prenom_conjoint'] = array(
                'name' => 'prenom_conjoint',
                'id' => 'prenom_conjoint',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('prenom_conjoint',$beneficiaire['prenom_conjoint']),
            );
            
            $this->data['date_naissance'] = array(
                'name' => 'date_naissance',
                'id' => 'date_naissance',
                'type' => 'text',
                'placeholder' => 'Exemple : 2018-01-01',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('date_naissance',date_format(date_create($beneficiaire['date_naissance']), 'Y-m-d')),
            );

            $this->data['ville'] = array(
                'name' => 'ville',
                'id' => 'ville',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('ville',$beneficiaire['ville']),
            );

            $this->data['adresse'] = array(
                'name' => 'adresse',
                'id' => 'adresse',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('adresse',$beneficiaire['adresse']),
            );

            $this->data['telephone'] = array(
                'name' => 'telephone',
                'id' => 'telephone',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('telephone',$beneficiaire['telephone']),
            );

            $this->data['code_postal'] = array(
                'name' => 'code_postal',
                'id' => 'code_postal',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('code_postal',$beneficiaire['code_postal']),
            );            
            
            $this->data['beneficiaire'] = $beneficiaire;

        /* Load Template */
        $this->template->admin_render('admin/beneficiaire/edit', $this->data);
    }

    function activate($id, $code = FALSE) {
        $id = (int) $id;

        if ($code !== FALSE) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('admin/users', 'refresh');
        } else {
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect('auth/forgot_password', 'refresh');
        }
    }

    public function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin()) {
            return show_error('You must be an administrator to view this page.');
        }

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_users_deactivate'), 'admin/users/deactivate');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Validate form input */
        $this->form_validation->set_rules('confirm', 'lang:deactivate_validation_confirm_label', 'required');
        $this->form_validation->set_rules('id', 'lang:deactivate_validation_user_id_label', 'required|alpha_numeric');

        $id = (int) $id;

        if ($this->form_validation->run() === FALSE) {
            $user = $this->ion_auth->user($id)->row();

            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['id'] = (int) $user->id;
            $this->data['firstname'] = !empty($user->first_name) ? htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') : NULL;
            $this->data['lastname'] = !empty($user->last_name) ? ' ' . htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8') : NULL;

            /* Load Template */
            $this->template->admin_render('admin/users/deactivate', $this->data);
        } else {
            if ($this->input->post('confirm') == 'yes') {
                if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            redirect('admin/users', 'refresh');
        }
    }

    public function view($id) {
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Fiche détaillée', 'admin/beneficiaire/view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $id = (int) $id;
        $this->data['beneficiaire'] = $this->Beneficiaire_model->get_beneficiaire_by_id($id)[0];
        /* Load Template */
        $this->template->admin_render('admin/beneficiaire/view', $this->data);
    }

    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
