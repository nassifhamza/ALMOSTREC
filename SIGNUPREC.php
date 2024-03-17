<?php 

class RECSIGN extends DBH
{

   private  $name;
   private  $email;
   private  $pass;
   private  $username;
   private  $prenom;
   private  $societe;
   private  $TEL;
   private  $adresse;

    public function __construct($name,$email,$pass,$username,$prenom,$societe,$TEL,$adresse)
    {  
$this->name=$name;
$this->email=$email;
$this->pass=$pass;
$this->username=$username;
$this->prenom=$prenom;
$this->societe=$societe;
$this->TEL=$TEL;
$this->adresse=$adresse;
    }


public function SIGNREC()
{

    $connect=$this->DATABASE();
    $content = $connect->prepare("insert into loginrec (name,email,password,username,prenom,SOCIETE,TEL,ADRESSE) values(?,?,?,?,?,?,?,?)");
    $content->execute(array($this->name,$this->email,$this->pass,$this->username,$this->prenom,$this->societe,$this->TEL,$this->adresse));    
}




}

?>