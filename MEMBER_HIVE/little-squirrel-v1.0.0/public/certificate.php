<?php
$name = $_GET['memberName'];
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">
        <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
            <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>
            <br><br>
            <span style="font-size:25px"><i>This is to certify that</i></span>
            <br><br>
            <span style="font-size:30px"><b>
                    <?php echo $name ?>
                </b></span><br /><br />
            <span style="font-size:25px"><i>has completed the course</i></span> <br /><br />
            <span style="font-size:30px">$course.getName()</span> <br /><br />
            <span style="font-size:20px">with score of <b>$grade.getPoints()%</b></span> <br /><br /><br /><br />
            <span style="font-size:25px"><i>dated</i></span><br>
            #set ($dt = $DateFormatter.getFormattedDate($grade.getAwardDate(), "MMMM dd, yyyy"))
            <span style="font-size:30px">$dt</span>
        </div>
    </div>
</body>

</html>