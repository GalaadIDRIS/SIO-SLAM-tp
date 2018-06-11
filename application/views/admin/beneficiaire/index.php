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
                        <h3 class="box-title"><?php echo anchor('admin/beneficiaire/create', '<i class="fa fa-plus"></i> Nouveau', array('class' => 'btn btn-block btn-primary btn-flat')); ?></h3>
                    </div>
                    <div class="box-body">
                        <table id="beneficiaire_table" class="table table-striped table-bordered noDataTable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle">Civilite</th>
                                    <th style="text-align: center;vertical-align: middle">Nom et Prenom</th>
                                    <th style="text-align: center;vertical-align: middle">Nom de jeune <br> fille</th>
                                    <th style="text-align: center;vertical-align: middle">Prenom <br> conjoint</th>
                                    <th style="text-align: center;vertical-align: middle">Date de <br> naissance</th>
                                    <th style="text-align: center;vertical-align: middle">Adresse</th>
                                    <th style="text-align: center;vertical-align: middle">Ville</th>
                                    <th style="text-align: center;vertical-align: middle">Code Postal</th>
                                    <th style="text-align: center;vertical-align: middle">Telephone</th>
                                    <th style="text-align: center;vertical-align: middle">Monoparental</th>
                                    <th style="text-align: center;vertical-align: middle">Livré</th>
                                    <th style="text-align: center;vertical-align: middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($beneficiaire as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user['civilite'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['nom'], ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($user['prenom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['nom_jeune_fille'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['prenom_conjoint'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo date_format(date_create($user['date_naissance']), 'd-m-Y'); ?></td>
                                        <td><?php echo htmlspecialchars($user['adresse'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['ville'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['code_postal'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($user['telephone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo ($user['monoparental'] == 0) ? 'Non' : 'Oui'; ?></td>
                                        <td><?php echo ($user['livre'] == 0) ? 'Non' : 'Oui'; ?></td>
                                        <td>
                                            <?php echo anchor('admin/beneficiaire/view/' . $user['id'], '<button type="button" title="Fiche détaillée" class="btn btn-labeled btn-xs btn-warning"><span class="btn-label"><i class="fa fa-eye"></i></span></button>') ?> &nbsp;
                                            <?php // echo anchor('admin/users/profile/' . $user->id, '<button type="button" title="Afficher" class="btn btn-labeled btn-xs btn-success"><span class="btn-label"><i class="fa fa-eye"></i></span></button>') ?> &nbsp;
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;vertical-align: middle">Civilite</th>
                                    <th style="text-align: center;vertical-align: middle">Nom et Prenom</th>
                                    <th style="text-align: center;vertical-align: middle">Nom de jeune <br> fille</th>
                                    <th style="text-align: center;vertical-align: middle">Prenom <br> conjoint</th>
                                    <th style="text-align: center;vertical-align: middle">Date de <br> naissance</th>
                                    <th style="text-align: center;vertical-align: middle">Adresse</th>
                                    <th style="text-align: center;vertical-align: middle">Ville</th>
                                    <th style="text-align: center;vertical-align: middle">Code Postal</th>
                                    <th style="text-align: center;vertical-align: middle">Telephone</th>
                                    <th style="text-align: center;vertical-align: middle">Monoparental</th>
                                    <th style="text-align: center;vertical-align: middle">Livré</th>
                                    <td style="text-align: center;vertical-align: middle"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $('#beneficiaire_table tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" style="width:100%" />');
    });
    var table = $('#beneficiaire_table').DataTable();
    table.columns().every(function () {
        var t = this;
        $('input', this.footer()).on('keyup change', function () {
            if (t.search() !== this.value) {
                t
                        .search(this.value)
                        .draw();
            }
        });
    }
    );

</script>

