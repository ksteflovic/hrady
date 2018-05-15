<?php
/**
 * Created by PhpStorm.
 * User: Štefinka
 * Date: 04.05.2018
 * Time: 14:29
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<hr class="style12" id="hrady">
<br>
<br>
<br>
<?php if($this->session->flashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show"">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> <?php echo $this->session->flashdata('msg'); ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata('error-msg')): ?>
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> This alert box could indicate a dangerous or potentially negative action.
</div>
<?php endif; ?>
<div class='container'>
    <div class='row'>
        <div class="col-md-12">
            <h1>Zoznam hradov</h1>
            <table id="CastleTable" class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th><a href="<?php echo site_url('home/add')?>"><button type="button" class="btn btn-primary" >Pridať nový hrad</button></a></th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <!-- <img src="H.gif" alt="" border=3 height=100 width=100></img> -->
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
<script>
    function otvorView(id) {
        window.open("<?php echo site_url('home/view/')?>"+id,"_self");
    }
    function otvorUpravu(id) {
        window.open("<?php echo site_url('home/edit/')?>"+id,"_self");
    }
    function otvorVymaz(id) {
        window.open("<?php echo site_url('home/delete/')?>"+id,"_self");
    }
</script>
<br>
<br>
<br>
<br>
<br>
<div class="parallax parallaxPrvy"></div>
<br>