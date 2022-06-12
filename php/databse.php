<?php

class Database {

     private PDO $conn;

     public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "stampworld";
        try {

            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully <br>";

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br>";
        }
    }

    function executeDMLCommand($query): bool
    {
        $sql = $query;

        if ($this->conn->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>";
            print_r($this->conn->errorInfo());
            return FALSE;
        }
        return TRUE;
    }

    function executeQuery($query) {
        $sql = $this->conn->prepare ($query);

        if ($sql->execute ()) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function printStatement($st) : void{
         for($i = 0 ; $i < count($st); ++$i){
                print_r($st[$i]);
                echo "<br>";
         }
    }

    /*
     * USERS DML, DQL COMMANDS
     */

    function getUserByName($username)
    {
        $query  = "SELECT * FROM users WHERE username='$username'";
        $result = $this->executeQuery($query);

        return $result;

    }

    function getUserByEmail($email)
    {
        $query  = "SELECT * FROM users WHERE email='$email'";
        $result = $this->executeQuery($query);

        return $result;
    }

    function getUserById($id)
    {
        $query  = "SELECT * FROM users WHERE id='$id'";
        $result = $this->executeQuery($query);

        return $result;
    }
    function createUser($username, $email, $password) : bool{/// passwords must be crypted in db
        $command = "INSERT INTO `users` (
                     `id`, `username`, `email`, 
                     `password`, `stamps_posted`, 
                     `stamps_owned`, `create_datetime`) VALUES 
                    (NULL, '$username', '$email', '$password', '0', '0', NOW())";
        return $this->executeDMLCommand($command);
    }

    function deleteUser($username) : bool{
        $command = "DELETE FROM users WHERE username = '$username'";

        return $this->executeDMLCommand($command);
    }

    /*
     * PRODUCTS DML, DQL COMMANDS
     */


    //$color = "UNKNOWN", $width = "0", $height = "0",$perforations = "0", $issuedDate = ""
    function createStamp($name, $country, $ownerId, $postedId, $category, $price ) : bool{/// passwords must be crypted in db
        $command = "INSERT INTO `stamps` (
                      `id`, `name`, `country`, `owner_id`, `posted_id`,
                      `category`, `likes`, `price`,
                      `posted_datetime`) VALUES 
                (NULL, '$name', '$country', '$ownerId', '$postedId', '$category', '0',
                  '$price', NOW())";
        return $this->executeDMLCommand($command);
    }

    function updateStampColor($stampName,$color) : bool{
        $command = "UPDATE stamps SET color = '$color' WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }
    function updateStampDimensions($stampName,$width,$height) : bool{
        $command = "UPDATE stamps SET width = '$width',height = '$height'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function updateStampPerforations($stampName,$perforations) : bool{
        $command = "UPDATE stamps SET perforations = '$perforations'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function updateStampIssuedDate($stampName,$issuedDate) : bool{
        $command = "UPDATE stamps SET issuedDate = '$issuedDate'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function deleteStamp($username) : bool{
        $command = "DELETE FROM users WHERE username = '$username'";

        return $this->executeDMLCommand($command);
    }

    function getStampByName($stampName)
    {
        $query  = "SELECT * FROM stamps WHERE name='$stampName'";
        $result = $this->executeQuery($query);

        return $result;
    }
}

$db = new Database();

/*
 * how to retrieve user and access it`s data
$user = $db->getUserByName("mihai2096");
echo $user["email"];
*/

/*
* custom query, get count of returned rows, echo rows, echo email of second returned user
$result = $db->executeQuery("select * from users order by id");
echo count($result);
$db->printStatement($result);
echo $result[1]["email"];
*/

/*create / delete users
$db->createUser("username", "username@gmail.com", "mypassword");
$db->deleteUser("username");

* delete all users
$db->executeDMLCommand("DELETE FROM users WHERE id >0");

*/

/*
 *
    createStamp($name, $country, $ownerId, $postedId, $category,$price )
    updateStampColor($stampName,$color)
    updateStampDimensions($stampName,$width,$height)
    updateStampPerforations($stampName,$perforations)
    updateStampIssuedDate($stampName,$issuedDate)
    deleteStamp($username)

 */
//$db->createStamp("stampthree","Romania","2","1","Sports","10");
