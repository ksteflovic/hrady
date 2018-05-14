<div class="progress">
    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" role="progressbar"
         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
<div class="container">
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
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="<?php echo site_url('hrady/'); ?>"><i
                                class="fas fa-angle-double-left" fa-5x"></></a></div>
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
                            <select name="stav" class="form-control">
                                <option value="">Select...</option>
                                <?php foreach ($stavy as $stav):
                                    echo "<option value='" . str_replace(" ", "_", $stav['Stav']) . "'>" . $stav['Stav'] . "</option>";

                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Typ</label>
                            <div class="form-group">
                                <select name="typ">
                                    <option value="">Select...</option>
                                    <option value="hrad">Hrad</option>
                                    <option value="zamok">Zámok</option>
                                    <option value="kastiel">Kaštieľ</option>
                                    <option value="klastor">Kláštor</option>
                                    <option value="zrucanina">Zrúcanina</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Ulica a popisné číslo</label>
                            <input type="text" class="form-control"
                                   name="adresa" placeholder="Zadajte ulicu a popisné číslo" value="<?php echo
                            !empty($post['adresa']) ? $post['adresa'] : ''; ?>">
                            <?php echo form_error('adresa', '<p class="helpblock text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">E-mail</label>
                            <input type="email" name="email" class="formcontrol"
                                   placeholder="Zadajte e-mail" value="<?php echo
                            !empty($post['email']) ? $post['email'] : ''; ?>">
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Telefónne číslo</label>
                            <input type="number" name="telefon" class="formcontrol"
                                   placeholder="Zadajte telefónne číslo" value="<?php echo
                            !empty($post['telefon']) ? $post['telefon'] : ''; ?>">
                            <?php echo form_error('telefon', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">Webstránka</label>
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