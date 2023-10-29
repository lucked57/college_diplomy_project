<?php
class Podbor {
    
        public function tests($matka){
                return $matka.' cool';
        }
    
              
        public function search_matka($matka){
    
                global $mysqli;

                $sql="SELECT * FROM Matka where Namematka = '$matka'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_assoc();

                return $posts;

                $mysqli->free($result);
        }
    
        public function search_cpu_for_matka($matka_search_cpu){

                global $mysqli;

                $sql="SELECT * FROM cpu where socket = '$matka_search_cpu'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_all(MYSQLI_ASSOC);

                return $posts;

                $mysqli->free($result);
        }
    
        public function search_cpu($cpu){
        
                global $mysqli;

                $sql="SELECT * FROM cpu where Namecpu = '$cpu'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_assoc();

                return $posts;

                $mysqli->free($result);
            
        }
    
        public function search_matka_for_cpu($cpu_matka){
            
                global $mysqli;
            
                $sql="SELECT * FROM Matka where socket = '$cpu_matka'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_all(MYSQLI_ASSOC);

                return $posts;

                $mysqli->free($result);
            
        }
    
        public function search_matka_for_ddr($ddr){
            
                global $mysqli;
            
                $sql="SELECT * FROM ram where Nameram = '$ddr'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_assoc();

                return $posts;

                $mysqli->free($result);
            
        }
    
        public function search_matka_for_ddr_name($ddr_matka){
            
                global $mysqli;
            
                $sql="SELECT * FROM Matka where DDR = '$ddr_matka'";

                $result = $mysqli->query($sql);

                $posts = $result->fetch_all(MYSQLI_ASSOC);

                return $posts;

                $mysqli->free($result);
            
        }
    
}


class Proverka_cookie{
    
            public function find_cookie_for_admin($login){
            
            global $mysqli;
            
            $sql="select * from admins where login_admins = '$login'";

            $result = $mysqli->query($sql);

            $posts = $result->fetch_assoc();

            return $posts;

            $mysqli->free($result);
            
        }
    
}


class Stats{
    
        public function get_info($stats){
        
        global $mysqli;
        
        $sql = "select * from ".$stats."";
    
        $result = $mysqli->query($sql);

        $posts = $result->num_rows;

        return $posts;

        $mysqli->free($result);
        
    }
    
}


class Insert_for_admin{
    
        public function insert_comp($stats,$table,$name,$socket,$socket_name,$DDR,$DDR_name){
        
        global $mysqli;
        
        $sql = "select * from ".$table." where ".$name." = '$stats'";
    
        $result = $mysqli->query($sql);
    
    
        if (!$result->num_rows)
        {

            if((!empty($DDR)) and (!empty($DDR_name)))
                
            {
              
                $sql = "insert into ".$table." (".$name.",".$socket.",".$DDR.") values ('$stats','$socket_name','$DDR_name')";

                $result = $mysqli->query($sql);
                
            }
            else{
                
                $sql = "insert into ".$table." (".$name.",".$socket.") values ('$stats','$socket_name')";

                $result = $mysqli->query($sql);
                
            }

            

                

            if($result)
            {
                return ' '.$stats. ' добавлен в базу данных';
            }
            else
            {
                return 'Неизвестная ошибка, обратитесь к администратору';
            }
        }
        else
        {
            //если уже есть подписчик с таким email
            return ' '.$stats. ' уже добавлен';
        }
            
        $mysqli->free($result);

        }

}

?>