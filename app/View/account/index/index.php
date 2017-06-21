<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <h2>Paramètres du compte :</h2>
            </div>
            <div class="col-md-3 col-xs-12">
                <h2><?= $_SESSION['auth']['last_name'] ?> <?= $_SESSION['auth']['first_name'] ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">

        <!-- Left Part -->
        <div class="col-md-4 col-xs-12">

            <!-- Profile Pic Management -->
            <div class="row">
                <div class="col-md-12">
                    <?php require('profile-pic-form.inc.php'); ?>
                </div>
            </div>

        </div>

        <!-- Right Part -->
        <div class="col-md-8 col-xs-12">

            <!-- Personal Information Management -->
            <div class="row">
                <div class="col-md-12">
                    <?php require('personal-information-form.inc.php'); ?>
                </div>
            </div>

            <!-- Password Management -->
            <div class="row">
                <div class="col-md-12">
                    <?php require('password-form.inc.php') ?>
                </div>
            </div>

        </div>

    </div>
</div>