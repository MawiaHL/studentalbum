<?php foreach($data as $row):	?>
<div class="col-md-4">
  <div class="card mb-4 shadow-sm"><?php 
		echo '<img class="bd-placeholder-img card-img-top" width="100%" height="225" src="data:image/jpeg;base64,'.base64_encode(stripslashes($row->photo)).'"/>';
			?>
    <div class="card-body">
      <h5 class="card-title"><?php echo $row->stname; ?></h5>
      <p class="card-text">Address: <?php echo $row->address; ?></p>       
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary view" data-remote="students/<?php echo $row->id; ?>/single" data-toggle="modal" data-target=".bd-example-modal-xl">View</button>
              <button type="button" class="btn btn-sm btn-outline-success">Edit</button>
              <button type="button" class="btn btn-sm btn-outline-danger" 
              onclick="deleteStudent(<?php echo $row->id; ?>)">Delete</button>
          </div>
          <small class="text-muted"><?php echo date('d-m-Y h:i:sA', strtotime($row->uploadDate)); ?></small>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>