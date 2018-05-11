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
    <div class="row">
        <div class="col-xs-12">
            13 
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $action; ?>
                    Hrady naše <a href="<?php echo site_url('hrady/'); ?>"
                                 class="glyphicon glyphicon-arrow-left pull-right"></a></div>
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
                            <select name="stav">
                                <option value="">Select...</option>
                                <option value="preverejnost">Pre verejnosť dostupný</option>
                                <option value="docasnenepistupny">Pre verejnosť dočasne neprístupný</option>
                                <option value="docasnenepistupny">Neprístupný</option>
                            </select>
                        </div>
                        <?php
                        function populatedropdown()
                        {
                            $query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE active=1 ORDER BY brand');

                            if ($query->num_rows() > 0) {
                                $dropdowns = $query->result();

                                $dropDownList[''] = 'Please Select';    // default selection item
                                foreach($dropdowns as $dropdown) {
                                    $dropDownList[$dropdown->brand] = $dropdown->brand;
                                }

                                return $dropDownList;
                            } else {
                                return false;       // return false if no items for dropdown
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="title">Typ</label>
                            <div class="form-group">
                                <label for="title">Typ</label>
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