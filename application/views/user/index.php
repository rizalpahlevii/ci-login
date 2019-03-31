
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
  <!-- card -->
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?php echo base_url('assets/image/profile/'. $user->image); ?>" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user->name ?></h5>
          <p class="card-text"><?= $user->email ?></p>
          <p class="card-text"><small class="text-muted">Member since <?= date('D F Y', $user->date_created); ?></small></p>
        </div>
      </div>
    </div>
  </div>
  <!-- end card -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

