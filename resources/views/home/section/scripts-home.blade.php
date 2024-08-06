<script src="{{ asset('assets/landing-page/dist/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/dist/libs/aos/dist/aos.js') }}"></script>
<script src="{{ asset('assets/landing-page/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/dist/js/custom.js') }}"></script>

@yield('scripts')

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000, // 5s
            autoplayHoverPause: true,
            center: true,
            items: 1,
            margin: 24,
            stagePadding: 20,
            autoWidth: true,
        })
    });
</script>
