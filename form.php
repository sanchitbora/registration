<?php
/*$name = $_REQUEST['name'];
$course = $_REQUEST['course'];
//$result .="$name,$course\n";
echo ("".$name);
echo ("</br>".$course);
?>*/


if(isset($_POST['submit'])){

    //collect form data
    $name = $_POST['name'];
    $course = $_POST['course'];

    //check name is set
    if($name ==''){
        $error[] = 'Name is required';
    }

    //check for a valid email address
    if($course == ''){
         $error[] = 'Please enter a valid course';
    }

    //if no errors carry on
    if(!isset($error)){

        # Title of the CSV
        $Content = "Name, course\n";

        //set the data of the CSV
        $Content .= "$name, $course\n";

        # set the file name and create CSV file
        $FileName = "registrations.csv";
        header('Content-Type: application/csv'); 
        header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
        $fp = fopen('registrations.csv','a');
        fputcsv($fp,$Content);
        echo $Content;
        fclose($fp);
        exit();
    }
}

//if their are errors display them
if(isset($error)){
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
}