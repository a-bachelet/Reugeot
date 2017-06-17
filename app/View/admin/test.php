<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>SESSION :</h3>
            <?php var_dump($params['session']); ?>
        </div>
        <div class="col-md-6">
            <h3>COOKIE :</h3>
            <?php var_dump($params['cookie']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>GET :</h3>
            <?php var_dump($params['get']); ?>
        </div>
        <div class="col-md-6">
            <h3>POST :</h3>
            <?php var_dump($params['post']); ?>
        </div>
    </div>
</div>