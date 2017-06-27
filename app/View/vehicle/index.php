<div class="container">
    <div class="row">
        <div class="col-md-12">

            <br/>

            <?php $count = 1; ?>

            <?php foreach ($params['vehicles'] as $vehicle) : ?>

                <?php if ($count === 3): ?>
                    <div class="row">
                <?php endif; ?>

                    <div class="col-md-4 col-sm-6 col-xs-12">

                        <div class="panel panel-primary">

                            <div class="panel-heading text-center">
                                <h3 class="panel-title"><?= $vehicle->getModel(); ?></h3>
                            </div>

                            <div class="panel-body text-center">
                                <img src="<?= WEB_ROOT . $vehicle->getVehiclePicture(); ?>" class="img-thumbnail img-circle"/>
                            </div>

                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-8 col-xs-8" style="height:30px;line-height: 30px">
                                        <?= number_format($vehicle->getPriceWithTaxes(), 2, ',', ' '); ?> €
                                    </div>
                                    <div class="col-md-4 col-xs-4" style="height:30px;line-height: 30px">
                                        <a href="<?= WEB_ROOT . '/vehicules/' . $vehicle->getId(); ?>" class="btn btn-success btn-sm pull-right">Détails</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                <?php if ($count === 3): ?>
                    </div>
                <?php endif; ?>

                <?php $count ++; ?>

            <?php endforeach; ?>

        </div>
    </div>
</div>