<div style="margin-top:200px">
    <div class="animate-reveal animate-first" id="nadpis_na_stranke">
        <p>Welcome</p>
    </div>
    <br>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <p>Scroll Up and Down this page to see the parallax scrolling effect.</p>
    <div class="parallax parallaxPrvy"></div>
</div>

<script type="text/javascript">

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("toTop").style.display = "block";
        } else {
            document.getElementById("toTop").style.display = "none";
        }
    }
    function topFunction() {
        $(document).ready(function () {
            $(window).scroll(function () {
                var top =  $(".goto-top");
                if ( $('body').height() <= (    $(window).height() + $(window).scrollTop() + 200 )) {
                    top.animate({"margin-left": "0px"},1500);
                } else {
                    top.animate({"margin-left": "-100%"},1500);
                }
            });

            $(".goto-top").on('click', function () {
                $("html, body").animate({scrollTop: 0}, 400);
            });
        });
    }

</script>