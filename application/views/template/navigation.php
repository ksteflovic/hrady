<!--<div class="container-fluid">
    <br>
    <h3>Sticky Navbar</h3>
    <p>A sticky navigation bar stays fixed at the top of the page when you scroll past it.</p>
    <p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
    <p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
    <p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
    <p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
    <p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
</div>
-->
<?php
function welcome()
{
    if (date("H") >= 6 && date("H") < 10) {
        return base_url('assets/fotky_hrady/nitrianskyhrad-rano.jpg');
    } elseif (date("H") >= 10 && date("H") < 18) {
        return base_url('assets/fotky_hrady/nitrianskyhrad-poobede.jpg');
    } elseif (date("H") >= 18 && date("H") < 22) {
        return base_url('assets/fotky_hrady/nitrianskyhrad-vecer.jpg');
    } else {
        return base_url('assets/fotky_hrady/nitrianskyhrad-noc.jpg');
    }
}
?>
<div>
<img src="<?php echo welcome(); ?>"
     style="max-width: 100%; height: auto;">
</div>
<!-- Az tu zacina navigation -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" onclick="window.location.reload()" style="cursor: pointer">
        <img src="https://s31.postimg.cc/inxp945l7/hrad_logo.png" alt="logo" style="width:50px;">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" id="hlavny_nadpis_v_navbare3">Naše hrady</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" style="font-family: 'Bitter', serif; font-size: 20px;">
                Navigácia
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#statistika">Štatistiky</a>
                <a class="dropdown-item" href="#">Kontakt</a>
                <a class="dropdown-item" href="#about">O nás</a>
            </div>
        </li>
    </ul>
</nav>
