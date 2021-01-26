<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$headingErr = $contentErr = "";
$heading = $content = "";
$headinglength= strlen($heading);
$contentlength= strlen($content);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["heading"])) {
        $headingErr = "กรุณาตั้งชื่อกระทู้";
        echo "<script>alert('$headingErr');</script>";
    } else {
        $heading = test_input($_POST["heading"]);
}
if (empty($_POST["content"])) {
    $contentErr = "กรุณาใส่เนื้อหา";
    echo "<script>alert('$contentErr');</script>";
} else {
    $content = test_input($_POST["content"]);
}  
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <textarea class="heading" type="text" name="heading" placeholder="หัวข้อกระทู้..." value="<?php echo $heading;?>"  maxlength="140" minLength="6"></textarea>
    <!-- <span class="error">* <?php echo $headingErr;?></span> -->
    <div class="cont">
            <p>เนื้อหากระทู้</p>
            <p>20,000</p>
    </div>
    <div class="toolbar">
        <div class="items_top">
            <div class="items">
                <a><img src="https://img.icons8.com/android/24/000000/bold.png"/></a>
                <a><img src="https://img.icons8.com/android/24/000000/italic.png"/></a>
                <a><img src="https://img.icons8.com/android/24/000000/underline.png"/></a>
            </div>
            <div class="items">
                <a><img src="https://img.icons8.com/material/40/000000/align-left--v2.png"/></a>
                <a><img src="https://img.icons8.com/material-outlined/40/000000/align-center.png"/></a>
                <a><img src="https://img.icons8.com/material/40/000000/align-right--v2.png"/></a>
            </div>
        </div>
    </div>
    <textarea class="content" type="text" name="content" value="<?php echo $content;?>" maxlength="2000" minLength="6"></textarea>
    <!-- <span class="error">* <?php echo $contentErr;?></span> -->
    <br><br>
    <input class="submit" type="submit" name="submit" value="Submit"> 
</form>
</div>

<div class="output">
    <h1>This is your output</h1>
    <?php
        echo "<h2>$heading</h2>";
        echo "<br>";
        echo "<h3>$content</h3>";
    ?>
</div>

</body>
</html>