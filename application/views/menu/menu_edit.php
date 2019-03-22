
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <div class="row">
      <div class="col-lg-4">
        <form action="<?php echo site_url('menu/m_update'); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $tmp->id ?>">
          <div class="form-group">
              <label for="menu">Menu</label>
              <input type="text" name="menu" id="menu" class="form-control" value="<?php echo $tmp->menu ?>">
          </div>
          <input type="submit" name="submit" value="Edit" class="btn btn-primary">
          <a href="<?php echo site_url('menu'); ?>" class="btn btn-dark">Back</a>
        </form>
      </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


