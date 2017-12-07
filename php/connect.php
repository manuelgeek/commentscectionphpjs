<?php
class Database
{
	// public date_default_timezone_set('America/New_York');
	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbname = 'commentsjs';
	public $connect;
     
    public function dbConnection()
	{
     
	    $this->connect = null;    
        try
		{
			$this->connect = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname) or die(mysqli_error($connect));
		}
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->connect;
	}

}
?>
