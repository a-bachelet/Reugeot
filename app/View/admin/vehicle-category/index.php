<div class="row">
    <div class="col-md-12">

        <!-- Panel -->
        <div class="panel panel-primary panel-table">

            <!-- Panel Header -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="panel-title" style="height: 30px; line-height: 30px;"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;&nbsp;Catégories</h3>
                    </div>
                    <div class="col-md-4">
                        <a href="<?= WEB_ROOT . '/administration/vehicules-categories/ajouter' ?>" class="btn btn-success btn-sm pull-right">Ajouter</a>
                    </div>
                </div>
            </div>

            <!-- Panel Content -->
            <div class="panel-body">

                <!-- Users Table -->
                <table class="table table-striped table-list">

                    <!-- Table Header -->
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
                    </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    <?php foreach($params['vehicleCategories'] as $vehicleCategory): ?>
                        <tr>
                            <td><?= $vehicleCategory->getId() ?></td>
                            <td><?= $vehicleCategory->getName(); ?></td>
                            <td align="center">
                                <a href="<?= WEB_ROOT . '/administration/vehicules-categories/' . $vehicleCategory->getId() . '/editer'; ?>" class="btn btn-warning btn-sm">Editer</a>
                                <a href="<?= WEB_ROOT . '/administration/vehicules-categories/' . $vehicleCategory->getId() . '/supprimer'; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>


                </table>

            </div>

            <!-- Panel Footer -->
            <div class="panel-footer">
                <div class="row">

                    <!-- Page Counter -->
                    <div class="col col-xs-4">
                        Page <?= $params['viewedPage'] ?> sur <?= $params['pageCount'] ?>
                    </div>

                    <!-- Pagination -->
                    <div class="col col-xs-8">
                        <ul class="pagination hidden-xs pull-right">

                            <?php if ($params['viewedPage'] !== 1 && $params['viewedPage'] !== 2): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=1' ?>">«</a></li>
                            <?php endif; ?>
                            <?php if ($params['viewedPage'] - 1 >= 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage'] - 2) ?>"><</a></li>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage'] - 1) ?>"><?= $params['viewedPage'] - 1 ?></a></li>
                            <?php endif; ?>
                            <li class="active"><span><?= $params['viewedPage'] ?></span></li>
                            <?php if ($params['viewedPage'] + 1 <= $params['pageCount']): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage'] + 1) ?>"><?= $params['viewedPage'] + 1 ?></a></li>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage'] + 2) ?>">></a></li>
                            <?php endif; ?>
                            <?php if ($params['viewedPage'] !== $params['pageCount'] && $params['viewedPage'] !== $params['pageCount'] - 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . $params['pageCount'] ?>">»</a></li>
                            <?php endif; ?>

                        </ul>

                        <ul class="pagination visible-xs pull-right">
                            <?php if($params['viewedPage'] !== 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage']-1) ?>">«</a></li>
                            <?php endif; ?>
                            <?php if(intval($params['viewedPage']) !== intval($params['pageCount'])): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/vehicules-categories?page=' . ($params['viewedPage']+1) ?>">»</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>