<div id="basketIndexAddVehicleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="basketIndexAddVehicleForm" action="<?= WEB_ROOT . '/panier/ajouter/vehicules' ?>" method="POST">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-1 control-label" for="quantity">Quantité :</label>
                        <div class="col-sm-4 input-group">
                            <input id="basketIndexAddVehiculeInputId" name="id" type="hidden" value="">
                            <input id="basketIndexAddVehiculeInputQuantity" name="quantity" type="number" min="0" class="form-control" value="1">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">Ajouter</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>