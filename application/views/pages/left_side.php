  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
<!--       <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
 -->      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url()."/kategori" ?>">
                <i class="fa fa-table"></i> <span>Kategori</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url()."/supplier" ?>">
                <i class="fa fa-table"></i> <span>Supplier</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url()."/pelanggan" ?>">
                <i class="fa fa-table"></i> <span>Pelanggan</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url()."/barang" ?>">
                <i class="fa fa-table"></i> <span>Barang</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="<?php echo site_url()."/pembelian" ?>">
                <i class="fa fa-book"></i> <span>Pembelian</span>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
