<?php
    function insert_taikhoan($name, $email, $img, $pass, $phone, $pdo){
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql ="INSERT INTO users(name, email, img, pass, phone) VALUES(:name, :email, :img, :pass, :phone)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':pass', $hashed_pass);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }
    
    function checkusers($pdo, $email, $pass){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user){
            if(password_verify($pass, $user['pass'])){
                return $user;
            } else {
                return false; // Incorrect password
            }
        } else {
            return false; // User not found
        }
    }
    
    
    function loadall_taikhoan(){
        $sql = "select * from users order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function  loadone_taikhoan($id){
        $sql = "select * from users where id=".$id;
        $user=pdo_query_one($sql);
        return $user;
    }
    function  update_taikhoan($id,$tenloai){
        $sql = "update danhmuc set user='" . $tenloai . "' where id=" . $id;
        $user=pdo_query_one($sql);
    
    }
?>