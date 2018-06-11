<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modification Bénéficiaire</h3>
                    </div>
                    <div class="box-body">
                        <?php echo $message; ?>

                        <?php echo form_open(uri_string(), array('class' => 'form-horizontal', 'id' => 'form-edit_beneficiaire')); ?>
                        <div class="form-group">
                            <?php echo '<label for="users_firstname" class="col-sm-2 control-label" >Civilite</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('civilite', $civilite, $oldcivilite, ' class="form-control" id="civilite" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Nom</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($nom); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Prenom</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($prenom); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="username" class="col-sm-2 control-label" >Nom de jeune fille </label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($nom_jeune_fille); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Prenom conjoint</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($prenom_conjoint); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Date de naissance</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($date_naissance); ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Adresse</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($adresse); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Ville</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($ville); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Code postal</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($code_postal); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Telephone</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_input($telephone); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Monoparental</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('monoparental', $monoparental, $oldmonoparental, ' class="form-control" id="monoparental" '); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Livré</label>'; ?>
                            <div class="col-sm-6">
                                <?php echo form_dropdown('livre', $livre, $oldlivre, ' class="form-control" id="livre" '); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php echo form_hidden('id', $beneficiaire['id']); ?>
                                <?php echo form_hidden($csrf); ?>
                                <div class="btn-group">
                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => 'Enregistrer')); ?>
                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                    <?php echo anchor('admin/beneficiaire/view/'.$beneficiaire['id'], lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
