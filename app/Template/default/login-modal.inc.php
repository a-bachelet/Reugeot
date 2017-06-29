<!-- Login Modal -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Connexion :</h4>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/connexion">
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Mot de Passe</label>
                        <div class="col-sm-9">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Mot de Passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="hidden" value="'off'">
                                    <input name="remember" type="checkbox"> Se souvenir de moi
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" form="loginForm">Connexion</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>