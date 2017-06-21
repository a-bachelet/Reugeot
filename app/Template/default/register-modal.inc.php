<!-- Register Modal -->
<div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">S'inscrire :</h4>
            </div>
            <div class="modal-body">

                <!-- Form -->
                <form id="registerForm" class="form-horizontal" method="POST" action="<?= WEB_ROOT; ?>/inscription">

                    <!-- First Name field -->
                    <div class="form-group">
                        <label for="first_name" class="col-sm-3 control-label">Prénom</label>
                        <div class="col-sm-9">
                            <input name="first_name" type="text" class="form-control" id="first_name" placeholder="">
                        </div>
                    </div>

                    <!-- Last Name field -->
                    <div class="form-group">
                        <label for="last_name" class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="">
                        </div>
                    </div>

                    <!-- Email field -->
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" id="email" placeholder="">
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Mot de Passe</label>
                        <div class="col-sm-9">
                            <input name="password" type="password" class="form-control" id="password" placeholder="">
                        </div>
                    </div>

                    <!-- Password Repeat field -->
                    <div class="form-group">
                        <label for="password_repeat" class="col-sm-3 control-label">Confirmation du Mot de Passe</label>
                        <div class="col-sm-9">
                            <input name="password_repeat" type="password" class="form-control" id="password_repeat" placeholder="">
                        </div>
                    </div>

                    <!-- Home Phone field -->
                    <div class="form-group">
                        <label for="home_phone" class="col-sm-3 control-label">Tel Fixe</label>
                        <div class="col-sm-9">
                            <input name="home_phone" type="text" maxlength="10" class="form-control" id="home_phone" placeholder="">
                        </div>
                    </div>

                    <!-- Cell Phone field -->
                    <div class="form-group">
                        <label for="cell_phone" class="col-sm-3 control-label">Tel Portable</label>
                        <div class="col-sm-9">
                            <input name="cell_phone" type="text" maxlength="10" class="form-control" id="cell_phone" placeholder="">
                        </div>
                    </div>

                    <!-- Address field -->
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-9">
                            <input name="address" type="text" class="form-control" id="address" placeholder="">
                        </div>
                    </div>

                    <!-- Zip Code field -->
                    <div class="form-group">
                        <label for="zip_code" class="col-sm-3 control-label">Code Postal</label>
                        <div class="col-sm-9">
                            <input name="zip_code" type="text" maxlength="5" class="form-control" id="zip_code" placeholder="">
                        </div>
                    </div>

                    <!-- City field -->
                    <div class="form-group">
                        <label for="city" class="col-sm-3 control-label">Ville</label>
                        <div class="col-sm-9">
                            <input name="city" type="text" class="form-control" id="city" placeholder="">
                        </div>
                    </div>

                    <!-- Professional checkbox -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label for="professional">
                                    <input name="professional" type="hidden" value="'off'">
                                    <input id="professional" name="professional" type="checkbox"> Professionnel
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Company Name field -->
                    <div class="form-group company_fg">
                        <label for="company_name" class="col-sm-3 control-label">Nom de la Société</label>
                        <div class="col-sm-9">
                            <input name="company_name" type="text" class="form-control" id="company_name" placeholder="">
                        </div>
                    </div>

                    <!-- Company Phone field -->
                    <div class="form-group company_fg">
                        <label for="company_phone" class="col-sm-3 control-label">Tel de la Société</label>
                        <div class="col-sm-9">
                            <input name="company_phone" type="text" maxlength="10" class="form-control" id="company_phone" placeholder="">
                        </div>
                    </div>

                    <!-- Company Website field -->
                    <div class="form-group company_fg">
                        <label for="company_website" class="col-sm-3 control-label">Site WEB de la Société</label>
                        <div class="col-sm-9">
                            <input name="company_website" type="text" class="form-control" id="company_website" placeholder="">
                        </div>
                    </div>

                    <!-- Company Email field -->
                    <div class="form-group company_fg">
                        <label for="company_email" class="col-sm-3 control-label">Email de la Société</label>
                        <div class="col-sm-9">
                            <input name="company_email" type="email" class="form-control" id="company_email" placeholder="">
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="registerForm">Envoyer</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>