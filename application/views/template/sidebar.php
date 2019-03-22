<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">WPU ADMIN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <?php 
  $roleId = $this->session->userdata('role_id');
  $queryMenu = "SELECT user_menu.id, user_menu.menu FROM user_menu JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id WHERE user_access_menu.role_id = $roleId ORDER BY user_access_menu.menu_id ASC";
  $menu = $this->db->query($queryMenu)->result_array();

  ?>
  <!-- LOOPING MENU -->
  <?php foreach($menu as $m) : ?>
    <div class="sidebar-heading">
      <?php echo $m['menu'] ?>
    </div>
    <!-- LOOPING SUB-MENU -->
    <?php
    $menuId = $m['id'];
    $querySubMenu = "SELECT * FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id WHERE user_sub_menu.menu_id = $menuId AND user_sub_menu.is_active = 1";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>
    <?php foreach($subMenu as $sm) :  ?>
      <li class="nav-item <?php if($title == $sm['title']){echo "active";} ?>">
        <a class="nav-link" href="<?php echo site_url($sm['url']) ?>">
          <i class="<?php echo $sm['icon'] ?>"></i>
          <span><?php echo $sm['title']; ?></span>
        </a>
      </li>
      
    <?php endforeach; ?>
    <hr class="sidebar-divider">
  <?php endforeach; ?>
  


  <li class="nav-item">
    <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
    </li>
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->
