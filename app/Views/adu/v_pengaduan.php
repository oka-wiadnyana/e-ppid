<?= $this->extend('adu/layout/main'); ?>
<?= $this->section('main-content'); ?>

<link href="<?= base_url(''); ?>/DataTables/datatables.min.css" rel="stylesheet">

<section>
    <div class="container">

        <table class="table" id="tabel-pengaduan">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal laporan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Terlapor</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>

        </table>
        <div id="modal"></div>
    </div>

</section>
<script src="<?= base_url(''); ?>/jquery.js" crossorigin="anonymous"></script>
<script src="<?= base_url(''); ?>/DataTables/datatables.min.js"></script>
<script>
    $('#tabel-pengaduan').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        "columnDefs": [{
                "target": 0,
                "orderable": false,
            },
            {
                responsivePriority: 1,
                targets: 0,

            },
            {
                responsivePriority: 1,
                targets: -1,

            }
        ],
        ajax: {
            url: '<?= base_url('pengaduan/datatable_pengaduan'); ?>', // Change with your own
            method: 'GET', // You are freely to use POST or GET
        }
    })


    $('#tabel-pengaduan tbody').on('click', 'tr td:nth-child(9) .uraian-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');

        $.ajax({
            type: "post",
            url: "<?= base_url('adminpengaduan/modal_uraian'); ?>",
            data: {
                id
            },
            dataType: "json",

        }).then(function(res) {
            $('.modal').html(res);
            $('#modal_uraian').modal('show');
            console.log(res)
        });;
        console.log(id)
    });

    $('#tabel-pengaduan tbody').on('click', 'tr td:nth-child(9) .btn-hapus', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        Swal.fire({
            title: `Anda Yakin menghapus data?`,
            text: "Anda tidak dapat mengulanginya lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "post",
                    url: "<?= base_url('pengaduan/hapus_pengaduan'); ?>",
                    data: {
                        id
                    },
                    dataType: "json",

                }).then(function(res) {
                    $(location).attr('href', '<?= base_url('pengaduan/v_pengaduan'); ?>')
                    console.log(res)
                });;
                console.log(id)
            }
        })


    })
    $('#tabel-pengaduan tbody').on('click', 'tr td:nth-child(8) .status-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log('ok');

        $.ajax({
            type: "post",
            data: {
                id,

            },
            url: "<?= base_url('pengaduan/modal_status'); ?>",
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
            },
            dataType: "json",
        }).then(function(res) {
            $('#modal').html(res);
            $('#modal_status').modal('show');
            console.log(res)
        });


    });
</script>


<?= $this->endSection(); ?>