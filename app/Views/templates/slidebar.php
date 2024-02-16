 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
         <div class="sidebar-brand-icon">
             <i class="fas fa-solid fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-7"><?= user()->username; ?></div>
     </a>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- nav item - dashboard User -->
     <li class="nav-item">
         <a class="nav-link" href="/">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>


     <?php if (in_groups('admin')) : ?>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             User Management
         </div>

         <!-- Nav Item - User List -->
         <li class="nav-item">
             <a class="nav-link" href="<?= base_url('admin'); ?>">
                 <i class="fas fa-solid fa-users"></i>
                 <span>User List</span></a>
         </li>

     <?php endif; ?>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         User Profile
     </div>

     <!-- Nav Item - My profile -->
     <li class="nav-item">
         <a class="nav-link" href="<?= base_url('user'); ?>">
             <i class="fas fa-solid fa-user"></i>
             <span><?= user()->username; ?></span></a>
     </li>
     <?php if (in_groups('user')) : ?>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-cog"></i>
                 <span>Data <?= user()->lokasi; ?></span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Pilih data:</h6>
                     <form action="<?= base_url('user/datathl') ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Anggota <?= user()->lokasi; ?></button>
                     </form>

                 </div>
             </div>
         </li>
     <?php endif; ?>

     <?php if (in_groups('user_thl')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Kegiatan Kerja</span>
             </a>
             <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Kegiatan :</h6>
                     <form action="<?= base_url('thl/laporan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Terkirim</button>
                     </form>
                     <form action="<?= base_url('thl/laporan_disetujui'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Yang Disetujui</button>
                     </form>
                     <form action="<?= base_url('thl/laporan_tidak_disetujui'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Tidak Disetujui</button>
                     </form>
                 </div>
             </div>
         </li>
     <?php endif; ?>

     <?php if (in_groups('user_thl')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Berhalangan Kerja</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Laporan Berhalangan :</h6>
                     <form action="<?= base_url('user/detail_laporan_berhalangan/' . user()->id); ?>" method="post">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Status Kerja Saya</button>
                     </form>
                     <form action="<?= base_url('thl/THL_berhalangan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->username; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Daftar Berhalangan Saya</button>
                     </form>

                 </div>
             </div>
         </li>
     <?php endif; ?>

     <?php if (in_groups('user')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Laporan Kinerja</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Laporan :</h6>
                     <form action="<?= base_url('thl/laporan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Masuk</button>
                     </form>
                     <form action="<?= base_url('thl/laporan_disetujui'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Yang Disetujui</button>
                     </form>
                     <form action="<?= base_url('thl/laporan_tidak_disetujui'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Tidak Disetujui</button>
                     </form>
                     <a class="collapse-item" href="<?= base_url('laporan/index'); ?>">Print Laporan</a>
                 </div>
             </div>
         </li>
     <?php endif; ?>

     <?php if (in_groups('user')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Berhalangan Kerja</span>
             </a>
             <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Data Berhalangan :</h6>
                     <form action="<?= base_url('user/Daftar_anggota_berhalangan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="Saya Berhalangan/tidak Kerja Hari ini">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Masuk</button>
                     </form>
                     <form action="<?= base_url('thl/THL_berhalangan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="<?= user()->lokasi; ?>">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Disetujui</button>
                     </form>
                     <form action="<?= base_url('user/anggota_berhalangan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="Hari ini Anda Berhalangan">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Daftar Berhalangan</button>
                     </form>
                     <a class="collapse-item" href="<?= base_url('laporan/print_laporan_berhalangan'); ?>">Print Laporan</a>
                 </div>
             </div>
         </li>
     <?php endif; ?>

     <?php if (in_groups('admin')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Monitoring Kinerja</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Monitoring :</h6>
                     <div class="container">
                         <div class="row">
                             <a href="<?= base_url('thl/laporan'); ?>" class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Masuk</a>
                             <a href="<?= base_url('thl/laporan_disetujui'); ?>" class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Yang Disetujui</a>
                             <a href="<?= base_url('thl/laporan_tidak_disetujui'); ?>" class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Laporan Tidak Disetujui</a>
                         </div>
                     </div>
                 </div>
             </div>
         </li>
     <?php endif; ?>
     <?php if (in_groups('admin')) : ?>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Berhalangan Kerja</span>
             </a>
             <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Data Berhalangan :</h6>
                     <form action="<?= base_url('user/anggota_berhalangan'); ?>" method="post">
                         <input type="hidden" id="cari" name="cari" value="Hari ini Anda Berhalangan">
                         <button class="collapse-item btn btn-sm btn-light" type="submit" name="submit">Daftar Berhalangan</button>
                     </form>
                 </div>
             </div>
         </li>
     <?php endif; ?>




     <!-- Divider -->
     <hr class="sidebar-divider">


     <?php if (in_groups('user_thl')) : ?>
         <!-- Heading -->
         <!-- <div class="sidebar-heading">
             Addons
         </div> -->

         <!-- Nav Item - Pages Collapse Menu -->
         <!-- <li class="nav-item active">
             <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="fas fa-fw fa-folder"></i>
                 <span>Pages</span>
             </a>
             <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Login Screens:</h6>
                     <a class="collapse-item" href="#">Login</a>
                     <a class="collapse-item" href="#">Register</a>
                     <a class="collapse-item" href="#">Forgot Password</a>
                     <div class="collapse-divider"></div>
                     <h6 class="collapse-header">Other Pages:</h6>
                     <a class="collapse-item" href="#">404 Page</a>
                     <a class="collapse-item active" href="#">Blank Page</a>
                 </div>
             </div>
         </li> -->
     <?php endif; ?>
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="#">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Charts</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="#">
             <i class="fas fa-fw fa-table"></i>
             <span>Tables</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Logout -->
     <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('logout'); ?>">
             <i class="fas fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->