<?php
use App\Controllers\BaseController;

class ExcelProcessor extends BaseController 
{
    
    public function export(){
        $con=mysqli_connect("localhost","root","","userbase");
        $file_ext_name="csv";
        $select="SELECT * FROM users";
        $query=mysqli_query($con,$select);

        if (mysqli_num_rows($query)>0) {
            
        }else{

        }
    }
    public function import(){
        $con=mysqli_connect("localhost","root","","userbase");
        $fileName=$_FILES['import_file']['name'];
        $file_ext=pathinfo($fileName,PATHINFO_EXTENSION);
        $allowed_extensions=["csv","xlsx","ods"];
        // file_get_contents()
        if(in_array($file_ext,$allowed_extensions)){
            $inputFileNamePath=$_FILES['import_file']['tmp_name'];
            $spreadsheet=\PhpOffice\PhPSpreadsheet\IOFactory::load($inputFileNamePath);
            $data=$spreadsheet->getActiveSheet().toArray();
            $count=0;
            foreach($data as $row){
                if ($count>0) {
                    $fullname=$row['0'];
                    $email=$row['1'];
                    $phone=$row['2'];
                    $course=$row['3'];

                    $studentQuery="INSERT INTO students (' 'fullname','email','phone','course' ' ) VALUES ('$fullname','$email','$phone','$course')";
                    $result=mysqli_query($con, $studentQuery);
                }else{
                    $count="1";
                }
            }
            if (isset($msg)){
                $_SESSION['message']='Successfully imported';
                header('Location: ');
                // INSERT LOCATION
            }else{
                $_SESSION['message']='Not Imported';
                header('Location:');
                // INSERT LOCATION
                exit(0);
            }
        }
        else{
            $_SESSION['message']='Invalid file';
            header('Location:');
            // INSERT LOCATION
            exit(0);
        }

    }
}

