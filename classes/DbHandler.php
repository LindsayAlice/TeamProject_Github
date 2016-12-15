<?php

/**
 * DbHandler.php
 * Class to handle all database operations
 * This class will have the CRUD methods:
 * C - Create
 * R - Read
 * U - Update
 * D - Delete
 *
 * @author Lindsay
 */

class DbHandler {

    //private connection variable
    private $conn;

    //Constructor class - runs when class is initialized
    function __construct() {
        //initialize database connection when class is instantiated
        require_once dirname(__FILE__ . '/DbConnect.php');
        //Open database
        try {
            $db = new DbConnect();
            $this->conn = $db->connect();
        } catch (Exception $ex) {
            $this::dbConnectError($ex->getCode());
        }
    }//end of constructor
 private function isUserEmailExists($EmailAddress) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) from users WHERE EmailAddress = :EmailAddress");
        $stmt->bindValue(':EmailAddress', $EmailAddress, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchColumn();

        return $num_rows > 0;
    }
    
     private function isUserExists($UserName) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) from users WHERE UserName = :UserName");
        $stmt->bindValue(':UserName', $UserName, PDO::PARAM_STR);
        $stmt->execute();
        $num_rows = $stmt->fetchColumn();

        return $num_rows > 0;
    }
    
        private static function dbConnectError($code) {
        switch ($code) {
            case 1045:
                echo "A database access error has occured!";
                break;
            case 2002:
                echo "A database server error has occured!";
                break;
            default:
                echo "An server error has occured!";
                break;
        }
    }//End of DbConnectError 
    
    public function getPosts($Postid) {
        try {
            //Prepare our sql query
            $stmt = $this->conn->prepare("SELECT title, description, content  
                                         FROM pages 
                                         WHERE id=:id");

            //Bind the query parameters
            $stmt->bindValue(':Postid', $Postid, PDO::PARAM_INT);

            //Execute the query
            $stmt->execute();

            //Fetch the data as associative array
            $page = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //return array of data items
            $data = array(
                'error' => false,
                'items' => $page
            );
        } catch (Exception $ex) {
            $data = array('error' => true,
                'message' => $ex->getMessage()
            );
        }
        //return the data array 
        return $data;
    }
    
    
     public function getPostList() {
        //build the sql query
        $sql = "SELECT id, title, description FROM pages ORDER BY title";

        //try to fetch all records
        try {
            $stmt = $this->conn->query($sql);
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = array(
                'error' => false,
                'items' => $Posts
            );
        } catch (PDOException $ex) {
            $data = array(
                'error' => true,
                'message' => $ex->getMessage()
            );
        }

        //return the data array 
        return $data;
    }//End of getArticleList

      public function createUser ($FirstName,$LastName,$EmailAddress,$HeardAboutUs,$JoiningReason,$UserName,$UserPassword) {
        // First check if user already existed in db
          
        if (!$this->isUserEmailExists($EmailAddress) and !$this->isUserExists($UserName)) {
            // Generating password hash
            $password_hash = PassHash::hash($UserPassword);

            // Make activation code
            $active = md5(uniqid(rand(), true));

            $stmt = $this->conn->prepare("INSERT INTO Users"
                    . "(EmailAddress,FirstName,LastName,HeardAboutUs,JoiningReason,UserName,UserPassword) "
                    . "values(:Email_Address,:First_Name,:Last_Name,:Heard_About_Us,:Joining_Reason,:User_Name,:User_Password)");

            $stmt->bindValue(':First_Name', $FirstName, PDO::PARAM_STR);
            $stmt->bindValue(':Last_Name', $LastName, PDO::PARAM_STR);
            $stmt->bindValue(':Email_Address', $EmailAddress, PDO::PARAM_STR);
            $stmt->bindValue(':Heard_About_Us', $HeardAboutUs, PDO::PARAM_STR);
	    $stmt->bindValue(':Joining_Reason', $JoiningReason, PDO::PARAM_STR);            
            $stmt->bindValue(':User_Name', $UserName, PDO::PARAM_STR);
            $stmt->bindValue(':User_Password', $password_hash, PDO::PARAM_STR);

            $result = $stmt->execute();


            // Check for successful insertion

            if ($result) {
                // User successfully inserted
                $data = array(
                    'error' => false,
                    'message' => 'USER_CREATE_SUCCESS',
                    'active' => $active
                );
            } else {
                // Failed to create user
                $data = array(
                    'error' => true,
                    'message' => 'USER_CREATE_FAIL',
                );
            }
        } else {
            // User with same email already existed in the db
            $data = array(
                'error' => true,
                'message' => 'USER_ALREADY_EXISTS'
            );
        }
    
    
    
    
    
    
}

} 

?>  
