<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'employee');

class DB_con
	{
	function __construct()
	{
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		mysql_select_db(DB_NAME, $conn);
	}
	
	public function insert($Year, $EmployeeCount)
	{
		//echo "INSERT tbl_employee(Year, EmployeeCount, 'UpdatedOn') VALUES($Year, $EmployeeCount, NOW())";
		$sql = "INSERT INTO `tbl_employee` (`SerialNo`, `Year`, `EmployeeCount`, `UpdatedOn`) VALUES (NULL, '$Year', '$EmployeeCount', NOW());";

		if(mysql_query($sql))
		{
			echo "Year Successfully Inserted";
		}else{
			echo "Year Already Exist";
		}
	}
	
	public function select()
	{
		$query = "select Year,EmployeeCount, if(@last_entry = 0,0,((EmployeeCount - @last_entry))) as 'Perecentage', @last_entry := EmployeeCount from (select @last_entry := 0) x, (select Year, EmployeeCount from tbl_employee group by Year) y";
		$res = mysql_query($query);
		return $res;
	}
}

?>