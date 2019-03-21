<?php 
namespace App\Models;
/*
 *	Student Controller
 *	Model can be editted as necessary
 *	You can also add other static method
 * 
 */
class Student extends \Core\Model{
	public static function getAll()
	{
		return static::select("* FROM student ORDER BY id DESC");		
	}
	public static function getOne($id)
	{
		return static::find("SELECT * FROM student where id=:id", [
			':id' => $id
		]);
	}
	public static function addStudent($data)
	{

		static::insert('student', $data);
	}

	public static function load($pos, $per)
	{
		$page = static::raw("SELECT * FROM student ORDER BY id DESC LIMIT $pos, $per");
		return $page;
	}

	public static function remove($where)
	{
		$result = static::delete('student', $where);
		return $result;
	}
}