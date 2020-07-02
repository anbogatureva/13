<?php
$title = $_POST['title'];
$autor = $_POST['autor'];
$pages = $_POST['pages'];
$publisher = $_POST['publisher'];
if($title == '' || $autor == '' || $pages == '' || $pages <= 0 || $publisher == '' )
{
  echo "Введены не все данные. Повторите ввод формы.";
  include("index.html");
}
else
{
  $mysqli = new mysqli("localhost", "root", "", "mydb");
  $sql_command = "insert into `books` (`title`, `autor`,`pages`,`publisher`) values('$title','$autor','$pages','$publisher')";
  $mysqli->query($sql_command);
  echo "Книга успешно добавлена.";
  include("findAutor.html");
}
 ?>
