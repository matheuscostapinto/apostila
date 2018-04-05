<?php
# Usage:
#   $db = new db();
#
#   // table, data
#   $db->create('users', array(
#     'fname' => 'john',
#     'lname' => 'doe'
#   ));
#   
#   // table, where, where-bind
#   $db->read('users', "fname LIKE :search", array(
#     ':search' => 'j%'
#   ));
#
#   // table, data, where, where-bind
#   $db->update('users', array(
#     'fname' => 'jame'
#   ), 'gender = :gender', array(
#     ':gender' => 'female'
#   ));
#   
#   // table, where, where-bind
#   $db->delete('users', 'lname = :lname', array(
#     ':lname' => 'doe'
#   ));

class Model
{
	public $connection;
	
    public function __construct() {
		
		global $db;
		
        $dbhost = $db['db_host'];
        $dbuser = $db['db_username'];
        $dbpass = $db['db_password'];
        $dbname = $db['db_name'];
		
        $options = array(
            PDO::ATTR_PERSISTENT => false, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_EMULATE_PREPARES => false
        );

        try {
            switch($db["db_driver"]) {
                case "oracle":
                    $conn = "oracle:host={$dbhost};dbname={$dbname}";
                    break;
                case "mysql":
                    $conn = "mysql:host={$dbhost};dbname={$dbname}";
                    break;
                    echo "Driver de banco de dados sem suporte! Verifique a configuração.";
                default:
					//Para a execução
                    exit(1);
            }

            $this->connection = new PDO($conn, $dbuser, $dbpass, $options);
            
        } catch(PDOException $e) {
            echo $e->getMessage(); 
			exit(1);
        }
    }

    function run($sql, $bind=array()) {
		$sql = trim($sql);
        
        try {

            $result = $this->connection->prepare($sql);
			$result->execute($bind);
		    return $result;

        } catch (PDOException $e) {
            echo $e->getMessage(); 
			exit(1);
        }
    }

    function create($table, $data) {
        $fields = $this->filter($table, $data);

        $sql = "INSERT INTO " . $table . " (" . implode($fields, ", ") . ") VALUES (:" . implode($fields, ", :") . ");";

        $bind = array();
        foreach($fields as $field)
            $bind[":$field"] = $data[$field];

        $result = $this->run($sql, $bind);
        return $this->connection->lastInsertId();
    }

    function read($table, $where="", $bind=array(), $fields="*") {
        $sql = "SELECT " . $fields . " FROM " . $table;
        if(!empty($where))
            $sql .= " WHERE " . $where;
        $sql .= ";";
		
		$result = $this->run($sql, $bind);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $rows = array();
        while($row = $result->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }

    function update($table, $data, $where, $bind=array()) {
        $fields = $this->filter($table, $data);
        $fieldSize = sizeof($fields);

        $sql = "UPDATE " . $table . " SET ";
        for($f = 0; $f < $fieldSize; ++$f) {
            if($f > 0)
                $sql .= ", ";
            $sql .= $fields[$f] . " = :update_" . $fields[$f]; 
        }
        $sql .= " WHERE " . $where . ";";

        foreach($fields as $field)
            $bind[":update_$field"] = $data[$field];
        
        $result = $this->run($sql, $bind);
        return $result->rowCount();
    }

    function delete($table, $where, $bind="") {
        $sql = "DELETE FROM " . $table . " WHERE " . $where . ";";
        $result = $this->run($sql, $bind);
        return $result->rowCount();
    }

    private function filter($table, $data) {
		global $db;
        $driver = $db['db_driver'];

        if($driver == 'sqlite') {
            $sql = "PRAGMA table_info('" . $table . "');";
            $key = "name";
        } elseif($driver == 'mysql') {
            $sql = "DESCRIBE " . $table . ";";
            $key = "Field";
        } else {    
            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '" . $table . "';";
            $key = "column_name";
        }   

        if(false !== ($list = $this->run($sql))) {
            $fields = array();
            foreach($list as $record)
                $fields[] = $record[$key];
            return array_values(array_intersect($fields, array_keys($data)));
        }

        return array();
    }
}
