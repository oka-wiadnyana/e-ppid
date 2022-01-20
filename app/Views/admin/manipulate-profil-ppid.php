  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>

  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> -->


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <?php if ($jenisUpdate == 'insert') : ?>
        <h3><i class="fas fa-tachometer-alt mr-2"></i>TAMBAH PROFIL PPID</h3>
      <?php else : ?>
        <h3><i class="fas fa-tachometer-alt mr-2"></i>EDIT INFORMASI</h3>
      <?php endif; ?>


    </div>
  </div>
  <form action="<?= base_url('admineppid/insert_profil_eppid'); ?>" method="post">
    <?= csrf_field(); ?>
    <label for="profil_ppid">
      <h3>Profil PPID</h3>
    </label>
    <div id="toolbar-container-profil"></div>
    <div id="profil_ppid">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $dataProfil['profil']; ?>
      <?php endif; ?>
    </div>

    <label for="tupoksi">
      <h3>Tugas dan fungsi PPID</h3>
    </label>
    <div id="toolbar-container-tupoksi"></div>
    <div id="tupoksi">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $dataProfil['tupoksi']; ?>
      <?php endif; ?>
    </div>
    <label for="struktur">
      <h3>Struktur PPID</h3>
    </label>
    <div id="toolbar-container-struktur"></div>
    <div id="struktur">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $dataProfil['struktur']; ?>
      <?php endif; ?>
    </div>
    <label for="visimisi">
      <h3>Visi Misi PPID</h3>
    </label>
    <div id="toolbar-container-visimisi"></div>
    <div id="visimisi">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $dataProfil['visimisi']; ?>
      <?php endif; ?>
    </div>
    <input type="hidden" id="id" value="
    <?php if ($jenisUpdate == 'insert') : ?>

    <?php else : ?>
    <?= $dataProfil['id']; ?>
    <?php endif; ?>
    ">


    <div class="mt-2">
      <button type="button" class="btn btn-info" id="submit-ck">Simpan</button>
    </div>
  </form>
  <script>
    const imageConfiguration = {
      resizeUnit: '%',
      resizeOptions: [{
          name: 'resizeImage:original',
          value: null,
          label: 'Original'
        },
        {
          name: 'resizeImage:40',
          value: '40',
          label: '40%'
        },
        {
          name: 'resizeImage:60',
          value: '60',
          label: '60%'
        }
      ],
      toolbar: ['imageStyle:inline', 'imageStyle:wrapText', 'imageStyle:breakText', '|',
        'toggleImageCaption', 'imageTextAlternative', 'resizeImage',
      ]
    }
    let dataEditor = [];
    DecoupledEditor
      .create(document.querySelector('#profil_ppid'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-profil');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
    DecoupledEditor
      .create(document.querySelector('#tupoksi'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-tupoksi');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
    DecoupledEditor
      .create(document.querySelector('#struktur'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-struktur');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
    DecoupledEditor
      .create(document.querySelector('#visimisi'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-visimisi');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });

    $('#submit-ck').click(function(e) {
      e.preventDefault();
      let profil = $('#profil_ppid').html();
      let tupoksi = $('#tupoksi').html();
      let struktur = $('#struktur').html();
      let visimisi = $('#visimisi').html();
      <?php if ($jenisUpdate == 'insert') : ?>
        let jenis = 'insert';
        let id = '';
      <?php else : ?>
        let jenis = 'update';
        let id = parseInt($('#id').val());
      <?php endif; ?>


      $.ajax({
        type: "post",
        url: "<?= base_url('admineppid/insert_profil_ppid'); ?>",
        data: {
          profil,
          tupoksi,
          struktur,
          visimisi,
          jenis,
          id
        },
        dataType: "json",
        success: function(response) {
          $(location).attr('href', response.url);
          console.log(id);
        }
      });


    })
  </script>


  <script>
    $('.edit_btn').each(function() {
      $(this).click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
          type: "post",
          data: {
            id
          },
          url: "<?= base_url('admineppid/modal_edit'); ?>",
          dataType: "json",
        }).then(function(res) {
          // $('#modal_edit').css('z-index', 1000);
          $('#modal_edit').html(res);
          $('.modal').modal('show');
          console.log(res)
        });
      })
    })


    $('.delete_btn').click(function(e) {
      e.preventDefault();
      let id = $(this).data('id');
      let uraian = $(this).data('uraian');
      Swal.fire({
        title: `Anda Yakin menghapus tombol ${uraian}?`,
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
            data: {
              id
            },
            url: "<?= base_url('admineppid/delete_link'); ?>",
            dataType: "json",
          }).done(function(res) {
            $(location).attr('href', '<?= base_url('admineppid/list_informasi'); ?>')
            console.log(res)
          });
        }
      })
      console.log(id)
    })
  </script>



  <?= $this->endSection(); ?>