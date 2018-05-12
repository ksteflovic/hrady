<?php
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 14:29
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
                    <!--
                    <th><button type="button" class="btn btn-outline-primary">Primary</button></th>
                    <th><button type="button" class="btn btn-outline-warning">Warning</button></th>
                    <th><button type="button" class="btn btn-outline-dark">Dark</button></th>
                    <th><button type="button" class="btn btn-outline-success">Success</button></th>
                    -->
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
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
    </div>
</div>
<p>Nejaky text</p>
<p>Nejaky text</p><br>
<p>Nejaky text</p>

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
                <div class="panel-heading">Castles <a href="<?php echo
                    site_url('home/add/'); ?>" class="glyphicon glyphicon-plus pullright"
                    ></a></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="20%">Názov</th>
                        <th width="10%">Stav</th>
                        <th width="10%">Typ</th>
                        <th width="20%">Adresa</th>
                        <th width="15%">E-mail</th>
                        <th width="10%">Telefon</th>
                        <th width="20%">Webstranka</th>
                    </tr>
                    </thead>
                    <tbody id="userData">
                    <?php if (!empty($hrady)): foreach ($hrady
                                                        as $hrad): ?>
                        <tr>
                            <td><?php echo '#' . $hrad['id']; ?></td>
                            <td><?php echo
                                $hrad['nazov']; ?></td>
                            <td><?php echo $hrad['stav'];
                                ?></td>
                            <td><?php echo $hrad['typ']; ?></td>
                            <td><?php echo $hrad['adresa']; ?></td>
                            <td><?php echo $hrad['email']; ?></td>
                            <td><?php echo $hrad['telefon']; ?></td>
                            <td><?php echo $hrad['webstranka']; ?></td>
                            <td>
                                <a href="<?php echo
                                site_url('home/view/' . $hrad['id']); ?>" class="glyphicon
glyphicon-eye-open"></a>
                                <a href="<?php echo
                                site_url('home/edit/' . $hrad['id']); ?>" class="glyphicon
glyphicon-edit"></a>
                                <a href="<?php echo
                                site_url('home/delete/' . $hrad['id']); ?>" class="glyphicon
glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
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
                </table>
            </div>
        </div>
    </div>
</div>

<p>Nejaky text</p>
<p>Nejaky text</p><br>
<p>Nejaky text</p>