
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
  <div class="row">
      <div class="col-lg-6">
        <?php if(validation_errors()) : ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <div class="row">
    
      <div class="col-lg">
        <?php echo $this->session->flashdata('message'); ?>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
        Add New Submenu
        </button>
        <table class="table table-hover">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Url</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Active</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($subMenu as $sm): ?>
            <tr>
              <td scope="row"><?= $i; ?></td>
              <td><?= $sm['title'] ?></td>
              <td><?= $sm['menu'] ?></td>
              <td><?= $sm['url'] ?></td>
              <td><?= $sm['icon'] ?></td>
              <td><?php if($sm['is_active'] == 1){echo "Active";}else{echo "Not Actived";} ?></td>
              <td>
                  <a href="<?= site_url('menu/sm_edit/' . $sm['id']) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="<?= site_url('menu/sm_delete/' . $sm['id']); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
          </tr>
          <?php $i++;endforeach; ?>
      </tbody>
  </table>
</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal  Hapus-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form accept="<?php echo site_url('Menu/submenu'); ?>" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select class="form-control" name="menu_id" id="menu_id">
                          <option disabled selected>Select Menu</option>
                          <?php foreach($menu as $m): ?>
                            <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="Url">
                    </div>
                    <div class="form-group">
                      <label for="icon">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input type="checkbox" name="is_active" id="is_active" class="form-check-input" placeholder="Menu" checked value="1">
                        <label for="is_active" class="form-check-label">Active?</label>
                      </div>
                        
                    </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="hapus_biodata">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

