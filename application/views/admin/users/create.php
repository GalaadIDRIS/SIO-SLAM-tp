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
                                    <h3 class="box-title">Nouveau utilisateur</h3>
                                </div>
                                <div class="box-body">
                                    <?php echo $message;?>

                                    <?php echo form_open(current_url(), array('class' => 'form-horizontal', 'id' => 'form-create_user')); ?>
                                        <div class="form-group">
                                            <?php echo '<label for="users_firstname" class="col-sm-2 control-label" >Prenom</label>'; ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($first_name);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo '<label for="users_lastname" class="col-sm-2 control-label" >Nom</label>'; ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($last_name);?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <?php echo '<label for="username" class="col-sm-2 control-label" >Nom d\'utilisateur</label>'; ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($username);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo '<label for="users_password" class="col-sm-2 control-label" >Mot de passe</label>'; ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password);?>
                                                <div class="progress" style="margin:0">
                                                    <div class="pwstrength_viewport_progress"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php echo '<label for="users_password_confirm" class="col-sm-2 control-label" >Confirmation mot de passe</label>'; ?>
                                            <div class="col-sm-10">
                                                <?php echo form_input($password_confirm);?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="btn-group">
                                                    <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-primary btn-flat', 'content' => lang('actions_submit'))); ?>
                                                    <?php echo form_button(array('type' => 'reset', 'class' => 'btn btn-warning btn-flat', 'content' => lang('actions_reset'))); ?>
                                                    <?php echo anchor('admin/users', lang('actions_cancel'), array('class' => 'btn btn-default btn-flat')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
