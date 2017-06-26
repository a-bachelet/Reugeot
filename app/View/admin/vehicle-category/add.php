<?php $errors = \App\Helper\FormErrorHelper::display('vehicleCategoryForm'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;&nbsp;Catégories : <strong>Ajouter</strong>
                </h3>
            </div>

            <div class="panel-body">

                <div class="row">

                    <form id="vehicleCategoryForm" class="form-horizontal" action="#" method="POST">

                        <?php if (!isset($errors['name'])): ?>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Nom :</label>
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form-group has-error has-feedback">
                                <label for="name" class="col-sm-3 control-label">Nom :</label>
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="<?= $errors['name'][1] ?>">
                                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                </div>
                            </div>
                        <?php endif; ?>

                    </form>

                </div>

            </div>

            <div class="panel-footer">

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-success pull-right" type="submit" form="vehicleCategoryForm">Ajouter</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>