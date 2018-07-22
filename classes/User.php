<?php

class User{

    protected function msg($msg){
        echo "<script>
                alert('$msg');
            </script>";
    }

    //    check if form feild are empty or not set
    protected function checkEmpty($username, $password){

        if(isset($username, $password) && !empty($username) && !empty($password)){
            return true;
        }else{
            return false;
        }

    }

   // validate data
    protected function sanitize($input){

        global $db;

        $data = $db->escapeString(trim($input));

        return $data;

    }

    // sign up/ registration process
    public function signup($username, $password){
        global $db;

        if($this->checkEmpty($username, $password)){

            $sUsername = $this->sanitize($username);
            $sPass     = $this->sanitize($password);

            $sql = "SELECT username FROM users WHERE username = '$sUsername'";
            $result = $db->query($sql);

            $result = $db->numRows($result);

            if(!$result){


                $sPass = md5($sPass);

                $sql = "INSERT INTO users (username, password) VALUES ('$sUsername', '$sPass')";
                $result = $db->query($sql);

                if($db->affectedRows()){
                    $this->msg('You have registered!');
                }else{
                    $this->msg('Something Went Wrong! Please contact with support or try again later.');
                }



            }else{
                $this->msg('Username Already Exist Into Our Database! Please try another username');
            }

        }else{
            $this->msg('Please fill out all of the fields!');
        }
    }

    // sign in/ log in process
    public function signin($username, $password){

        global $db;

        if($this->checkEmpty($username, $password)){

            $sUsername = $this->sanitize($username);
            $sPassword = $this->sanitize($password);

            $sql = "SELECT * FROM users WHERE username = '$sUsername'";
            $result = $db->query($sql);

            $rowsCount = $db->numRows($result);

            if($rowsCount){

                $data = $result->fetch_object();
                $sPassword = md5($sPassword);
                $pass = $data->password;

                if($sPassword==$pass){
                    header('Location: success.php');
                }else{
                    $this->msg('Credential Mismatch!');
                }

            }

        }else{
            $this>msg('Please fill out all of the fields!');
        }

    }

}