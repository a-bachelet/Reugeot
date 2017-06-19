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