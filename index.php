<html>
<head>
<title>HSF-Marketplace</title>
</head>
<body>
    <a href="/about.php">About</a>

<table border="1">
<thead>
    <tr>
        <td>
            S.N.
        </td>
        <TD>
            Name
        </TD>
        <td>
            User Type
        </td>
    </tr>
</thead>

    <?php
        include 'db.php';
        $sql = "SELECT * FROM `user`";
$result = mysqli_query($mysqli,$sql);
$sn = 0;


if($result){
while($row = $result -> fetch_assoc()){

    echo "<tr>";

   echo "<td>";
   echo $sn++;
   echo "</td>";

   echo "<td>";
   echo $row["username"];
   echo "</td>";

    echo "<td>";
   echo $row["user_type"];
   echo "</td>";


   echo "</tr>";
   }
   echo "<script>alert('if the table is visible... Database is hosted properly');</script>";
}


?>
</table>
</body>
</html>