<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <h2>Paramètres du compte :</h2>
            </div>
            <div class="col-md-3 col-xs-12">
                <h2><?= $_SESSION['auth']['last_name'] ?> <?= $_SESSION['auth']['first_name'] ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <h4>Image de Profil :</h4>
                    <img id="profile-thumbnail" class="img-thumbnail" src="<?= WEB_ROOT . $params['user']->getProfilePic(); ?>">
                    <form id="profilePicForm" class="form-horizontal" method="POST">
                        <br>
                        <div class="input-group">
                            <span for="profile_pic" class="input-group-btn">
                                <label for="profile_pic" class="btn btn-success" type="button">Parcourir...</label>
                            </span>
                            <input type="file" id="profile_pic" name="profile_pic" class="hidden">
                            <input id="profile_pic_text" type="text" class="form-control">
                        </div>
                        <br>
                        <div class="progress">
                            <div
                                    id="profile-pic-progress-bar"
                                    class="progress-bar progress-bar-info"
                                    role="progressbar"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: 0%;"
                            ></div>
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Documents :</h4>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <h4>Informations Personnelles :</h4>
                    <form id="personalForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte">
                        <div class="form-group">
                            <label for="last_name" class="col-sm-3 control-label">Nom</label>
                            <div class="col-sm-9">
                                <input name="last_name" type="text" class="form-control" id="last_name" value="<?= $params['user']->getLastName(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-sm-3 control-label">Prénom</label>
                            <div class="col-sm-9">
                                <input name="first_name" type="text" class="form-control" id="first_name" value="<?= $params['user']->getFirstName(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input name="email" type="email" class="form-control" id="email" value="<?= $params['user']->getEmail(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="home_phone" class="col-sm-3 control-label">Tel Fixe</label>
                            <div class="col-sm-9">
                                <input name="home_phone" type="text" maxlength="10" class="form-control" id="home_phone" value="<?= $params['user']->getHomePhone(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cell_phone" class="col-sm-3 control-label">Tel Portable</label>
                            <div class="col-sm-9">
                                <input name="cell_phone" type="text" maxlength="10" class="form-control" id="cell_phone" value="<?= $params['user']->getCellPhone(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Adresse</label>
                            <div class="col-sm-9">
                                <input name="address" type="text" class="form-control" id="address" value="<?= $params['user']->getAddress(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zipcode" class="col-sm-3 control-label">Code Postal</label>
                            <div class="col-sm-9">
                                <input name="zipcode" type="text" class="form-control" id="zipcode" value="<?= $params['user']->getZipcode(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-3 control-label">Ville</label>
                            <div class="col-sm-9">
                                <input name="city" type="text" class="form-control" id="ville" value="<?= $params['user']->getCity(); ?>">
                            </div>
                        </div>
                        <?php if ($params['user']->isProfessional()): ?>
                            <div class="form-group">
                                <label for="company_name" class="col-sm-3 control-label">Nom de la Société</label>
                                <div class="col-sm-9">
                                    <input name="company_name" type="text" class="form-control" id="company_name" value="<?= $params['user']->getCompanyName(); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_phone" class="col-sm-3 control-label">Tel de la Société</label>
                                <div class="col-sm-9">
                                    <input name="company_phone" type="text" maxlength="10" class="form-control" id="company_phone" value="<?= $params['user']->getCompanyPhone(); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_website" class="col-sm-3 control-label">Site WEB de la Société</label>
                                <div class="col-sm-9">
                                    <input name="company_website" type="text" class="form-control" id="company_website" value="<?= $params['user']->getCompanyWebsite(); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_email" class="col-sm-3 control-label">Email de la Société</label>
                                <div class="col-sm-9">
                                    <input name="company_email" type="email" class="form-control" id="company_email" value="<?= $params['user']->getCompanyEmail(); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Changement de Mot de Passe :</h4>
                    <form id="personalForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Mot de Passe Actuel</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-sm-3 control-label">Nouveau Mot de Passe</label>
                            <div class="col-sm-9">
                                <input name="new_password" type="password" class="form-control" id="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="renew_password" class="col-sm-3 control-label">Confirmation</label>
                            <div class="col-sm-9">
                                <input name="renew_password" type="password" class="form-control" id="renew_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>