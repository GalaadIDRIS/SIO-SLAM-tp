<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?php if ($admin_prefs['user_panel'] == TRUE): ?>
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $user_login['firstname'] . $user_login['lastname']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                </div>
            </div>

        <?php endif; ?>
        <?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
            <!-- Search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>

        <?php endif; ?>
        <!-- Sidebar menu -->
        <ul class="sidebar-menu">


            <li class="<?= active_link_controller('dashboard') ?>">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                </a>
            </li>

            <?php if (!$is_admin): ?>
                <li class="<?= active_link_controller('beneficiaire') ?>">
                    <a href="<?php echo site_url('admin/beneficiaire'); ?>">
                        <i class="fa fa-group"></i> <span>Benéficiaire</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($is_admin): ?>
                <li class="<?= active_link_controller('users') ?>">
                    <a href="<?php echo site_url('admin/users'); ?>">
                        <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($is_admin): ?>
                <li class="<?= active_link_controller('groups') ?>">
                    <a href="<?php echo site_url('admin/groups'); ?>">
                        <i class="fa fa-shield"></i> <span>Profils utilisateurs</span>
                    </a>
                </li>
            <?php endif; ?>
                
            <li class="<?= active_link_controller('files') ?>">
                <a href="<?php echo site_url('admin/files'); ?>">
                    <i class="fa fa-file"></i> <span><?php echo lang('menu_files'); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>
