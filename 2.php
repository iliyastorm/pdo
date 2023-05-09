<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "student";
?>
    <form action="" method="post">

        <label>id</label>
        <input type="text" name="id"> </br>

        <label>name</label>
        <input type="text" name="name"> </br>

        <label>family</label>
        <input type="text" name="family"> </br>

        <input name="submit1" value="insert" type="submit">
    </form>


    <table BORDER="1"
    <tr>
        <td>id</td>
        <td>name</td>
        <td>family</td>
    </tr>
<?php
$myconnection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$query = "SELECT * FROM student";
$result = $myconnection->prepare($query);
$result->execute();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    echo "
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[family]</td>
    </tr>
    
    ";

}

if (isset($_POST['submit1'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $family = $_POST['family'];

    $ins_sql = "INSERT INTO (id,name,family)
VALUES ('$id';'$name';'$family')";

    $ins_sql = $myconnection->prepare($ins_sql);
    $ins_sql->execute();
}
