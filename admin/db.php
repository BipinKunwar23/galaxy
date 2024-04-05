<?php 
class Database{
    private $db_host="localhost";
    private $db_user="root";
    private $db_pass="";
    private $db_name="hotel";
    private $conn="";
    private $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    
    
    
    ];
    private $result=array();
 public function __construct(){
   $dsn="mysql:host=$this->db_host; dbname=$this->db_name";

   try{
     $this->conn= new PDO($dsn,$this->db_user,$this->db_pass,$this->options);
  
   }
   catch(PDOException $e){
      die($e->getMessage());
   }
   

 }
  public function insert($table,$params=array(),$exist=array()){
if($this->existdata($table,$exist,null)){
  array_push($this->result,"0");
return $this->getMessage();
}
else{
$table_key=implode(',',array_keys($params));
$table_value=implode("','",$params);
      $sql="INSERT INTO $table ($table_key) VALUES('$table_value')";

      $stmt= $this->conn->prepare($sql);
      if($stmt->execute()){                               
        array_push($this->result,"1");
      }
      else{
        $this->errorFind($stmt);
    
    }
    return $this->getMessage();

  }
       
      
}

public function update($table,$params=array(),$where=null,$exist=array(),$id=null){
  if($this->existdata($table,$exist,$id)){
  array_push($this->result,"0");
return $this->getMessage();
  }
  else{
  $args=array();
  foreach($params as $key=>$value){
    $args[] = "$key ='$value'";
  }
    $sql="UPDATE $table SET ". implode(',',$args)."WHERE $where";

    $stmt= $this->conn->prepare($sql);
    if($stmt->execute()){
      array_push($this->result,"1");
    }
    else{
      $this->errorFind($stmt);
 
  }
  return $this->getMessage();

}
     
}

public function select($sql){
  $stmt=$this->conn->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll();

}


public function delete($table,$where=null){
  $sql="DELETE FROM $table";
if($where!=null){
  $sql.=" WHERE $where";
}
$stmt=$this->conn->prepare($sql);
if($stmt->execute()){
array_push($this->result,"1");
}
else{
  $this->errorFind($stmt);

}
return $this->getMessage();

}
private function errorFind($stmt){
  $error=$stmt->errorInfo();
    if($error[1]){
      array_push($this->result,$error[2]);
    }
}

private function existdata($table,$params=array(),$id=null){
  if($params!=null){
  $tablevalue=array();
  foreach($params as $key=>$value){
$tablevalue="$key='$value'";

if($id!=null){
  $data=$this->select("SELECT $key FROM $table  WHERE id!=$id");

}
else{
$data=$this->select("SELECT $key FROM $table WHERE $tablevalue");
}
if(count($data)>0){
  array_push($this->result,$value."  already Exist!! <br><br>Enter the Unique Value!!");
  return 1;

}
  }
}
else{
  return 0;
}

}
public function getMessage(){
  foreach($this->result as $message){
    if($message=="1"){
      return $message;

    }
    else {echo $message;
    return 0;
    }
  }

  $this->result=array();

  }
    public function test(){
      echo "successful";
    }
    public function __destruct()
    {
   
    }
}
?>