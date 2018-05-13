<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<div class="panel-heading" style="margin: 10px; position: fixed;">
    <a href="<?php echo site_url('hrady/'); ?>" ><i class="fas fa-chevron-circle-left fa-5x"></i></a>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-default">

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