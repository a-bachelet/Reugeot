<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Utilisateurs - Détails : <strong><?= $params['user']->getLastName() . ' ' . $params['user']->getFirstName() ?></strong>
                </h3>
            </div>

            <div class="panel-body">

                <div class="col-md-3 col-xs-12">
                    <?php if (is_file(FOLDER_ROOT . '/web' . $params['user']->getProfilePic())): ?>
                        <img class="img-circle" src="<?= WEB_ROOT . $params['user']->getProfilePic(); ?>" alt="">
                    <?php else: ?>
                        <img class="img-circle" src="<?= WEB_ROOT . '/uploads/profile_pics/nopic.png' ?>" alt="">
                    <?php endif; ?>
                </div>

                <div class="col-md-9 col-xs-12">
                    <h3>Informations :</h3>
                    <table class="table table-striped panel-table">
                        <tr>
                            <td>Nom :</td>
                            <td><?= $params['user']->getLastName(); ?></td>
                        </tr>
                        <tr>
                            <td>Prénom :</td>
                            <td><?= $params['user']->getFirstName(); ?></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><?= $params['user']->getEmail(); ?></td>
                        </tr>
                        <tr>
                            <td>Rôle :</td>
                            <td><?= $params['user']->getRole()->getName(); ?></td>
                        </tr>
                        <tr>
                            <td>Tel Fixe :</td>
                            <td><?= $params['user']->getHomePhone(); ?></td>
                        </tr>
                        <tr>
                            <td>Tel Portable :</td>
                            <td><?= $params['user']->getCellPhone(); ?></td>
                        </tr>
                        <tr>
                            <td>Adresse :</td>
                            <td><?= $params['user']->getAddress(); ?></td>
                        </tr>
                        <tr>
                            <td>Code Postal :</td>
                            <td><?= $params['user']->getZipCode(); ?></td>
                        </tr>
                        <tr>
                            <td>Ville :</td>
                            <td><?= $params['user']->getCity(); ?></td>
                        </tr>
                        <tr>
                            <td>Professionel :</td>
                            <td><?php if ($params['user']->isProfessional()) {echo 'Oui';} else {echo 'Non';} ?></td>
                        </tr>
                        <?php if ($params['user']->isProfessional()): ?>
                            <tr>
                                <td>Nom de la Société :</td>
                                <td><?= $params['user']->getCompanyName(); ?></td>
                            </tr>
                            <tr>
                                <td>Email de la Société :</td>
                                <td><?= $params['user']->getCompanyEmail(); ?></td>
                            </tr>
                            <tr>
                                <td>Tel de la Société :</td>
                                <td><?= $params['user']->getCompanyPhone(); ?></td>
                            </tr>
                            <tr>
                                <td>Site WEB de la Société :</td>
                                <td><?= $params['user']->getCompanyWebsite(); ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>

            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <a class="btn btn-danger btn-sm pull-right" href="<?= WEB_ROOT . '/administration/utilisateurs/' . $params['user']->getId() . '/supprimer' ?>">Supprimer</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>