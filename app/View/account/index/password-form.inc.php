<!-- Get Form Errors -->
<?php $errors = \App\Helper\FormErrorHelper::display('passwordForm'); ?>

<!-- Title -->
<h4>Changement de Mot de Passe :</h4>

<!-- Form -->
<form id="passwordForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte/change-mot-de-passe">

    <!-- Password field -->
    <?php if (!isset($errors['password'])): ?>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Mot de Passe Actuel</label>
            <div class="col-sm-9">
                <input name="password" type="password" class="form-control" id="password">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="password" class="col-sm-3 control-label">Mot de Passe Actuel</label>
            <div class="col-sm-9">
                <input name="password" type="password" class="form-control" id="password" placeholder="<?= $errors['password'][1] ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- New Password field -->
    <?php if (!isset($errors['new_password'])): ?>
        <div class="form-group">
            <label for="new_password" class="col-sm-3 control-label">Nouveau Mot de Passe</label>
            <div class="col-sm-9">
                <input name="new_password" type="password" class="form-control" id="new_password">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="new_password" class="col-sm-3 control-label">Nouveau Mot de Passe</label>
            <div class="col-sm-9">
                <input name="new_password" type="password" class="form-control" id="new_password" placeholder="<?= $errors['new_password'][1] ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- New Password Repeat field -->
    <?php if (!isset($errors['new_password_repeat'])): ?>
        <div class="form-group">
            <label for="new_password_repeat" class="col-sm-3 control-label">Confirmation</label>
            <div class="col-sm-9">
                <input name="new_password_repeat" type="password" class="form-control" id="new_password_repeat">
            </div>
        </div>
    <?php else: ?>
        <div class="form-group has-error has-feedback">
            <label for="new_password_repeat" class="col-sm-3 control-label">Confirmation</label>
            <div class="col-sm-9">
                <input name="new_password_repeat" type="password" class="form-control" id="new_password_repeat" placeholder="<?= $errors['new_password_repeat'][1] ?>">
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
        </div>
    <?php endif; ?>

    <!-- Submit button -->
    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>

</form>