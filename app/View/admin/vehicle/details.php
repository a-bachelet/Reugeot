<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;&nbsp;Véhicules - Détails : <strong><?= utf8_encode($params['vehicle']->getModel()); ?></strong>
                </h3>
            </div>

            <div class="panel-body">

                <div class="col-md-3 col-xs-12">
                    <?php if (is_file(FOLDER_ROOT . '/web' . $params['vehicle']->getVehiclePicture())): ?>
                        <img class="img-circle" src="<?= WEB_ROOT . $params['user']->getVehiclePicture(); ?>" alt="">
                    <?php else: ?>
                        <img class="img-circle" src="<?= WEB_ROOT . '/uploads/profile_pics/nopic.png' ?>" alt="">
                    <?php endif; ?>
                </div>

                <div class="col-md-9 col-xs-12">
                    <h3>Informations :</h3>
                    <table class="table table-striped panel-table">
                        <tr>
                            <td>Modèle :</td>
                            <td><?= utf8_encode($params['vehicle']->getModel()); ?></td>
                        </tr>
                        <tr>
                            <td>Catégorie :</td>
                            <td><?= $params['vehicle']->getVehicleCategory()->getName(); ?></td>
                        </tr>
                        <tr>
                            <td>Marque :</td>
                            <td><?= $params['vehicle']->getVehicleBrand()->getName(); ?></td>
                        </tr>
                        <tr>
                            <td>Prix HT :</td>
                            <td><?= $params['vehicle']->getPriceWithoutTaxes() . ' €'; ?></td>
                        </tr>
                        <tr>
                            <td>Prix TTC :</td>
                            <td><?= $params['vehicle']->getPriceWithTaxes() . ' €'; ?></td>
                        </tr>
                        <tr>
                            <td>Professionel :</td>
                            <td>
                                <?php if ($params['vehicle']->isProfessional()) {echo 'Oui';} else {echo 'Non';} ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Actif :</td>
                            <td>
                                <?php if ($params['vehicle']->isActive()) {echo 'Oui';} else {echo 'Non';} ?>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-5 col-md-offset-7">
                        <a class="btn btn-danger btn-sm pull-right" href="<?= WEB_ROOT . '/administration/vehicules/' . $params['vehicle']->getId() . '/supprimer' ?>">Supprimer</a>
                        <a class="btn btn-warning btn-sm pull-right" href="<?= WEB_ROOT . '/administration/vehicules/' . $params['vehicle']->getId() . '/editer' ?>" style="margin-right: 5px;">Editer</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>