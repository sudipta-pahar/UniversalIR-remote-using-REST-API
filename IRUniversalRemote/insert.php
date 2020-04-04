<?php
include("connection.php");
error_reporting(0);
?>
<html>
<head>
<!--     <meta charset="UTF-8">
    <title></title>
    <link href="form_design.css" rel="stylesheet" type="text/css" > -->
</head>
<body>
<div align="center" class="div_text_shadow">
<form action = "" method="GET">
    Input Remote ID    : <input type="text" name="Remote_ID" value=""/><br><br>
    Input Button Name  : <input type="text" name="Button_name" value=""/><br><br>
    Input Button Timing: <input type="text" name="Timing" value=""/><br><br>
    <input type="submit" name="submit" value="Submit"><br><br>
    <input type="submit" name="submit" value="GO TO CREATED BUTTONS"><BR><BR>
</form></div>
<?php

if($_POST['submit']== 'GO TO CREATED BUTTONS')
            {
                // link to buttons.php
            }


if($_GET['submit'])
{
    $RID = $_GET['Remote_ID'];
    $BNAME = $_GET['Button_name'];
    $TIME = $_GET['Timing'];

    if($RID!="" && $BNAME!="" && $TIME!="")
    {
        $query = "INSERT INTO remote VALUES ($RID, '$BNAME', '$TIME')";
        $data = mysqli_query($conn, $query);

        if($data)
            {
                echo "Data inserted into Database";
            }

    }
    else
    {
        echo "All fields are required!";
    }
}
?>


</body>
</html>
