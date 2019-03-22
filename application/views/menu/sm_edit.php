
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <div class="row">
      <div class="col-lg-4">
        <form action="<?php echo site_url('menu/sm_update'); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $tmp->id ?>">
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control" value="<?php echo $tmp->title ?>">
              <?php echo form_error('title', '<small class="text-danger pl-3">','</small>'); ?>
          </div>
          <div class="form-group">
              <label for="menu_id">Menu</label>
              <select class="form-control" name="menu_id" id="menu_id">
                <?php foreach($menu as $m) : ?>
                  <option <?php if($tmp->menu_id == $m->id){echo "selected";} ?> value="<?php echo $m->id ?>"><?php echo $m->menu ?></option>
                <?php endforeach; ?>
              </select>
              <?php echo form_error('menu_id', '<small class="text-danger pl-3">','</small>'); ?>
          </div>
          <div class="form-group">
              <label for="url">Url</label>
              <input type="text" name="url" id="url" class="form-control" value="<?php echo $tmp->url ?>">
               <?php echo form_error('url', '<small class="text-danger pl-3">','</small>'); ?>
          </div>
          <div class="form-group">
              <label for="icon">Icon</label>
              <input type="text" name="icon" id="icon" class="form-control" value="<?php echo $tmp->icon ?>">
               <?php echo form_error('icon', '<small class="text-danger pl-3">','</small>'); ?>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" name="is_active" id="is_active" class="form-check-input" placeholder="Menu" value="1" <?php if($tmp->is_active == 1){echo "checked";} ?>>
              <label for="is_active" class="form-check-label">Active?</label>
            </div>              
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


