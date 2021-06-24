<?= $this->extend('layout/templatePedagang'); ?>

<?= $this->section('content'); ?>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
                data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
            <div class="top-left-part"><a class="logo" href="index.html"><b><img
                            src="/plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img
                            src="/plugins/images/pixeladmin-text.png" alt="home" /></span></a>
            </div>
            <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                <li>
                    <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="profile-pic" href="#"> <img src="../plugins/images/users/ai.png" alt="user-img" width="36"
                            class="img-circle"><b class="hidden-xs">Agus Indra</b> </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li style="padding: 10px 0 0;">
                    <a href="/pages/dashboard" class="waves-effect"><i class="fa fa-home fa-fw"
                            aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a href="profile.html" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Profil</span></a>
                </li>
                <li>
                    <a href="/produk" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Data Barang</span></a>
                </li>
                <li>
                    <a href="/pesanan" class="waves-effect"><i class="fa fa-bell fa-fw" aria-hidden="true"></i><span
                            class="hide-menu">Data Pesanan</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Detail Barang</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /#page-wrapper -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="/img/<?= $produk['gambar']; ?>" alt="..." width="150">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $produk['namaProduk']; ?></h5>
                                        <p class="card-text"><b><?= $produk['keteranganProduk']; ?></b></p>
                                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                        <a href="/produk/edit/<?= $produk['slug']; ?>" class="btn btn-success">Edit</a>

                                        <form action="/produk/<?= $produk['id']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                        </form>

                                        <br><br>
                                        <a href="/produk">Kembali ke daftar produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection(); ?>