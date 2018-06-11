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
                        <h3 class="box-title">Informations sur l'utilisateur</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <?php foreach ($user_info as $user): ?>

                                    <tr>
                                        <th><?php echo lang('users_firstname'); ?></th>
                                        <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lang('users_lastname'); ?></th>
                                        <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lang('users_username'); ?></th>
                                        <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>                                            
                                    <tr>
                                        <th><?php echo lang('users_created_on'); ?></th>
                                        <td><?php echo date('d-m-Y', $user->created_on); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lang('users_last_login'); ?></th>
                                        <td><?php echo (!empty($user->last_login)) ? date('d-m-Y', $user->last_login) : NULL; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lang('users_status'); ?></th>
                                        <td><?php echo ($user->active) ? '<span class="label label-success">' . lang('users_active') . '</span>' : '<span class="label label-default">' . lang('users_inactive') . '</span>'; ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lang('users_groups'); ?></th>
                                        <td>
                                            <?php foreach ($user->groups as $group): ?>
                                            
                                                <?php
                                                echo '<span class="label label-default" >' . htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8') . '</span> &nbsp;'; ?>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
