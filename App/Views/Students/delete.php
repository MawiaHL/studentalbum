<?php 

echo json_encode([
	'id'=>intval($data),
	'text'=>'<div class="alert alert-success alert-dismissible fade show" id="successmsg" role="alert">
	<strong>Hi!</strong> You have successfully deleted!
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
</div>'
]);
exit;
?>