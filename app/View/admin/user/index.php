<div class="row">
    <div class="col-md-12">

        <!-- Panel -->
        <div class="panel panel-primary panel-table">

            <!-- Panel Header -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Utilisateurs</h3>
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
                            <th>Prénom</th>
                            <th>Email</th>
                            <th class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <?php foreach($params['users'] as $user): ?>
                            <tr>
                                <td>
                                    <?php
                                        switch ($user->getRole()->getName()) {
                                            case 'ROLE_ADMIN':
                                                echo "<span class='text-danger'>" . $user->getId() . "</span>";
                                                break;
                                            case 'ROLE_PROFESSIONAL':
                                                echo "<span class='text-primary'>" . $user->getId() . "</span>";
                                                break;
                                            case 'ROLE_USER':
                                            default:
                                                echo "<span>" . $user->getId() . "</span>";
                                                break;
                                        }
                                    ?>
                                </td>
                                <td><?= $user->getLastName(); ?></td>
                                <td><?= $user->getFirstName(); ?></td>
                                <td><?= $user->getEmail(); ?></td>
                                <td align="center">
                                    <a href="<?= WEB_ROOT . '/administration/utilisateurs/' . $user->getId(); ?>" class="btn btn-primary btn-sm">Détails</a>
                                    <a href="<?= WEB_ROOT . '/administration/utilisateurs/' . $user->getId() . '/supprimer'; ?>" class="btn btn-danger btn-sm">Supprimer</a>
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
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=1' ?>">«</a></li>
                            <?php endif; ?>
                            <?php if ($params['viewedPage'] - 1 >= 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage'] - 2) ?>"><</a></li>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage'] - 1) ?>"><?= $params['viewedPage'] - 1 ?></a></li>
                            <?php endif; ?>
                            <li class="active"><span><?= $params['viewedPage'] ?></span></li>
                            <?php if ($params['viewedPage'] + 1 <= $params['pageCount']): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage'] + 1) ?>"><?= $params['viewedPage'] + 1 ?></a></li>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage'] + 2) ?>">></a></li>
                            <?php endif; ?>
                            <?php if ($params['viewedPage'] !== $params['pageCount'] && $params['viewedPage'] !== $params['pageCount'] - 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . $params['pageCount'] ?>">»</a></li>
                            <?php endif; ?>

                        </ul>

                        <ul class="pagination visible-xs pull-right">
                            <?php if($params['viewedPage'] !== 1): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage']-1) ?>">«</a></li>
                            <?php endif; ?>
                            <?php if(intval($params['viewedPage']) !== intval($params['pageCount'])): ?>
                                <li><a href="<?= WEB_ROOT . '/administration/utilisateurs?page=' . ($params['viewedPage']+1) ?>">»</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>