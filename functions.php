<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book');

    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            // สร้าง dbcon ไว้เรียกใช้งาน 
            
            if(mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : ". mysqli_connect_error();
            }
        }

        public function insert ($Isn,	$Name, $Image,	$Author, $Instock,	$Price) {
            $result = mysqli_query($this->dbcon, "INSERT INTO booking(isbn, name, image, author,in_stock,price)
                            VALUES('$Isn',	'$Name', ' $Image',	'$Author',	'$Instock',	'$Price')");
            return $result;
        }

        public function signup ($fullname,	$username, $password) {
            $result = mysqli_query($this->dbcon, "INSERT INTO users(fullname, username, password)
                            VALUES('$fullname','$username', '$password')");
            return $result;
        }

        public function fetchdata () {
            $result = mysqli_query($this->dbcon, "SELECT * FROM booking");
            return $result;
        }

        public function users () {
            $result = mysqli_query($this->dbcon, "SELECT * FROM users");
            return $result;
        }
        
        public function fetchonerreord($user_id) {
            $result = mysqli_query($this->dbcon, "SELECT* FROM booking WHERE user_id = '$user_id' ");
            return $result;
        }

        public function selectuser($username) {
            $result = mysqli_query($this->dbcon, "SELECT* FROM users WHERE username = '$username' ");
            return $result;
        }

        

        public function delete(){
            $del_id = $_POST['Del_ID'];
            $result = mysqli_query($this->dbcon,"DELETE FROM booking WHERE user_id = '$del_id' ");
            return $result;
        }

        public function update($Isn,$Name, $Image, $Author, $Instock,$Price, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE booking SET 
                name = '$Name',
                image = '$Image',
                author = '$Author',
                in_stock = '$Instock',
                price = '$Price'
                WHERE user_id = '$userid'
                ");
                return $result;
        }



    }

?>