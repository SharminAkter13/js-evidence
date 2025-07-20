
<?php
class Users {
    protected $id;
    protected $name;

    function __construct($_id,$_name){
        $this->id =$_id;
        $this->name =$_name;
    }
}

class Student extends Users{
    public $email;
    public $batch;

    public static $file_location ="store.txt";

    function __construct($_id,$_name,$_email,$_batch){
       parent::__construct($_id,$_name);
        $this->email =$_email;
        $this->batch =$_batch;
    }
    function data_store(){
        return $this->id.",".$this->name.",".$this->email.",".$this->batch.",".PHP_EOL;
    }
    function dstore(){
        file_put_contents(self::$file_location,$this->data_store(),FILE_APPEND);

    }
    public static function result(){
        $student = file(self::$file_location);

    if(count($student)>0){
        echo "<h2 style='text-align: center;'>Student List</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; margin: auto; width: 100%;'>";
        echo "<tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BATCH</th>
            </tr>";
            foreach($student as $students){
                list($id,$name,$email,$batch)= explode(",",trim($students));
                echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$email</td>
                <td>$batch</td>
            </tr>";
            }
            echo "</table>";
        }else{
            echo "No Student Data Available";
        }
    }

}
?>