  <?= $this->extend('admin/layout/main'); ?>

  <?= $this->section('main-content'); ?>

  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script> -->


  <!-- Main Content -->

  <div class="row">
    <div class="col">
      <?php if ($jenisUpdate == 'insert') : ?>
        <h3><i class="fas fa-tachometer-alt mr-2"></i>TAMBAH PRASYARAT DAN LAINNYA</h3>
      <?php else : ?>
        <h3><i class="fas fa-tachometer-alt mr-2"></i>EDIT PRASYARAT DAN LAINNYA</h3>
      <?php endif; ?>


    </div>
  </div>
  <form action="<?= base_url('admineppid/insert_prasyarat'); ?>" method="post">
    <?= csrf_field(); ?>
    <label for="prasyarat">
      <h3>Prasyarat</h3>
    </label>
    <div id="toolbar-container-prasyarat"></div>
    <div id="prasyarat">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $data_prasyarat['prasyarat']; ?>
      <?php endif; ?>
    </div>

    <label for="hubungi_kami">
      <h3>Hubungi Kami</h3>
    </label>
    <div id="toolbar-container-hubungi_kami"></div>
    <div id="hubungi_kami">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $data_prasyarat['hubungi_kami']; ?>
      <?php endif; ?>
    </div>
    <label for="faq">
      <h3>FAQ</h3>
    </label>
    <div id="toolbar-container-faq"></div>
    <div id="faq">
      <?php if ($jenisUpdate == 'insert') : ?>

      <?php else : ?>
        <?= $data_prasyarat['faq']; ?>
      <?php endif; ?>
    </div>

    <input type="hidden" id="id" value="
    <?php if ($jenisUpdate == 'insert') : ?>

    <?php else : ?>
    <?= $data_prasyarat['id']; ?>
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
      .create(document.querySelector('#prasyarat'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-prasyarat');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
    DecoupledEditor
      .create(document.querySelector('#hubungi_kami'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-hubungi_kami');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });
    DecoupledEditor
      .create(document.querySelector('#faq'), {

        ckfinder: {
          uploadUrl: "<?= base_url('admineppid/upload_gambar_ckeditor'); ?>"
        },
        image: imageConfiguration
      })
      .then(editor => {
        const toolbarContainer = document.querySelector('#toolbar-container-faq');
        dataEditor.push(editor.getData());

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
      })
      .catch(error => {
        console.error(error);
      });


    $('#submit-ck').click(function(e) {
      e.preventDefault();
      let prasyarat = $('#prasyarat').html();
      let hubungi_kami = $('#hubungi_kami').html();
      let faq = $('#faq').html();

      <?php if ($jenisUpdate == 'insert') : ?>
        let jenis = 'insert';
        let id = '';
      <?php else : ?>
        let jenis = 'update';
        let id = parseInt($('#id').val());
      <?php endif; ?>


      $.ajax({
        type: "post",
        url: "<?= base_url('admineppid/insert_prasyarat'); ?>",
        data: {
          prasyarat,
          hubungi_kami,
          faq,
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