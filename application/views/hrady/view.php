<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Detaily o hrade <a href="<?php
                echo site_url('home/'); ?>" class="glyphicon glyphicon-arrow-left
pull-right"></a></div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="panel-body">
                    <h1 id="nadpis_na_stranke"><?php echo
                        !empty($hrady['nazov']) ? $hrady['nazov'] : '' ; ?></h1>
                <div class="form-group">
                    <label>Temperature:</label>
                    <p><?php echo
                        !empty($temperatures['temperature'])?$temperatures['temperature']:'';
                        ?></p>
                </div>
                <div class="form-group">
                    <label>Sky:</label>
                    <p><?php echo
                        !empty($temperatures['sky'])?$temperatures['sky']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>User:</label>
                    <p><?php echo
                        !empty($temperatures['user'])?$temperatures['user']:''; ?></p>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <p><?php echo
                        !empty($temperatures['description'])?$temperatures['description']:'';
                        ?></p>
                </div>
            </div>
        </div>
    </div>
</div>