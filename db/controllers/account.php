<?php
include_once "db.php";


class Controller
{

    private $db = null;
    public function __construct()
    {
        $this->db = new DBController();
    }


    public function get_user($username, $email, $password)
    {
        $query = "SELECT * 
                  FROM 
                    `account` 
                  WHERE 
                    (username = :username AND password = :password) 
                 or 
                    (email = :email AND password = :password)"; 

        $connection = $this->db->getConnection();
        $stmt = $connection->prepare($query);  
        $stmt->execute(
                        array(  
                          'username'     =>     $username,
                          'email'        =>     $email,  
                          'password'     =>     $password  
                        )  
                ); 

        $count = $stmt->rowCount(); 
        $data = array(); 
        if($count > 0){  
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($data, $row);
            }
            $_SESSION["true"] = 1;   
        }  
 
        return $data;
 
    }


    public function search_user($username)
    {
        $sql = "SELECT 
                    * 
                  FROM 
                  `account`
                  WHERE username = :username ;
                    ";
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare($sql);

        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $data = array();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $row);
            }
        }

        return $data;


    }

    /* GET All USER */
    public function get_all_users()
    {
        $sql = "SELECT 
                    * 
                  FROM 
                  `account`;
                    ";
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare($sql);

        $stmt->execute();

        $data = array();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $row);
            }
        }

        return $data;
    }

    public function update_user()
    {

    }

    public function create_new_user($fname, $lname, $gender, $email, $phone_number, $user, $image, $username, $password)
    {
        $id = null;
        $sql = "INSERT INTO 
                        `account`(
                                    `id`, `fname`, `lname`, `gender`, `email`, 
                                    `phone_number`, `user`, `image`, `username`, `password`
                                ) 
                    VALUES 
                        (
                            :id, :fname, :lname, :gender, :email, 
                            :phone_number,:user, :image, :username, :password
                        );
                ";

        $connection = $this->db->getConnection();

        $stmt = $connection->prepare($sql);

        $data = [
            ':id'           =>  $id, 
            ':fname'        =>  $fname, 
            ':lname'        =>  $lname, 
            ':gender'       =>  $gender, 
            ':email'        =>  $email, 
            ':phone_number' =>  $phone_number, 
            ':user'         =>  $user, 
            ':image'        =>  $image, 
            ':username'     =>  $username, 
            ':password'     =>  $password
        ];
        $query_execute = $stmt->execute($data);


        /*if($query_execute)
        {
            $_SESSION['message'] = "Aproved Registration";
            return 1;
        }
        else
        {
            $_SESSION['message'] = "Not Inserted";
            return 1;
        }*/
    }

    public function remove_users($id)
    {

    }
}
?>