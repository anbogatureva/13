<?php
$autor = $_GET["autor"];
$mysqli = new mysqli("localhost", "root", "", "mydb");
if ($autor == '')
{
  $result = $mysqli->query("SELECT distinct `autor` FROM `books`");
  echo "Все авторы:<br>";
  while ($row = $result->fetch_assoc())
  {
    echo $row["autor"];
    echo "<br>";
  }
  include ("findAutor.html");
}
else
{
  $result = $mysqli->query("SELECT * FROM `books` WHERE `autor` like '$autor'");
  if ($result->num_rows < 1)
  {
    echo "Нет такого автора<br>";
    $result = $mysqli->query("SELECT distinct `autor` FROM `books`");
    echo "Все авторы:<br>";
    while ($row = $result->fetch_assoc())
    {
      echo $row["autor"];
      echo "<br>";
    }
    include ("findAutor.html");
  }
  else
  {
  echo "Книги, которые написал " . $autor . ":<br>";
  while ($row = $result->fetch_assoc())
  {
    echo $row["title"] . ' - ' . $row["autor"] . '. Издание: ' . $row["publisher"];
    echo "<br>";
  }
}
}
 ?>
