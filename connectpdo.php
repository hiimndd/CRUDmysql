<?php
class connectpdo
{	
	private $servername  = 'localhost';
	private $username  = 'root';
	private $password  = '';
	private $dbname = 'sinhvien';
	
	protected $conn;
	
	public function __construct()
	{
		if (!isset($this->conn)) {
			try{
                
                $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
			
						
		}	
		
		return $this->conn;
	}
}
?>


