<?php

class Database
{

    private PDO $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "stampworld";
        try {

            $this->conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully <br>";
        } catch (PDOException $e) {
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

    function executeQuery($query)
    {
        $sql = $this->conn->prepare($query);

        if ($sql->execute()) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function printStatement($st): void
    {
        for ($i = 0; $i < count($st); ++$i) {
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
        return $this->executeQuery($query);
    }

    function getUserByEmail($email)
    {
        $query  = "SELECT * FROM users WHERE email='$email'";
        return $this->executeQuery($query);
    }

    function getUserById($id)
    {
        $query  = "SELECT * FROM users WHERE id='$id'";
        return $this->executeQuery($query);
    }
    function createUser($username, $email, $password): bool
    { /// passwords must be crypted in db
        $command = "INSERT INTO `users` (
                     `id`, `username`, `email`, 
                     `password`, `stamps_posted`, 
                     `stamps_owned`, `create_datetime`) VALUES 
                    (NULL, '$username', '$email', '$password', '0', '0', NOW())";
        return $this->executeDMLCommand($command);
    }

    function deleteUser($username): bool
    {
        $command = "DELETE FROM users WHERE username = '$username'";

        return $this->executeDMLCommand($command);
    }

    /*
     * PRODUCTS DML, DQL COMMANDS
     */


    //$color = "UNKNOWN", $width = "0", $height = "0",$perforations = "0", $issuedDate = ""
    function createStamp($name, $country, $ownerId, $postedId, $category, $price): bool
    { /// passwords must be crypted in db
        /// se face verificarea ca userii sa existe
        $result = $this->getUserById($ownerId);
        if (count($result) === 0) {
            echo "Owner $ownerId does not exist<br>";
            return false;
        }

        $result = $this->getUserById($postedId);
        if (count($result) === 0) {
            echo "Posted $postedId does not exist<br>";
            return false;
        }

        $command = "UPDATE users SET stamps_posted = stamps_posted + 1 WHERE id = $postedId";
        $this->executeDMLCommand($command);

        $command = "UPDATE users SET stamps_owned = stamps_owned + 1 WHERE id = $ownerId";
        $this->executeDMLCommand($command);

        $command = "INSERT INTO `stamps` (
                      `id`, `name`, `country`, `owner_id`, `posted_id`,
                      `category`, `likes`, `price`,
                      `posted_datetime`) VALUES 
                (NULL, '$name', '$country', '$ownerId', '$postedId', '$category', '0',
                  '$price', NOW())";
        return $this->executeDMLCommand($command);
    }

    function updateStampColor($stampName, $color): bool
    {
        $command = "UPDATE stamps SET color = '$color' WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }
    function updateStampDimensions($stampName, $width, $height): bool
    {
        $command = "UPDATE stamps SET width = '$width',height = '$height'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function updateStampPerforations($stampName, $perforations): bool
    {
        $command = "UPDATE stamps SET perforations = '$perforations'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function updateStampIssuedDate($stampName, $issuedDate): bool
    {
        $command = "UPDATE stamps SET issuedDate = '$issuedDate'  WHERE name = '$stampName'";
        return $this->executeDMLCommand($command);
    }

    function deleteStamp($stampName): bool
    {
        $result = $this->getStampByName($stampName);
        $oldUserId = $result[0]["owner_id"];
        if (count($result) !== 0) {
            $command = "UPDATE users SET stamps_owned = stamps_owned - 1 WHERE id = $oldUserId";
            $this->executeDMLCommand($command);
        }
        $command = "DELETE FROM stamps WHERE name = '$stampName'";

        return $this->executeDMLCommand($command);
    }

    function getStampByName($stampName)
    {
        $query  = "SELECT * FROM stamps WHERE name='$stampName'";
        return $this->executeQuery($query);
    }

    function getStampById($id)
    {
        $query  = "SELECT * FROM stamps WHERE id='$id'";
        return $this->executeQuery($query);
    }


    /*
     * CATALOGUE DML, DQL COMMANDS
    */

    function createCatalogueRelation($name, $idUser, $idStamp): bool
    { /// passwords must be crypted in db
        /// se face verificare ca id urile sa corespunda unor obiecte existene in baza de date
        /// se face verificarea ca relatia sa nu existe deja
        $result = $this->getUserById($idUser);
        if (count($result) === 0) {
            echo "User $idUser does not exist<br>";
            return false;
        }

        $result = $this->getStampById($idStamp);
        if (count($result) === 0) {
            echo "Stamp $idStamp does not exist<br>";
            return false;
        }

        $result = $this->getCatalogueRelation($name, $idUser, $idStamp);
        if (count($result) === 0) {
            $command = "INSERT INTO `catalogue` 
                    (`id`, `name`, `id_user`,
                     `id_stamp`, `created_datetime`) VALUES 
                    (NULL, '$name', '$idUser','$idStamp', NOW())";
            return $this->executeDMLCommand($command);
        }

        echo "Relation already exist<br>";
        return false;
    }

    function deleteCatalogueRelation($name, $idUser, $idStamp): bool
    {
        $command = "DELETE FROM catalogue WHERE name = '$name' AND
                                             id_user = $idUser AND
                                             id_stamp = $idStamp";

        return $this->executeDMLCommand($command);
    }

    function getCatalogueRelation($name, $idUser, $idStamp)
    {

        $query  = "SELECT * FROM catalogue WHERE name = '$name' AND
                                             id_user = $idUser AND
                                             id_stamp = $idStamp";
        return $this->executeQuery($query);
    }


    /*
     * GENERAL DML, DQL COMMANDS
    */

    function likeStamp($userId, $stampId): bool
    {

        $result = $this->getUserById($userId);
        if (count($result) === 0) {
            echo "User $userId does not exist<br>";
            return false;
        } else {
            $result = $this->getStampById($stampId);
            if (count($result) === 0) {
                echo "Stamp $stampId does not exist<br>";
                return false;
            } else {
                $username = $this->getUserById($userId)[0]["username"];
                $this->createCatalogueRelation("$username`s Liked Stamps", "$userId", "$stampId");

                $command = "UPDATE stamps SET likes = likes + 1 WHERE id = $stampId";
                return $this->executeDMLCommand($command);
            }
        }
    }

    function changeOwnerOfStamp($stampId, $newOwnerId): bool
    {

        $result = $this->getStampById($stampId);
        if (count($result) === 0) {
            echo "Stamp $stampId does not exist<br>";
            return false;
        }
        $oldUserId = $result[0]["owner_id"];

        $result = $this->getUserById($newOwnerId);
        if (count($result) === 0) {
            echo "User $newOwnerId does not exist<br>";
            return false;
        }


        $command = "UPDATE users SET stamps_owned = stamps_owned - 1 WHERE id = $oldUserId";
        $this->executeDMLCommand($command);

        $command = "UPDATE users SET stamps_owned = stamps_owned + 1 WHERE id = $newOwnerId";
        $this->executeDMLCommand($command);

        $command = "UPDATE stamps SET owner_id = $newOwnerId WHERE id = $stampId";
        return $this->executeDMLCommand($command);
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
    deleteStamp($stampName)

 */
//$db->createStamp("stampthree","Romania","2","1","Sports","10");

/* relatii de catalog
$db->createCatalogueRelation("relation1","1","2");
$db->deleteCatalogueRelation("catalogue1","2","3");
$db->getCatalogueRelation("catalogue1","2","3");
*/


 //* clear database
//$db->executeDMLCommand("DELETE FROM users WHERE id >0");
//$db->executeDMLCommand("DELETE FROM stamps WHERE id >0");
//$db->executeDMLCommand("DELETE FROM catalogue WHERE id >0");

/*
$db->createUser("mihai2000", "mihai2000@gmail.com", "a80b568a237f50391d2f1f97beaf99564e33d2e1c8a2e5cac21ceda701570312");
$db->createUser("grigo32", "grigo32@gmail.com", "65bb1cc2fd5feddea98e1d9e3ec89fae2a3f50ed42d6fb96962ef8cd0e2cfcb7");
$db->createUser("radutzuthau22", "radutzuthau22@gmail.com", "a425646a44e2848077cf4fee5d1e4c29e6bdc09f1f555754a6acb17f8f4a7b89");
$db->createUser("ciobotaru99", "ciobotaru99@gmail.com", "2d4a1c01e0a36a573dc256a99b62b1eb6b732bcf5024287329de3b4b6f66d967");
$db->createUser("vladu421", "vladu421@gmail.com", "c6235179f8e89e5f9fd6d1817c6bbe3c54c50f40f4921e6cde6d6e5742642987");
$db->createUser("gigelfrone29", "gigelfrone29@gmail.com", "ed947a8e55e7738e5398e1610f58dfaf76de70c58f63d4aef7127e442267f7d5");
$db->createUser("magicianul00", "magicianul00@gmail.com", "d6960aa22fb1b8d5b12170b95472ed51d796e2eb7395b5d6bd86d1a9c032515f");
$db->createUser("hackeru68", "hackeru68@gmail.com", "cf282194178772ff05740cb60f42f47f2fc13c17c368b51118651f8d41b9a495");
$db->createUser("liviu29", "liviu29@gmail.com", "6cbbf8adb11134d0c5f8e8d37b1d7e0421d5445bf5640b9966335a93b171fef9");
$db->createUser("luca10", "luca10@gmail.com", "01e839d1883b49ef24a34af3fc3b06f1129a628d19ce5d3b5dde7e8ebc9f1633");

$db->createStamp("Penny Red", "America", "88", "89", "war","11" );
$db->createStamp("Red Mercury", "Austria", "92", "92", "sports","4" );
$db->createStamp("Basel Dove", "Rusia", "95", "95", "garden","13" );
$db->createStamp("British Guiana 1c magenta", "United Kingdom", "89", "94", "golf","18" );
$db->createStamp("Hawaiian Missionaries", "Hawaii", "93", "96", "travel","9" );
$db->createStamp("Inverted Head 4 Annas", "America", "94", "89", "electronics","12" );

$db->createCatalogueRelation("myFavorites","89","29");
$db->createCatalogueRelation("myFavorites","89","32");
$db->createCatalogueRelation("myFavorites","89","31");
$db->createCatalogueRelation("Saved","95","33");
$db->createCatalogueRelation("Saved","95","31");
$db->createCatalogueRelation("Saved","95","34");
$db->createCatalogueRelation("Saved","95","29 ");

$db->likeStamp("95","32");
$db->likeStamp("95","31");

$db->changeOwnerOfStamp("31","95");

*/
