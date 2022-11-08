<?php
  include '../db.php';
  $sql = "select * from songs";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    if ($row['song_id'] == $_GET['id']) {
      echo '<form action="update.php" method="POST" enctype="multipart/form-data">';
      echo '<td><input type="text" name="judul" value="'.$row['Judul'].'"></td>';
      echo '<td><input type="text" name="penyanyi" value="'.$row['Penyanyi'].'"></td>';
      echo '<td><input type="date" name="tanggal_terbit" value="'.$row['Tanggal_terbit'].'"></td>';
      echo '<td><input type="text" name="Genre" value="'.$row['Genre'].'"></td>';
      echo '<td><input type="text" name="duration" value"'.$row['Duration'].'"></td>';
      echo '<td><input type="file"  id="audio" name="Audio_file" value="'. $row['Audio_path'].'"></td>';
      echo '<td><input type="file"  id="image" name="Image_file" value="'. $row['Image_path'].'"></td>';
      echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
      echo '<input type="hidden" name="song_id" value="'.$row['song_id'].'">';

      echo '</form>';
    } else {
      echo "<th>song_id</th>";
      echo "<th>Judul</th>";
      echo "<th>Penyayi</th>";
      echo "<th>Tanggal Terbit</th>";
      echo "<th>Genre</th>";
      echo "<th>Duration</th>";
      echo "<th>Audio Path</th>";
      echo "<th>Image Path</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>" . $row['song_id'] . "</td>";
      echo "<td>" . $row['Judul'] . "</td>";
      echo "<td>" . $row['Penyanyi'] . "</td>";
      echo "<td>" . $row['Tanggal_terbit'] . "</td>";
      echo "<td>" . $row['Genre'] . "</td>";
      echo "<td>" . $row['Duration'] . "</td>";
      echo "<td>" . $row['Audio_path'] . "</td>";
      echo "<td>" . $row['Image_path'] . "</td>";

      echo '<td><a class="btn btn-primary" href="index.php?id=' . $row['song_id'] . '" role="button">Update</a></td>';
    }
    echo '<td><a class="btn btn-danger" href="delete.php?id=' . $row['song_id'] . '" role="button">Delete</a></td>';

    echo "</tr>";
  }
  $conn->close();
?>
