<div class="progress">
    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar"
         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<div class="panel-heading" style="margin: 10px; position: fixed;"><a href="<?php echo site_url(''); ?>"><i class="fas fa-angle-double-left fa-5x"></i></a></div>
<div class="container" style="">
    <div class="col-xs-12">
        <?php
        if (!empty($success_msg)) {
            echo '<div class="alert alert-success">' . $success_msg . '</div>';
        } elseif (!empty($error_msg)) {
            echo '<div class="alert alert-danger">' . $error_msg . '</div>';
        }
        ?>
    </div>
    <br>
    <div class="row" style="float: none;
    margin: 0 auto;">
        <div class="col-xs-12" style="float: none;
    margin: 0 auto;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="" class="form">
                        <div class="form-group">
                            <label for="title">Názov</label>
                            <input type="text" class="form-control"
                                   name="Názov" placeholder="Sem vložte názov hradu" value="<?php echo
                            !empty($post['nazov']) ? $post['nazov'] : ''; ?>">
                            <?php echo form_error('nazov', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title">Stav</label>
                            <select name="stav" id="title" class="form-control">
                                <option value="">Vyberte súčasný stav hradu...</option>
                                <?php foreach ($stavy as $stav):
                                    echo "<option value='" . str_replace(" ", "_", $stav['Stav']) . "'>" . $stav['Stav'] . "</option>";

                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Type</label>
                                <select name="typ" id="title" class="form-control">
                                    <option value="">Vyberte typ hradu...</option>
                                    <?php foreach ($typy as $typ):
                                        echo "<option value='" . str_replace(" ", "_", $typ['Typ']) . "'>" . $typ['Typ'] . "</option>";

                                    endforeach; ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Adress</label>
                            <input type="text" class="form-control"
                                   name="adresa" placeholder="Zadajte ulicu a popisné číslo" value="<?php echo
                            !empty($post['adresa']) ? $post['adresa'] : ''; ?>">
                            <?php echo form_error('adresa', '<p class="helpblock text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">E-mail</label><br>
                            <input type="email" name="email" class="formcontrol"
                                   placeholder="Zadajte e-mail" value="<?php echo
                            !empty($post['email']) ? $post['email'] : ''; ?>">
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Telefónne číslo</label><br>
                            <input type="number" name="telefon" class="formcontrol"
                                   placeholder="Zadajte telefónne číslo" value="<?php echo
                            !empty($post['telefon']) ? $post['telefon'] : ''; ?>">
                            <?php echo form_error('telefon', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Webstránka</label><br>
                            <input type="text" name="webstranka" class="formcontrol"
                                   placeholder="Zadajte webovú lokalitu" value="<?php echo
                            !empty($post['webstranka']) ? $post['webstranka'] : ''; ?>">
                            <?php echo form_error('webstranka', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>