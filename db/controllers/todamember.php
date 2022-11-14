<?php
include_once "db.php";


class TodaController
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
                    `tbl_info_toda_member` 
                  WHERE 
                    (user_name = :user_name AND password = :password) 
                 or 
                    (email = :email AND password = :password)"; 

        $connection = $this->db->getConnection();
        $stmt = $connection->prepare($query);  
        $stmt->execute(
                        array(  
                          'user_name'     =>     $username,
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
                  `tbl_info_toda_member`
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
                  `tbl_info_toda_member`;
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

    public function create_new_user($fname, $lname, $gender, $email, $phone_number, $license_no, $username, $password, $image)
    {
        $id = null;
        $sql = "INSERT INTO 
                        `tbl_info_toda_member`(
                                    `id`, `fname`, `lname`, `gender`, `email`, `number`, 
                                    `license_no`, `user_name`, `password`, `image`
                                    )
                    VALUES 
                        (
                            :id, :fname, :lname, :gender, :email, 
                            :number,:license_no, :image, :user_name, :password,:image
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
            ':number' =>  $phone_number,
            'license_no'    =>  $license_no,  
            ':user_name'     =>  $username, 
            ':password'     =>  $password,
            ':image'        =>  $image
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

    public function remove_toda($id)
    {
        $sql = "DELETE FROM `tbl_info_toda_member` WHERE id = :id";
        $connection = $this->db->getConnection();

        $stmt = $connection->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $data = array();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($data, $row);
            }
        }

        return $data;
    }
}
?>