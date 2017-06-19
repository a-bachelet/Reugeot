<!-- Title -->
<h4>Changement de Mot de Passe :</h4>

<!-- Form -->
<form id="passwordForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte/change-mot-de-passe">

    <!-- Password field -->
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Mot de Passe Actuel</label>
        <div class="col-sm-9">
            <input name="password" type="password" class="form-control" id="password">
        </div>
    </div>

    <!-- New Password field -->
    <div class="form-group">
        <label for="new_password" class="col-sm-3 control-label">Nouveau Mot de Passe</label>
        <div class="col-sm-9">
            <input name="new_password" type="password" class="form-control" id="new_password">
        </div>
    </div>

    <!-- New Password Repeat field -->
    <div class="form-group">
        <label for="new_password_repeat" class="col-sm-3 control-label">Confirmation</label>
        <div class="col-sm-9">
            <input name="new_password_repeat" type="password" class="form-control" id="new_password_repeat">
        </div>
    </div>

    <!-- Submit button -->
    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </div>

</form>