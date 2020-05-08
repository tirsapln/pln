<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <?php 

                            if($this->session->userdata('level') == "1")
                            { ?>
                            
                            <li>
                                <a href="<?= base_url('realisasi') ?>"><i class="fa fa-table fa-fw"></i> Realisasi <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('realisasi') ?>">Semua Data</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/datatebang') ?>">Tebang</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/datapangkas') ?>">Pangkas</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/datapadam') ?>">Perlu Padam</a>
                                    </li>
    
                                    <li>
                                        <a href="<?= base_url('realisasi/belumrealisasi') ?>">Belum Di Eksekusi</a>
                                    </li>
        
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <li>
                                <a href="<?= base_url('grafik') ?>"><i class="fa fa-pie-chart fa-fw"></i> Grafik</a>
                            </li>
                               
                            <li>
                                <a href="<?= base_url('admin') ?>"><i class="fa fa-file-pdf-o fa-fw"></i> Download PDF <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?= base_url('realisasi/pdftebang') ?>">Tebang</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/pdfpangkas') ?>">Pangkas</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/pdfpadam') ?>">Perlu Padam</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('realisasi/downloadpdf') ?>">Lainnya</a>
                                    </li>
        
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            

                            <li>
                                <a href="<?= base_url('user') ?>"><i class="fa fa-users fa-fw"></i> User</a>
                            </li>

                            <li class="active">
                                <a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                                
                                <!-- /.nav-second-level -->
                            </li>

                            <?php }?>
                            <?php if($this->session->userdata('level') == "2") { ?>

                            <li>
                                <a href="<?= base_url('realisasi') ?>"><i class="fa fa-table fa-fw"></i> Realisasi</a>
                            </li>

                            <li class="active">
                                <a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                                
                                <!-- /.nav-second-level -->
                            </li>

                            <?php }?>

                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                        <h1 class="page-header"><?= $title2 ?></h1>