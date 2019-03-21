<?php 

namespace Core;
/**
 * HL Framework DB MODEL
 *
 * Developer: Mawia HL
 *
 * 
 */
use PDO;
use App\Config;

abstract class Model{		

	protected static function getDB()
	{
		static $db = null;
		if($db===null){
			try {
				$dsn = 'mysql:host='. Config::DB_HOST. ';dbname='. Config::DB_NAME. ';charset=utf8';
				$db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo $e->getMessage();
			}			
			return $db;
		}
	}

	protected static function raw($sql)
	{
		$stm = self::getDB()->query($sql);
		$result = $stm->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}
	protected static function select($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ, $class = '', $single = null)
	{
		if (strtolower(substr($sql, 0, 7)) !== 'select ') {
            $sql = "SELECT " . $sql;
        }
        $stmt = self::getDB()->prepare($sql);
        foreach ($array as $key => $value) {
            if (is_int($value)) {
                $stmt->bindValue("$key", $value, PDO::PARAM_INT);
            } else {
                $stmt->bindValue("$key", $value);
            }
        }
        $stmt->execute();        

        if ($single == null) {
            return $fetchMode === PDO::FETCH_CLASS ? $stmt->fetchAll($fetchMode, $class) : $stmt->fetchAll($fetchMode);
        } else {
            return $fetchMode === PDO::FETCH_CLASS ? $stmt->fetch($fetchMode, $class) : $stmt->fetch($fetchMode);
        }
    }

    protected static function find($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ, $class = '')
    {    	
        return self::select($sql, $array, $fetchMode, $class, true);
    }

    protected static function count($table, $column= 'id')
    {
        $stmt = self::getDB()->prepare("SELECT $column FROM $table");
        $stmt->execute();
        return $stmt->rowCount();
    }

    protected static function insert($table, $data)
    {
        ksort($data);
        $fieldNames = implode(',', array_keys($data));
        $fieldValues = ':'.implode(', :', array_keys($data));
        $db = self::getDB();
        $stmt =$db->prepare("INSERT INTO $table ($fieldNames) VALUES ($fieldValues)");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $db->lastInsertId();
    }
    protected static function update($table, $data, $where)
    {
        ksort($data);
        $fieldDetails = null;
        foreach ($data as $key => $value) {
            $fieldDetails .= "$key = :$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :$key";
            } else {
                $whereDetails .= " AND $key = :$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        $stmt = self::getDB()->prepare("UPDATE $table SET $fieldDetails WHERE $whereDetails");
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function delete($table, $where, $limit = 1)
    {
        ksort($where);
        $whereDetails = null;
        $i = 0;
        foreach ($where as $key => $value) {
            if ($i == 0) {
                $whereDetails .= "$key = :$key";
            } else {
                $whereDetails .= " AND $key = :$key";
            }
            $i++;
        }
        $whereDetails = ltrim($whereDetails, ' AND ');
        //if limit is a number use a limit on the query
        if (is_numeric($limit)) {
            $uselimit = "LIMIT $limit";
        }
        $stmt = self::getDB()->prepare("DELETE FROM $table WHERE $whereDetails $uselimit");
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public static function truncate($table)
    {
        return self::getDB()->exec("TRUNCATE TABLE $table");
    }



	
}
