<?php
include("connection.php");
error_reporting(0);
?>

<html>
<head>

</head>

<body>
    <div align="center" class="div_text_shadow">
        <H1>TV</H1>
        <form action="" method="POST">
            <input type="submit" name="submit" value="INSERT NEW BUTTON" ><BR><BR>
            ENTER MODEL NUMBER: <input type="text" name="model_no" value=""/><br><br>
            <input type="submit" name="submit" value="Submit">

            <input type="submit" name="submit" value="Power" ><BR><BR>
            <input type="submit" name="submit" value="VolUp" >
            <input type="submit" name="submit" value="Source" >
            <input type="submit" name="submit" value="ChanUp" ><BR><BR>
            <input type="submit" name="submit" value="VolDown"  >
            &nbsp;&nbsp;
            <input type="submit" name="submit" value="Mute" >&nbsp;&nbsp;
            &nbsp;&nbsp;
            <input type="submit" name="submit" value="ChanDown" >
            <br>
            <br>
            <br>
            </div></form>
<?php
if($_GET['newButton'])
{
    //connect to insert.php
}
function returnValue($button_receive)
{
    $button = $button_receive;
    include("connection.php");
    $sql = "SELECT * FROM remote WHERE Remote_ID = '$button'";
                if($result = mysqli_query($conn, $sql))
                {
                     if(mysqli_num_rows($result) > 0)
                     {
                             while($row = mysqli_fetch_array($result))
                             {
                                    echo $row['Timing'];
                                    $value = $row['Timing'];
                             }
                             mysqli_free_result($result);
                     }
                             else
                             {
                                echo "No records matching your query were found.";
                             }
                }
                else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }

                  $service_url = 'http://' . $value ;
                  $curl = curl_init($service_url);
                  #curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
                  $curl_response = curl_exec($curl);
                  curl_close($curl);
                return $value;
}

            if($_GET['submit'])
            {
                $permanent = $_GET['model_no'];
                echo $permanent;
            }
            if($_POST['submit']== 'Power')
            {
                $button = $permanent.'-1';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'VolUp') {
                $button = $permanent.'-4';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'VolDown') {
                $button = $permanent.'-3';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'Source') {
                $button = $permanent.'-2';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'ChanUp') {
                $button = $permanent.'-5';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'ChanDown') {
                $button = $permanent.'-6';
                echo returnValue($button);
            }
            elseif ($_POST['submit']== 'Mute') {
                $button = $permanent.'-7';
                echo returnValue($button);
            }
?>
</body>
</html>
