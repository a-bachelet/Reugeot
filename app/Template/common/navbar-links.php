<!-- Navigation Links -->
<ul class="nav navbar-nav">

    <?php if (\App\Helper\IsUserAdminHelper::isUserAdmin()): ?>
        <li>
            <a href="<?= WEB_ROOT ?>/administration"><span class="glyphicon glyphicon-cog"></span> Administration</a>
        </li>
    <?php endif; ?>

</ul>