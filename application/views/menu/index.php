
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <div class="row">
      <div class="col-lg-6">
        <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?php echo $this->session->flashdata('message'); ?>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">
        Add New Menu
        </button>
        <table class="table table-hover">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $i=1;foreach($menu as $m): ?>
            <tr>
              <td scope="row"><?= $i; ?></td>
              <td><?= $m['menu'] ?></td>
              <td>
                  <a href="<?= site_url('menu/m_edit/' . $m['id']) ?>" class="badge badge-success">Edit</a>
                  <a href="<?= site_url('menu/m_delete/' . $m['id']); ?>" class="badge badge-danger">Delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form accept="<?php echo site_url('Menu/index'); ?>" method="post">
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <input type="text" name="menu" id="menu" class="form-control">
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

