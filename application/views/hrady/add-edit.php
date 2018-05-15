<?php
if (strpos($action, 'Pridanie') !== false):
    echo "<div class='progress'>
      <div class='progress-bar progress-bar-striped bg-primary progress-bar-animated' role='progressbar'
         aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
</div>";
else:
    echo "<div class='progress'>
      <div class='progress-bar progress-bar-striped bg-warning progress-bar-animated' role='progressbar'
         aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width: 100%'></div>
</div>";

endif;
?>

<div class="panel-heading" style="margin: 10px; position: fixed;"><a href="<?php echo site_url(''); ?>"><i
                class="fas fa-angle-double-left fa-5x"></i></a></div>
<div class="container" style="">
    <div class="col-xs-12">
        <?php
        if (!empty($msg)) {
            echo '<div class="alert alert-success">' . $msg . '</div>';
        } elseif (!empty($msg)) {
            echo '<div class="alert alert-danger">' . $msg . '</div>';
        }
        ?>
    </div>
    <br>
    <div class="row" style="float: none;
    margin: 0 auto;">
        <div class="col-xs-12" style="float: none;
    margin: 0 auto; width: 700px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post" action="<?php /* if(strpos($action, 'Pridanie')):
                        echo base_url();?>index.php/home/pridaj<?php
                    else :
                        echo base_url();?>index.php/home/uprav/<?php$idcko;
                    endif;
                    */ ?> <?php if (strpos($action, 'Pridanie') !== false): echo site_url('home/pridaj');
                    else:
                        echo site_url('home/uprav');
                        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if (preg_match("/\/(\d+)$/", $url, $matches)) {
                            $end = $matches[1];
                            $history = $post['idHistoria'];
                        }
                    endif;
                    ?>" class="form">

                        <div class="form-group">

                            <input type="hidden" name="idHrad" value="<?php echo !empty($end) ? $end : ''; ?>">
                            <input type="hidden" name="idHistoria" value="<?php echo !empty($history) ? $history : ''; ?>">
                            <label for="title"><strong>Názov</strong></label>
                            <input type="text" class="form-control"
                                   name="nazov" placeholder="Sem vložte názov hradu" value="<?php echo
                            !empty($post['nazov']) ? $post['nazov'] : ''; ?>" required>
                            <?php echo form_error('nazov', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="title"><strong>Stav</strong></label>
                            <select name="stav" id="title" class="form-control" required>
                                <option value="" selected disabled hidden>Vyberte súčasný stav hradu...</option>
                                <?php foreach ($stavy as $stav):
                                    if ($stav['Stav'] == $post['Stav']):
                                        echo "<option selected value='" . str_replace(" ", "_", $stav['Stav']) . "'>" . $stav['Stav'] . "</option>";
                                    else:
                                        echo "<option value='" . str_replace(" ", "_", $stav['Stav']) . "'>" . $stav['Stav'] . "</option>";
                                    endif;
                                endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="typ"><strong>Typ</strong></label>
                            <select name="typ" id="typ" class="form-control" required>
                                <option value="" selected disabled hidden>Vyberte typ hradu...</option>
                                <?php foreach ($typy as $typ):
                                    if ($typ['Typ'] == $post['Typ']):
                                        echo "<option selected value='" . str_replace(" ", "_", $typ['Typ']) . "'>" . $typ['Typ'] . "</option>";
                                    else:
                                        echo "<option value='" . str_replace(" ", "_", $typ['Typ']) . "'>" . $typ['Typ'] . "</option>";
                                    endif;
                                endforeach; ?>
                            </select>
                        </div>

                        <label for="title"><strong>Rok postavenia hradu</strong></label>
                        <input type="text" class="form-control"
                               name="rok" placeholder="Sem vložte približný rok alebo storočie" value="<?php echo
                        !empty($post['rok']) ? $post['rok'] : ''; ?>"
                               required> <?php echo form_error('rok', '<p class="help-block text-danger">', '</p>'); ?>
                        <br>
                        <div class="form-group">
                            <label for="comment"><strong>História:</strong></label>
                            <textarea class="form-control" rows="7" id="historia" name="historia" required><?php echo
                                !empty($post['historia']) ? $post['historia'] : ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="title"><strong>Adresa</strong></label>
                            <input type="text" class="form-control"
                                   name="adresa" placeholder="Zadajte ulicu a popisné číslo" value="<?php echo
                            !empty($post['Adresa']) ? $post['Adresa'] : ''; ?>">
                            <?php echo form_error('adresa', '<p class="helpblock text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="mesto"><strong>Mesto</strong></label>
                            <select name="mesto" id="mesto" class="form-control" required>
                                <option value="" selected disabled hidden>Vyberte mesto...</option>
                                <?php foreach ($mesta as $mesto):
                                    // echo "<script>console.log(". $mesto['nazov']. " - ". $hrad['mesto']. ");</script>";
                                    if ($mesto['nazov'] == $post['mesto']):
                                        echo "<option selected value='" . str_replace(" ", "_", $mesto['id']) . "'>" . $mesto['nazov'] . "</option>";
                                    else:
                                        echo "<option value='" . str_replace(" ", "_", $mesto['id']) . "'>" . $mesto['nazov'] . "</option>";
                                    endif;

                                endforeach; ?>

                            </select>
                            <?php echo form_error('mesto', '<p class="helpblock text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group col-xs-6">
                        <label for="title"><strong>GPS súradnice</strong></label>
                        <input type="text" class="form-control"
                               name="gps_lat" placeholder="Latitude" value="<?php echo
                        !empty($post['gps_lat']) ? $post['gps_lat'] : ''; ?>"
                               required> <?php echo form_error('gps_lat', '<p class="help-block text-danger">', '</p>'); ?>
                        <input type="text" class="form-control"
                               name="gps_long" placeholder="Longitude" value="<?php echo
                        !empty($post['gps_long']) ? $post['gps_long'] : ''; ?>"
                               required> <?php echo form_error('gps_long', '<p class="help-block text-danger">', '</p>'); ?>
                            <p style="text-align: center"><a target="_blank" href="https://www.google.sk/maps?hl=sk&tab=wl">Kliknutím si otvoríte mapy pre ľahšie zadávanie súradníc</a></p>
                        </div>

                        <div class="form-group">
                            <label for="content"><strong>E-mail</strong></label><br>
                            <input type="email" name="email" class="form-control"
                                   placeholder="Zadajte e-mail" value="<?php echo
                            !empty($post['email']) ? $post['email'] : ''; ?>">
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="content"><strong>Telefónne číslo</strong></strong></label><br>
                            <input type="number" name="telefon" class="form-control"
                                   placeholder="Zadajte telefónne číslo" value="<?php echo
                            !empty($post['telefon']) ? $post['telefon'] : ''; ?>">
                            <?php echo form_error('telefon', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="content"><strong>Webstránka</strong></label><br>
                            <input type="text" name="webstranka" class="form-control"
                                   placeholder="Zadajte webovú lokalitu" value="<?php echo
                            !empty($post['webstranka']) ? $post['webstranka'] : ''; ?>">
                            <?php echo form_error('webstranka', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="picture"><strong>Obrázok:</strong></label>
                            <textarea class="form-control" placeholder="Sem vložte url obrázka, odporúčame ukladať obrázky v rozlíšení, ktoré majú rovnakú výšku a šírku. Napr.: 500 x 500 ..." rows="3" id="picture" name="picture" required><?php echo
                                !empty($post['picture']) ? $post['picture'] : ''; ?></textarea>
                        </div>
                        <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
                    </form>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>