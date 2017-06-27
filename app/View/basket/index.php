<div class="jumbotron">
    <div class="container">
        <h1>Panier :</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Prix HT</th>
                        <th>Prix TTC</th>
                        <th>Qté.</th>
                        <th class="text-center" align="center"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($params['panier'] as $k => $cat_panier): ?>
                    <?php foreach($cat_panier as $product): ?>
                        <tr>
                            <?php if ($k === 'vehicules'): ?>
                                <td><?= $product['product']->getModel(); ?></td>
                                <td>Véhicules</td>
                                <td><?= number_format($product['product']->getPriceWithoutTaxes(), 2, ',', ' '); ?> €</td>
                                <td><?= number_format($product['product']->getPriceWithTaxes(), 2, ',', ' '); ?> €</td>
                                <td><?= $product['quantity']; ?></td>
                                <td align="center">
                                    <button vehicle="<?= $product['product']->getId(); ?>" data-toggle="modal" data-target="#basketIndexRemoveVehicleModal" class="basketIndexRemoveVehicleButton btn btn-sm btn-danger">-</button>
                                    <button vehicle="<?= $product['product']->getId(); ?>" data-toggle="modal" data-target="#basketIndexAddVehicleModal" class="basketIndexAddVehicleButton btn btn-sm btn-success">+</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Total :</th>
                        <th>Quantité</th>
                        <th>Prix HT</th>
                        <th>Prix TTC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td><?= $params['total_quantity'] ?></td>
                        <td><?= number_format($params['total_bill_ht'], 2, ',', ' '); ?> €</td>
                        <td><?= number_format($params['total_bill_ttc'], 2, ',', ' '); ?> €</td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <a href="<?= WEB_ROOT . '/panier/valider' ?>" class="btn btn-success pull-right"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;&nbsp;Payer</a>
            <a href="<?= WEB_ROOT . '/panier/vider' ?>" style="margin-right: 5px;" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;Vider</a>
        </div>
    </div>
</div>

<?php require ('add-vehicle-modal.php'); require('remove-vehicule-modal.php'); ?>