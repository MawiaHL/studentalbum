<?php 
echo json_encode([
	'name'=>$row->stname,
	'sex'=>$row->sex,
	'dob'=>date('d.m.Y', strtotime($row->dob)),
	'address'=>$row->address,
	'email'=>$row->email,
	'date'=>$row->uploadDate
]);
exit;
?>
