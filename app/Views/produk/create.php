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
                    <a href="/profile" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span
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
                    <h4 class="page-title">Tambah Data</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /#page-wrapper -->
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <form action="/produk/save" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label for="namaProduk" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?= ($validation->hasError('namaProduk')) ? 'is-invalid' : ''; ?>"
                                        id="namaProduk" name="namaProduk" autofocus value="<?= old('namaProduk'); ?>">
                                    <div class="invalid-feedback">
                                        <?= ($validation->getError('namaProduk')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="hargaProduk" class="col-sm-2 col-form-label">Harga Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hargaProduk" name="hargaProduk"
                                        value="<?= old('hargaProduk'); ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="stokProduk" class="col-sm-2 col-form-label">Stok Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="stokProduk" name="stokProduk"
                                        value="<?= old('stokProduk'); ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="keteranganProduk" class="col-sm-2 col-form-label">Keterangan Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keteranganProduk"
                                        name="keteranganProduk" value="<?= old('keteranganProduk'); ?>">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" class="img-thumbnail img-preview">
                                </div>

                                <div class="col-sm-8">
                                    <div class="input-group mb-3">

                                        <input type="file"
                                            class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>"
                                            id="gambar" name="gambar" onchange="previewImg()">
                                        <div class="invalid-feedback">
                                            <?= ($validation->getError('gambar')); ?>
                                        </div>
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?= $this->endSection(); ?>