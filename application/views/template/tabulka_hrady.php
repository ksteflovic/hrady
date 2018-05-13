<?php
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 14:29
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<br>
<br>
<br>
<hr class="style12">
<div class='container'>
    <div class='row'>
        <div class="col-md-12">
            <h1>Zoznam hradov</h1>
            <table id="CastleTable" class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <!-- <img src="H.gif" alt="" border=3 height=100 width=100></img> -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
    <?php if (!empty($success_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg;
                ?></div>
        </div>
    <?php } elseif (!empty($error_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>
    <div class="row">
        <h1>List of Castles</h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default ">
                <div class="panel-heading"><a href="<?php echo
                    site_url('home/add/'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="25%">Názov</th>
                        <th width="15%">Typ</th>
                        <th width="25%">Stav</th>
                        <th width="30%">Upravy</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if (!empty($hrady)): foreach ($hrady

                    as $hrad): ?>
                    <tr>
                        <td><?php echo '#' . $hrad['id']; ?></td>
                        <td><?php echo $hrad['nazov']; ?></td>
                        <td><?php echo $hrad['Typ']; ?></td>
                        <?php
                        if (strpos($hrad['Stav'], 're verejnosť') !== false) {
                            ?>
                            <td><span class="badge badge-success"><?php echo mb_strtoupper($hrad['Stav']); ?></span></td><?php
                        } elseif (strpos($hrad['Stav'], 'Ruiny') !== false || strpos($hrad['Stav'], 'achoval') !== false) {
                            ?>
                            <td><span class="badge badge-warning"><?php echo mb_strtoupper($hrad['Stav']); ?></span></td><?php
                        } else {
                            ?>
                            <td><span <span class="badge badge-danger"><?php echo mb_strtoupper($hrad['Stav']); ?></span></td><?php
                        }
                        ?>
                        <td>
                            <a href="<?php echo
                            site_url('home/view/' . $hrad['id']); ?>" class="btn btn-outline-primary" role="button">Detaily</a>
                            <a href="<?php echo
                            site_url('home/edit/' . $hrad['id']); ?>" class="btn btn-outline-warning" role="button">Upraviť</a>
                            <a href="<?php echo
                            site_url('home/delete/' . $hrad['id']); ?>" class="btn btn-outline-danger" role="button"
                               onclick="return confirm('Are you sure to delete?')">Vymazať</a>
                        </td>
                    </tr>

        <?php endforeach; else: ?>
            <tr>
                <td colspan="8">Castle(s) not
                    found......
                </td>
            </tr>
        <?php endif; ?>
        </tbody>

            </div>

        </div>
        </table>
    </div>
    <?php echo $this->pagination->create_links(); ?>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>