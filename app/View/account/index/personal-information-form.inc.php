<!-- Get Form Errors -->
<?php $errors = \App\Helper\FormErrorHelper::display('personalInformationForm'); ?>

<!-- Title -->
<h4>Informations Personnelles :</h4>

<!-- Form -->
<form id="personalInformationForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte/change-informations">

    <!-- Last Name field -->
    <?php if (!isset($errors['last_name'])): ?>
        <div class="form-group">
            <label for="last_name" class="col-sm-3 control-label">Nom</label>
            <div class="col-sm-9">
                <input name="last_name" type="text" class="form-control" id="last_name" value="<?= $params['user']->getLastName(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="last_name" class="col-sm-3 control-label">Nom</label>
            <div class="col-sm-9">
                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="<?= $errors['last_name'][1] ?>" value="<?= $params['user']->getLastName(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- First Name field -->
    <?php if (!isset($errors['first_name'])): ?>
        <div class="form-group">
            <label for="first_name" class="col-sm-3 control-label">Prénom</label>
            <div class="col-sm-9">
                <input name="first_name" type="text" class="form-control" id="first_name" value="<?= $params['user']->getFirstName(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="first_name" class="col-sm-3 control-label">Prénom</label>
            <div class="col-sm-9">
                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="<?= $errors['first_name'][1] ?>" value="<?= $params['user']->getFIrstName(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Email field -->
    <?php if (!isset($errors['email'])): ?>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input name="email" type="email" class="form-control" id="email" value="<?= $params['user']->getEmail(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input name="email" type="email" class="form-control" id="email" placeholder="<?= $errors['email'][1] ?>" value="<?= $params['user']->getEmail(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Home Phone field -->
    <?php if (!isset($errors['home_phone'])): ?>
        <div class="form-group">
            <label for="home_phone" class="col-sm-3 control-label">Tel Fixe</label>
            <div class="col-sm-9">
                <input name="home_phone" type="text" maxlength="10" class="form-control" id="home_phone" value="<?= $params['user']->getHomePhone(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="home_phone" class="col-sm-3 control-label">Tel Fixe</label>
            <div class="col-sm-9">
                <input name="home_phone" type="text" maxlength="10" class="form-control" id="home_phone" placeholder="<?= $errors['home_phone'][1] ?>" value="<?= $params['user']->getHomePhone(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Cell Phone field -->
    <?php if (!isset($errors['cell_phone'])): ?>
        <div class="form-group">
            <label for="cell_phone" class="col-sm-3 control-label">Tel Portable</label>
            <div class="col-sm-9">
                <input name="cell_phone" type="text" maxlength="10" class="form-control" id="cell_phone" value="<?= $params['user']->getCellPhone(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="cell_phone" class="col-sm-3 control-label">Tel Portable</label>
            <div class="col-sm-9">
                <input name="cell_phone" type="text" maxlength="10" class="form-control" id="cell_phone" placeholder="<?= $errors['cell_phone'][1] ?>" value="<?= $params['user']->getCellPhone(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Address field -->
    <?php if (!isset($errors['address'])): ?>
        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Adresse</label>
            <div class="col-sm-9">
                <input name="address" type="text" class="form-control" id="address" value="<?= $params['user']->getAddress(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="address" class="col-sm-3 control-label">Adresse</label>
            <div class="col-sm-9">
                <input name="address" type="text" class="form-control" id="address" placeholder="<?= $errors['address'][1] ?>" value="<?= $params['user']->getAddress(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Zip Code field -->
    <?php if (!isset($errors['zip_code'])): ?>
        <div class="form-group">
            <label for="zip_code" class="col-sm-3 control-label">Code Postal</label>
            <div class="col-sm-9">
                <input name="zip_code" type="text" maxlength="10" class="form-control" id="zip_code" value="<?= $params['user']->getZipCode(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="zip_code" class="col-sm-3 control-label">Code Postal</label>
            <div class="col-sm-9">
                <input name="zip_code" type="text" maxlength="10" class="form-control" id="zip_code" placeholder="<?= $errors['zip_code'][1] ?>" value="<?= $params['user']->getZipCode(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- City field -->
    <?php if (!isset($errors['city'])): ?>
        <div class="form-group">
            <label for="city" class="col-sm-3 control-label">Ville</label>
            <div class="col-sm-9">
                <input name="city" type="text" class="form-control" id="city" value="<?= $params['user']->getCity(); ?>">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="city" class="col-sm-3 control-label">Ville</label>
            <div class="col-sm-9">
                <input name="city" type="text" class="form-control" id="city" placeholder="<?= $errors['city'][1] ?>" value="<?= $params['user']->getCity(); ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($params['user']->isProfessional()): ?>

        <!-- Company Name field -->
        <?php if (!isset($errors['company_name'])): ?>
            <div class="form-group">
                <label for="company_name" class="col-sm-3 control-label">Nom de la Société</label>
                <div class="col-sm-9">
                    <input name="company_name" type="text" class="form-control" id="company_name" value="<?= $params['user']->getCompanyName(); ?>">
                </div>
            </div>
        <?php else: ?>
            <div class="form-group has-error has-feedback">
                <label for="company_name" class="col-sm-3 control-label">Nom de la Société</label>
                <div class="col-sm-9">
                    <input name="company_name" type="text" class="form-control" id="company_name" placeholder="<?= $errors['company_name'][1] ?>" value="<?= $params['user']->getCompanyName(); ?>">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Company Phone field -->
        <?php if (!isset($errors['company_phone'])): ?>
            <div class="form-group">
                <label for="company_phone" class="col-sm-3 control-label">Tel de la Société</label>
                <div class="col-sm-9">
                    <input name="company_phone" type="company_phone" maxlength="10" class="form-control" id="company_phone" value="<?= $params['user']->getCompanyPhone(); ?>">
                </div>
            </div>
        <?php else: ?>
            <div class="form-group has-error has-feedback">
                <label for="company_phone" class="col-sm-3 control-label">Tel de la Société</label>
                <div class="col-sm-9">
                    <input name="company_phone" type="company_phone" maxlength="10" class="form-control" id="company_phone" placeholder="<?= $errors['company_phone'][1] ?>" value="<?= $params['user']->getCompanyPhone(); ?>">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Company Website field -->
        <?php if (!isset($errors['company_website'])): ?>
            <div class="form-group">
                <label for="company_website" class="col-sm-3 control-label">Site WEB de la Société</label>
                <div class="col-sm-9">
                    <input name="company_website" type="text" class="form-control" id="company_website" value="<?= $params['user']->getCompanyWebsite(); ?>">
                </div>
            </div>
        <?php else: ?>
            <div class="form-group has-error has-feedback">
                <label for="company_website" class="col-sm-3 control-label">Site WEB de la Société</label>
                <div class="col-sm-9">
                    <input name="company_website" type="text" class="form-control" id="company_website" placeholder="<?= $errors['company_website'][1] ?>" value="<?= $params['user']->getCompanyWebsite(); ?>">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                </div>
            </div>
        <?php endif; ?>

        <!-- Company Email field -->
        <?php if (!isset($errors['company_email'])): ?>
            <div class="form-group">
                <label for="company_email" class="col-sm-3 control-label">Email de la Société</label>
                <div class="col-sm-9">
                    <input name="company_email" type="email" class="form-control" id="company_email" value="<?= $params['user']->getCompanyEmail(); ?>">
                </div>
            </div>
        <?php else: ?>
            <div class="form-group has-error has-feedback">
                <label for="company_email" class="col-sm-3 control-label">Email de la Société</label>
                <div class="col-sm-9">
                    <input name="company_email" type="email" class="form-control" id="company_email" placeholder="<?= $errors['company_email'][1] ?>" value="<?= $params['user']->getCompanyEmail(); ?>">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <!-- Submit button -->
    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>

</form>