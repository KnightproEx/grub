<?php

class db {

	//database connection constants
	private const host = "127.0.0.1";
	private const username = "root";
	private const passwd = "";
	private const db = "grub";

	//database connection object
	private $con = NULL;

	//query variables
	private $stmt = NULL;
	private $result = NULL;
	private $row = 0;
	private $error = "";


	//constructor and destructor
	public function __construct() {
		@$this -> con = new mysqli(self::host, self::username, self::passwd, self::db);

		if ($this -> con -> connect_errno) {
			exit("Database connection error!");
		}
	}

	public function __destruct() {
		if (is_resource($this -> con) && get_resource_type($this -> con) == "mysql link") {
			$this -> con -> close();
		}
	}


	//query execution function, return false upon query and parameter error
	//type: integer(i), double(d), string(s), BLOB(b)
	public function query($query, array $paramArray) {
		$this -> result = NULL;
		$this -> row = 0;
		$this -> error = "";

		if (@$this -> stmt = $this -> con -> prepare($query)) {
			if (@$this -> exQuery($paramArray)) {
				return TRUE;
			}
		}

		$this -> error = $this -> con -> error;
		return FALSE;
	}

	public function exQuery(array $paramArray) {
		if (@call_user_func_array(array($this -> stmt, "bind_param"), $paramArray)) {

			if (@$this -> stmt -> execute()) {

				$this -> result = $this -> stmt -> get_result();
				$this -> stmt -> close();

				if (is_object($this -> result)) {
					$this -> row = $this -> result -> num_rows;
				}

				return TRUE;
			}
		}

		$this -> error = $this -> con -> error;
		return FALSE;
	}


	//getter
	public function getResult() {
		return $this -> result;
	}

	public function getRow() {
		return $this -> row;
	}

	public function getError() {
		return $this -> error;
	}

}


//instantiate class
$db = new db();

?>
