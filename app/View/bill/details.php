<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Facture n°<?= $params['bill']->getReference(); ?></h1>
                <h4>Le <?= $params['bill']->getDate()->format('d/m/Y'); ?> à <?= $params['bill']->getDate()->format('H:i:s'); ?></h4>
            </div>
        </div>
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
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($params['vehicleTab'] as $vehicle): ?>
                        <tr>
                            <td><?= $vehicle['vehicle']->getModel(); ?></td>
                            <td>Véhicules</td>
                            <td><?= number_format($vehicle['vehicle']->getPriceWithoutTaxes(), 2, ',', ' '); ?></td>
                            <td><?= number_format($vehicle['vehicle']->getPriceWithTaxes(), 2, ',', ' '); ?></td>
                            <td><?= $vehicle['quantity'] ?></td>
                        </tr>
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
        </div>
    </div>
</div>
