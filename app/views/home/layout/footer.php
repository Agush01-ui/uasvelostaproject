<div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5 col-md-6">
                <h4 class="text-light mb-4">Kontak</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Menara 165, Jln Tb. Simatupang</p>
                <a class="btn btn-link" href="https://wa.me/81255434750"><i class="fab fa-whatsapp me-3"></i>081255434750</a>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i> velosta@help.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Tautan</h4>
                <a class="btn btn-link" href="<?= BASEURL ?>">Home</a>
                <a class="btn btn-link" href="<?= BASEURL ?>/home/produk">Produk</a>
                <a class="btn btn-link" href="<?= BASEURL ?>/home/daftar">Daftar</a>
                <a class="btn btn-link" href="<?= BASEURL ?>/home/login">Login</a>
            </div>


        </div>
    </div>
</div>

<div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; Velosta, All Right Reserved.
            </div>
        </div>
    </div>
</div>

<a class="whats-app" href="https://wa.me/6285946271505" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL ?>/home/lib/wow/wow.min.js"></script>
<script src="<?= BASEURL ?>/home/lib/easing/easing.min.js"></script>
<script src="<?= BASEURL ?>/home/lib/waypoints/waypoints.min.js"></script>
<script src="<?= BASEURL ?>/home/lib/counterup/counterup.min.js"></script>
<script src="<?= BASEURL ?>/home/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= BASEURL ?>/home/js/main.js"></script>
<script>
    $(document).ready(function() {
        $('.scroll-button').click(function() {
            var target = $(this).data('scroll-to');
            var position = 0;

            if (target === 'middle') {
                position = $('.container').offset().top;
            } else if (target === 'bottom') {
                position = $(document).height();
            }

            $('html, body').animate({
                scrollTop: position
            }, 1000);
        });
    });
</script>
</body>

</html>