<?php 
namespace App\Controllers;
/*
 *	Student Controller
 *	Controller can be editted
 * 
 */
use \Core\View;
use App\Models\Student;

class Students extends \Core\Controller{
	public function indexAction()
	{
		$students = Student::getAll();
		View::render('Students/index.php', [
			'allstudent'=>$students
		]);
	}
	public function singleAction()
	{
		$students = $this->route_params['id'];
		$single = Student::getOne($students);
		View::render('Students/single.php', [
			'row'=>$single
		]);
	}

	public function AddAction()
	{
		//get form input
		$msg = "";
		$hming = isset($_POST['student'])? filter_var($_POST['student'],FILTER_SANITIZE_STRING):'';
		$gender = isset($_POST['sex'])? $_POST['sex']:'';
		$bd = isset($_POST['dob'])? $_POST['dob']:'';
		$veng = isset($_POST['address'])? filter_var($_POST['address'], FILTER_SANITIZE_STRING):'';
		$mail = isset($_POST['email'])? filter_var($_POST['email'],FILTER_VALIDATE_EMAIL):'';
		if (!empty($_FILES)) {
			$thlalak = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		}else{			
			$msg = "File not uploaded, Please choose a file to upload";
			$thlalak = "";
		}
		
		$name = !empty($hming)? $hming: $msg = "Name is not provided";
		$sex = !empty($gender)? $gender: $msg = "Sex is not provided";
		$dob = !empty($bd)? date('Y-m-d', strtotime($bd)): $msg = "DOB is not provided";
		$email = !empty($mail)? $mail: $msg = "Email is not provided";
		$photo = !empty($thlalak)? $thlalak: $msg = "Photo is not provided";
		
		$data = [
			'stname'=>$name,
			'sex'=>$sex,
			'dob'=>$dob,
			'address'=>$veng,
			'email'=>$email,
			'photo'=>$photo
		];
		if(!empty($msg)){
			View::render('Students/error.php',['error'=>$msg]);	
		}else{
			$lastid = Student::addStudent($data);
			//View::render('Students/index.php',['success'=>$lastid]);
			View::render('Students/success.php',['success'=>'You have successfully saved...']);	
		}			
	}
	public function loadMoreAction()
	{
		$page = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		$perpage = 6;
		$position = (($page-1) * $perpage);
		$data = Student::load($position, $perpage);
		View::render('Students/allstudent.php',['data'=>$data]);
	}

	public function deleteAction()
	{
		$id = $this->route_params['id'];
		$where = ['id' => $id];
		$result = Student::remove($where);
		View::render('Students/delete.php',['data'=>$result]);
	}
}