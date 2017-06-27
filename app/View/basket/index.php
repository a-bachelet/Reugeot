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
                    </tr>
                </thead>
                <tbody>
                <?php foreach($params['panier'] as $k => $cat_panier): ?>
                    <?php foreach($cat_panier as $product): ?>
                        <tr>
                            <?php if ($k === 'vehicules'): ?>
                                <td><?= $product['product']->getModel(); ?></td>
                                <td>Véhicules</td>
                                <td><?= $product['product']->getPriceWithoutTaxes(); ?></td>
                                <td><?= $product['product']->getPriceWithTaxes(); ?></td>
                                <td><?= $product['quantity']; ?></td>
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
                        <td><?= $params['total_bill_ht'] ?></td>
                        <td><?= $params['total_bill_ttc'] ?></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <button class="btn btn-success pull-right"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp;&nbsp;Payer</button>
            <button style="margin-right: 5px;" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;Vider</button>
        </div>
    </div>
</div>