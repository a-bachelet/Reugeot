<div class="row">

    <div class="col-md-12">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-road"></span>&nbsp;&nbsp;&nbsp;Véhicules : <strong>Ajouter</strong>
                </h3>
            </div>

            <div class="panel-body">
                <form id="vehicleForm" action="#" method="POST" class="form-horizontal">
                    <div class="row">

                        <div class="col-md-4 col-xs-12">

                            <h5>Photo du véhicule :</h5>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <label for="vehicle_pic" class="btn btn-success" type="button">Parcourir...</label>
                                </span>
                                <input type="file" id="vehicle_pic" name="vehicle_pic" class="hidden">
                                <input id="vehicle_pic_text" type="text" class="form-control">
                            </div>
                            <br/>
                            <div class="progress">
                                <div
                                        id="vehicle-pic-progress-bar"
                                        class="progress-bar progress-bar-info"
                                        role="progressbar"
                                        aria-valuenow="0"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                        style="width: 0%;"
                                ></div>
                            </div>

                        </div>

                        <div class="col-md-8 col-xs-12">

                            <div class="form-group">
                                <label for="model" class="col-sm-3 control-label">Modèle :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="model" name="model" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_category" class="col-sm-3 control-label">Catégorie :</label>
                                <div class="col-sm-9">
                                    <select id="vehicle_category" name="vehicle_category" class="form-control">
                                        <?php foreach ($params['categories'] as $category): ?>
                                            <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="vehicle_category" class="col-sm-3 control-label">Marque :</label>
                                <div class="col-sm-9">
                                    <select id="vehicle_brand" name="vehicle_brand" class="form-control">
                                        <?php foreach ($params['brands'] as $brand): ?>
                                            <option value="<?= $brand->getId(); ?>"><?= $brand->getName(); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price_without_taxes" class="col-sm-3 control-label">Prix HT :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="price_without_taxes" name="price_without_taxes" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input id="professional" name="professional" type="checkbox"> Professionnel
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input id="active" name="active" type="checkbox"> Actif
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

            <div class="panel-footer">

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-success pull-right" type="submit" form="vehicleForm">Ajouter</button>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>