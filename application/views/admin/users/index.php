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
                        <h3 class="box-title"><?php echo anchor('admin/users/create', '<i class="fa fa-plus"></i> Nouveau', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>Profils</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php
                                            foreach ($user->groups as $group) {

                                                // Disabled temporary !!!
                                                // echo anchor('admin/groups/edit/'.$group->id, '<span class="label" style="background:'.$group->bgcolor.';">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>');
                                                echo anchor('admin/groups/edit/' . $group->id, '<span class="label label-default">' . htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8') . '</span>').'&nbsp;';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo ($user->active) ? anchor('admin/users/deactivate/' . $user->id, '<span class="label label-success">' . lang('users_active') . '</span>') : anchor('admin/users/activate/' . $user->id, '<span class="label label-default">' . lang('users_inactive') . '</span>'); ?></td>
                                        <td>
                                            <?php echo anchor('admin/users/edit/' . $user->id, '<button type="button" title="Modifier" class="btn btn-labeled btn-xs btn-warning"><span class="btn-label"><i class="fa fa-edit"></i></span></button>') ?> &nbsp;
                                            <?php echo anchor('admin/users/profile/' . $user->id, '<button type="button" title="Afficher" class="btn btn-labeled btn-xs btn-success"><span class="btn-label"><i class="fa fa-eye"></i></span></button>') ?> &nbsp;
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
