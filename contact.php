<head>
    <style>
  table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}
}
    </style>
</head>
<center>
<?php 
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $message = $_POST["message"];

    $conn = new mysqli("localhost", "root", "","contactus");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
    
$sql = "INSERT INTO contactdata (name,phone,country,message) VALUES ('".$name."', '".$phone."', '".$country."','".$message."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT * FROM contactdata";
$result = $conn->query($sql);
?>
<table>
<tr>
    <th>Name</th>
    <th>Phone</th>
    <th>Country</th>
    <th>Message</th>
  </tr>
  
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
    <tr>
    <td><?php echo $row["name"] ?></td>
    <td><?php echo $row["phone"] ?></td>
    <td><?php echo $row["country"] ?></td>
    <td><?php echo $row["message"] ?></td>
    </tr>
<?php 
}
} else {
  echo "0 results";
}

$conn->close();
?>

</table>
</center>