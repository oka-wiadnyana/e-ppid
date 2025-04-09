<footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">



    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Link terkait</h4>
                    <ul>
                        <?php if (session()->has('link_terkait')) : ?>
                            <?php foreach (session()->get('link_terkait') as $d) : ?>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= $d['link'] ?>" target='blank'><?= $d['alias']; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Layanan kami</h4>
                    <ul>
                        <?php if (session()->has('layanan_elektronik')) : ?>
                            <?php foreach (session()->get('layanan_elektronik') as $d) : ?>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?= $d['link'] ?>" target='blank'><?= $d['alias']; ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Kontak Kami</h4>
                    <p>
                        <?= session()->get('profil_alamat_break') ?><br>
                        <strong>Phone:</strong><?= session()->get('profil_nomor_telepon') ?><br>
                        <strong>Email:</strong><?= session()->get('profil_email') ?><br>
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>Tentang E-Pelita Pengaduan</h3>
                    <p>Aplikasi pengaduan elektronik (meja pengaduan elektronik) <?= session()->get('profil_nama'); ?>, untuk memudahkan masyarakat mengajukan pengaduan</p>
                    <div class="social-links mt-3">
                        <a href="<?= session()->get('profil_link_youtube') ?>" class="twitter"><i class="bx bxl-youtube"></i></a>
                        <a href="<?= session()->get('profil_link_facebook') ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="<?= session()->get('profil_link_instagram') ?>" class="instagram"><i class="bx bxl-instagram"></i></a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>E-Pelita</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            <br>
            Reused by PT Denpasar
        </div>
    </div>
</footer>