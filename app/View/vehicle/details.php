<div class="container">
    <div class="row">
        <div class="col-md-12">

            <br/>

            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8 col-xs-8" style="height:30px;line-height:30px;">
                            <h3 style="height:30px;line-height:30px;" class="panel-title">Véhicule : <strong><?= $params['vehicle']->getModel(); ?></strong></h3>
                        </div>
                        <div class="col-md-4 col-xs-4" style="height:30px;line-height:30px;">
                            <button class="btn btn-danger btn-sm pull-right" onclick="window.history.go(-1); return false;" type="button">Retour</button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="col-md-4 text-center">
                        <img class="img-thumbnail img-circle" src="<?= WEB_ROOT . $params['vehicle']->getVehiclePicture(); ?>" alt="">
                    </div>

                    <div class="col-md-8">
                        <h3>Informations :</h3>
                        <table class="table table-striped panel-table">
                            <tr>
                                <td>Modèle :</td>
                                <td><?= $params['vehicle']->getModel(); ?></td>
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
                        <div class="col-md-12">
                            <button class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;&nbsp; Ajouter au Panier</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>