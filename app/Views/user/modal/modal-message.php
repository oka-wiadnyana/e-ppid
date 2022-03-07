<div class="modal fade" id="modal_message" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header bg-info text-light">
                        Bot PN Bangli
                    </div>
                    <div class="card-body">

                        <p class="card-text">Untuk mendapatkan informasi secara cepat, masyarakat dapat menggunakan layanan bot <?= session()->get('profil_nama'); ?>, yang berupa Whatsapp Bot dan Telegram Bot. Untuk menggunakan Whatsapp Bot silahkan ketikkan halo dan kirimkan ke <b><?= session()->get('profil_nomor_whatsapp'); ?></b>. Untuk telegram silahkan kunjungi <b><?= session()->get('profil_telegram'); ?></b> pada aplikasi telegram dan klik mulai</p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>