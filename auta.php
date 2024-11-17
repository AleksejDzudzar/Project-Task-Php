<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="topnav">
  <a href="auta.php">Automobili</a>
  <a href="motori.php">Motori</a>
  <a href="traktori.php">Traktori</a>
  <a href="oglasi.php">Oglasi</a>
</div>

<h2>Podaci o autima</h2>
<table>
    <thead>
        <tr>
            <th>Marka</th>
            <th>Model</th>
            <th>Cena</th>
            <th>Tip</th>
        </tr>
    </thead>
    <tbody>
    <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "polovna_vozila";
      
 
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        echo $conn->connect_error;
      }
      
      $sql = "SELECT * FROM oglasi where tip='auto'";
      $result = $conn->query($sql);// Bere sicki vrednosci zoz bazi podatkoh i kladze ih na odvitujucu stranicu 
      
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row['marka']. "</td><td>" . $row['model'] . "</td><td>" . $row['cena'] . "</td><td>" . $row['tip'] . "</td></tr>";
        }
      } else {
        echo "<tr><td colspan='4'>0 rezultata</td></tr>";
      }//Vipisuje podatke do tabeli
      $conn->close();
    ?>
    </tbody>
</table>

</body>

</html>

