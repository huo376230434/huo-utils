<?php
namespace HuoUtils\Utils;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25
 * Time: 15:56
 */
class MysqlMaintenance{

    protected $database_name;
    protected $username;
    protected $password;
    protected $save_path;

    public function __construct($mysql_conf=[])
    {
        !$mysql_conf && $mysql_conf = config("database");
        $this->database_name =$mysql_conf['database'];
        $this->username = $mysql_conf['username'] ;
        $this->password =$mysql_conf['password'] ;
        $this->save_path =isset($mysql_conf['database_backup_path']) ? : "/usr/local/mysql_backup";
//        if(!$this->save_path){
//            throw new \Exception("配置database.connections.mysql.database_backup_path不存在");
//        }
        if(!is_dir($this->save_path)) {
            mkdir($this->save_path);
        }
        //将密码中的!字符转为\!
        $this->password = str_replace("!","\!",$this->password);
    }




    public  function backup($toCloud=false)
    {

//执行备份命令
        $name = $this->database_name.'_'.date('Y_m_d_H_i_s').'.sql';
        $backup_command = 'mysqldump -u'.$this->username.' -p'.$this->password.' '.$this->database_name.' > '.$this->save_path.$name;
        exec($backup_command);
        if($toCloud){

//            dispatch(new UploadObjectToCloud(['path'=> $save_path,'name' => $name]));
        }
        return ["name" => $name,'full_name' => $this->save_path.$name];


    }


    public  function recover($name)
    {
        $backup_command = 'mysql -u'.$this->username.' -p'.$this->password.' '.$this->database_name.' < '.$name;
        exec($backup_command);
    }


}