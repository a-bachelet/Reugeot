<!-- Navigation Links -->
<ul class="nav navbar-nav">

    <?php if (\App\Helper\IsUserAdminHelper::isUserAdmin()): ?>
        <li>
            <a href="<?= WEB_ROOT ?>/administration">Administration</a>
        </li>
    <?php endif; ?>

</ul>