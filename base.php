<?php

date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
  protected $table="";
  protected $dsn="mysql:host=localhost;dbname=db02;charset=utf8";
  protected $pdo="";


  function __construct($table){
    $this->table=$table;
    $this->pdo=new PDO($this->dsn,'root','');

  }

  function find($id){
    $sql="select * from $this->table";
    if(is_array($id)){
      foreach($id as $key => $value){
        $tmp[]=sprintf("`%s`='%s'",$key,$vlaue);

      }

      $sql=$sql." where ".implode(" && ",$tmp);
    }else{
      $sql=$sql." where `id`='{$id}'";
    }
    
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

  }
  
  function all(...$arg){
    $sql="select * from $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){

        foreach($arg[0] as $key => $value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
          
        }
        
        $sql=$sql." where ".implode(" && ",$tmp);
      }else{
        $sql.=$arf[0];
      }
    }

    if(isset($arg[1])){
      $sql.=$arg[1];
    }
    
    return $this->pdo->query($sql)->fetchAll();
    
  }
  
  function count(...$arg){
    $sql="select count(*) from $this->table";

    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }

        $sql .= " where ".implode(" && ",$tmp);
      }else{
        $sql .= $arg[0];
      }
    }

    if(isset($arg[1])){
      $sql .= $arg[1];
    }

    return $this->pdo->query($sql)->fetchColumn();

  }
  



  function save($arr){
    if(isset($arr['id'])){
      //update
      foreach($arr as $key => $value){
        $tmp[]=sprintf("`%s`='%s'",$key,$value);
        
      }
      
      $sql="update $this->table set ".implode(",",$tmp)." where `id`='{$arr['id']}'";

    }else{
      //insert

      $sql="insert into $this->table (`".implode("`,`",array_keys($arr))."`) values('".implode("','",$arr)."')";
    }
  
  }
  



  function del($id){
    $sql="delete from $this->table";
    if(is_array($id)){
      foreach($id as $key => $value){
        $tmp[]=sprintf("`%s`='%s'",$key,$vlaue);

      }

      $sql=$sql." where ".implode(" && ",$tmp);
    }else{
      $sql=$sql." where `id`='{$id}'";
    }

    return $this->pdo->exec($sql);
  
  }

  function q($sql){
    return $this->pdo->query($sql)->fetchAll();

  }


}






?>