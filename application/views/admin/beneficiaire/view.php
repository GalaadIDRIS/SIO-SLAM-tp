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
                        <h3 class="box-title">Fiche détaillée</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <tbody>                                
                                <tr>
                                    <th>Civilite</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['civilite'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['nom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Prénom</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['prenom'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>                                            
                                <tr>
                                    <th>Nom de jeune fille</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['nom_jeune_fille'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Prénom du conjoint</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['prenom_conjoint'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Date de naissance</th>
                                    <td><?php echo date_format(date_create($beneficiaire['date_naissance']), 'd-m-Y'); ?></td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['adresse'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Ville</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['ville'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Code postal</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['code_postal'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td><?php echo htmlspecialchars($beneficiaire['telephone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <th>Monoparental</th>
                                    <td><?php echo ($beneficiaire['monoparental'] == 0) ? 'Non' : 'Oui'; ?></td>
                                </tr>
                                <tr>
                                    <th>Livré</th>
                                    <td><?php echo ($beneficiaire['livre'] == 0) ? 'Non' : 'Oui'; ?></td>
                                </tr>




                            </tbody>
                        </table>
                        <br>
                        <br>
                        <div class="col-lg-6">
                            <a href="<?php echo site_url('admin/beneficiaire/edit/' . $beneficiaire['id']); ?>"  class="btn btn-primary edit-info"><i class="glyphicon glyphicon-edit"></i> Modifier</a>
                        </div>
                        <div class="col-lg-6 pull-right text-right">
                            <a href="javascript:void(0)" onclick="javascript: create_invoice_edit(<?php echo $beneficiaire['id'] ?>);" class="btn btn-danger edit-info"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>

<script type="text/javascript">
                                function     create_invoice_edit(id)
                                {
                                    var base_url = '<?php echo base_url(); ?>';
                                    if (confirm("Voulez vous vraiment supprimer ce beneficiaire ?"))
                                    {
                                        window.location = base_url+'admin/beneficiaire/delete/'+id
                                    }

                                }
</script>
