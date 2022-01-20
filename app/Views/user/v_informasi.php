 <?= $this->extend('user/layout/main.php'); ?>

 <?= $this->section('main-content'); ?>
 <!-- if berkala -->
 <?php if ($jenis == 'berkala') : ?>
     <section id="informasi">
         <div class="container">
             <div class="row">
                 <h1 class="text-center fw-bolder">Informasi Berkala</h1>
                 <hr>
             </div>
             <div class="row">

                 <div class="col">

                     <details>
                         <summary class="level2"> Profil Pengadilan Negeri Bangli</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '1' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Prosedur Beracara</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '1' & $detailLink['level3'] == '2') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Biaya perkara dan layanan</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '1' & $detailLink['level3'] == '3') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Agenda sidang</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '1' & $detailLink['level3'] == '4') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Hak-hak masyarakat</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Tata cara pengaduan</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '2') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Hak-hak pelapor</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '3') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Tata cara memperoleh layanan informasi</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '4') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Hak-hak pemohon informasi</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '5') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Sistem Akuntansi Kinerja Pemerintahan (SAKIP)</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '3' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Laporan Realisasi Anggaran</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '3' & $detailLink['level3'] == '2') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Daftar Aset dan Inventaris</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '3' & $detailLink['level3'] == '3') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Pengumuman pengadaan barang dan jasa</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '3' & $detailLink['level3'] == '4') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Laporan akses informasi</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '4' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Penerimaan pegawai</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '6' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Informasi Lain</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '5' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                 </div>

             </div>
         </div>
     </section>
     <!-- if serta merta -->
 <?php elseif ($jenis == 'serta_merta') : ?>
     <section id="informasi">
         <div class="container">
             <div class="row">
                 <h1 class="text-center fw-bolder">Informasi Serta Merta</h1>
                 <hr>
             </div>
             <div class="row">

                 <div class="col">

                     <div class="embed-responsive embed-responsive-1by1 serta-merta-container shadow-lg">
                         <iframe width="100%" height="100%" class="embed-responsive-item" src="<?= $listLink[0]['link']; ?>" allowfullscreen></iframe>

                     </div>
                 </div>

             </div>
         </div>
     </section>
     <!-- if informasi setiap saat -->
 <?php else : ?>
     <section id="informasi">
         <div class="container">
             <div class="row">
                 <h1 class="text-center fw-bolder">Informasi wajib tersedia setiap saat</h1>
                 <hr>
             </div>
             <div class="row">

                 <div class="col">

                     <details>
                         <summary class="level2"> Informasi wajib diumumkan secara berkala</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '1' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Informasi putusan</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Informasi penggunaan biaya perkara</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '2' & $detailLink['level3'] == '2') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Pengawasan dan pendisiplinan</summary>
                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '3' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>
                     </details>
                     <details>
                         <summary class="level2"> Peraturan dan kebijakan</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '4' & $detailLink['level3'] == '1') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Informasi tentang Organisasi, Administrasi, Kepegawaian dan Keuangan</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '5' & $detailLink['level3'] != '4') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                     </details>
                     <details>
                         <summary class="level2"> Informasi lainnya</summary>

                         <div class="col p-3">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Uraian</th>
                                         <th scope="col">Link</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php $i = 1; ?>
                                     <?php foreach ($listLink as $detailLink) : ?>
                                         <?php if ($detailLink['level2'] == '5' & $detailLink['level3'] == '4') : ?>
                                             <tr>
                                                 <td><?= $i++; ?></td>
                                                 <td><?= $detailLink['uraian']; ?></td>
                                                 <td><a class="btn btn-secondary" href="<?= $detailLink['link']; ?>" target="_blank">Link</a></td>

                                             </tr>

                                         <?php endif; ?>
                                     <?php endforeach; ?>
                                 </tbody>
                             </table>

                         </div>

                 </div>

             </div>
         </div>
     </section>

     <!-- if informasi tersedia setiap saat -->
 <?php endif ?>


 <?= $this->endSection(); ?>