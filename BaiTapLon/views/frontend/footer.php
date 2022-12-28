<footer class="footer">
    <section class="bg-policy policy clearfix">
        <div class="container">

        </div>
    </section>
    <?php require_once('views/frontend/mod_menufooter.php');?>

</footer>
<!--End footer-->
<script>
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 1300,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
    $('.owl-carousel-post').owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 1300,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    })
})
</script>
</body>

</html>
<!--.end header-->