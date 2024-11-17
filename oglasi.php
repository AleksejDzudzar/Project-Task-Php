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
        input[type=text],input[type=submit],input[type=number],input[type=email] {
            width: 100%;
            padding: 12px;
            border: 1px solid black;
            border-radius: 4px;
            resize: vertical;
            background:#f2f2f2;
        }
        select{
            height:30px;
            width:120px;
            font-size:15px;
        }
        label{
            
            font-size:25px
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


<h2>Oglasi</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Cena</th>
            <th>Tip</th>
            <th>Brisanje</th>
        </tr>
    </thead>
    <tbody>
    <?php
        try {
            $dbh=NEW PDO("mysql:host=localhost;dbname=polovna_vozila;","root","");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        $sql = "SELECT * from oglasi";
        $result = $dbh->query($sql);
        foreach($result as $row) {
            echo "<tr><td>".$row['id'] . "</td><td>" . $row['marka']. "</td><td>" . $row['model'] . "</td><td>" . $row['cena'] . "</td><td>" . $row['tip'] . "</td><td><form action='brisanje.php' method='POST'><input type='number' name='id' hidden value='".$row['id']."'><input type='submit' value='Obrisi Oglas'></form></td></tr>";
        }
    ?>
    </tbody>
</table>


<form action="unos.php" method="POST" name="forma">
    <label>Id:</label>
    <input type="number" name="id"><br>
    <label>Marka:</label>
    <input type="text" name="marka" required><br>
    <label>Model:</label>
    <input type="text" name="model" required><br>
    <label>Cena:</label>
    <input type="number" name="cena" required><br>
    <label>Tip:</label>
    <select name="tip" required>
        <option value="auto">Auto</option>
        <option value="motor">Motor</option>
        <option value="traktor">Traktor</option>
    </select><br>
    <input type="submit" value="Posalji">
</form>
</body>
</html>