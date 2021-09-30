<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">

             <table class="table table-hover table-bordered" border="1" width="100%">
                    <thead>
                                <th scope="row" colspan="2" style="text-align: center; padding-top: 4px; ">
                                <img src="rgitlogo.png" class="slider-image" alt="img" width="1200px" height="150px;"></th> 
                        
                    </thead>                                 

        <div class="main">
            <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;">
                </td>
            </tr>
             <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;" ><font style="font-size: 23px"><b>Name: <?php echo $name ?></b></font><br></td>
            </tr>
             <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;"><font style="font-size: 23px"><b>Class: <?php echo $class; ?></b></font><br></td>
            </tr>
             <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;"><font style="font-size: 23px"><b>Roll No: <?php echo $rn; ?></b></font><br></td>
            </tr>
            <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;">
                </td>
            </tr>
        
            <div class="s1">
                 <div class="s2">
            <tr>
                <td style=" text-align: center"><p><b>Subjects</b></p></td>
                <td style="text-align: center"><p><b>Marks</b></p></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>Database Management System</p></td>
                <td style="text-align: center"><?php echo '<p>'.$p1.'</p>';?></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>Computer Networks</p></td>
                <td style="text-align: center"><?php echo '<p>'.$p2.'</p>';?></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>Web Development</p></td>
                <td style="text-align: center"><?php echo '<p>'.$p3.'</p>';?></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>Theory Of Computation</p></td>
                <td style="text-align: center"><?php echo '<p>'.$p4.'</p>';?></td>
            </tr>
            <tr>
                <td style="text-align: center"><p>Advance Algorithm</p></td>
                <td style="text-align: center"><?php echo '<p>'.$p5.'</p>';?></td>
            </tr>
                </div>
            </div>
       </div> 

    <div class="result">
         <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;">
                </td>
            </tr>
        <tr>
            <th scope="row" colspan="2" style="text-align: center">
                <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            </th>
        </tr>
        <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;">
                </td>
            </tr>
        <tr>
            <th scope="row" colspan="2" style="text-align: center">
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
            </th>
        </tr>
        <tr>
                <td scope="row" colspan="2" style=" text-align: left; padding-left: 10px;">
                </td>
            </tr>
         
    </div>
  </table>
  <br>
      <div class="button">
                <button onclick="window.print()">Print Result</button>
    </div>
    </div>
</div>
</body>
</html>