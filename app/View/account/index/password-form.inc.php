<h4>Changement de Mot de Passe :</h4>
<form id="personalForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/mon-compte/change-mot-de-passe">
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