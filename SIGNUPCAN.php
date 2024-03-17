
<?php 

class CANSIGN extends DBH
{

    private  $name;
    private  $email;
    private  $pass;
    private  $username;
    private  $prenom;
    public function __construct($name,$email,$pass,$username,$prenom)
    {
        
        $this->name=$name;
        $this->email=$email;
        $this->pass=$pass;
        $this->username=$username;
        $this->prenom=$prenom;

    }



    public function SIGNCAN()
    {

        $connect=$this->DATABASE();
        $content = $connect->prepare("insert into logincan (name,email,password,username,prenom) values(?,?,?,?,?)");
        $content->execute(array($this->name,$this->email,$this->pass,$this->username,$this->prenom));

    }


}

?>