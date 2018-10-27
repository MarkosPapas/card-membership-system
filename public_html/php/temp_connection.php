<?php
$servername="localhost";
$username="root";
$password="";
$dbname="first_catering_ltd";
//Create connection
$conn= new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}
$sql= "SELECT CONCAT(users.f_name, ' ', users.l_name) AS \"Name\", cards.id AS \"card_id\", cards.expiry_date, companies.name  FROM users JOIN cards ON users.card_id=cards.id JOIN companies ON users.company_id=companies.id";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    //output data of each row
   echo "<table> <tr> <th> Name </th> <th> Card ID </th> <th> Expiry Date </th> <th>Company Name</th> </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr> <td>" . $row["Name"] . "</td> <td>". $row["card_id"] ."</td><td>". $row["expiry_date"] ."</td> <td>". $row["name"] . "</td> </tr>";

        }
    echo "</table>";
}
?>