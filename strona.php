<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$plik_licznika = "licznik.txt";
if (!file_exists($plik_licznika)) {
    file_put_contents($plik_licznika, "0");
}
$liczba_odwiedzin = (int)file_get_contents($plik_licznika);
if (!isset($_SESSION['odwiedzono'])) {
    $_SESSION['odwiedzono'] = true;
    $liczba_odwiedzin++;
    file_put_contents($plik_licznika, $liczba_odwiedzin);
}
?>
<html>
<head>
<title>Radiograt - Strona glowna</title>
</head>
<body>
<center>
<img src="radiograt.gif" alt="">
<font size="5">

<p>Dzis jest:</p>
<p><b><?php date_default_timezone_set("Europe/Warsaw"); echo date("d.m.Y H:i"); ?></b></p>
<p>Internet na nokia communicator!</p>
<img src="ratuszlubin2.gif" alt="">        
<p>Radiograt pozdrawia Dawnofony oraz obserwujacych!</p>
<img src="NOKIA9000a.gif" alt="">        
<hr width="900">
<p><a href="zdjecia.html">[Galeria zdjec]</a></p>
<p><a href="blog.html">[Wpisy]</a></p>
<p><a href="http://atwebpages.com">[Strona WAP]</a></p>
</font>

<!-- --- licznik --- -->
<font size="4">
<hr width="400">
<p>Jestes gosciem numer: <b><?php echo $liczba_odwiedzin; ?></b></p>
</font>

<font size="3">
<hr width="200">
<p><i>Radiograt12p (piotru090)</i></p>        

</font> 
</center>
</body>
</html>