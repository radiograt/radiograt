<?php
$plik_licznika = "licznik.txt";
$plik_ip = "adresy_ip.txt";

// Jeśli pliki nie istnieją, utwórz je
if (!file_exists($plik_licznika)) {
    file_put_contents($plik_licznika, "0");
}
if (!file_exists($plik_ip)) {
    file_put_contents($plik_ip, "");
}

// Pobierz aktualny stan licznika
$liczba_odwiedzin = (int)file_get_contents($plik_licznika);

// Pobierz adres IP użytkownika
$user_ip = $_SERVER['REMOTE_ADDR'];

// Pobierz listę zapisanych adresów IP i rozbij ją na tablicę
$zapisane_ip = explode("\n", trim(file_get_contents($plik_ip)));

// Sprawdź, czy użytkownik nie ma ciasteczka ORAZ czy jego IP nie ma na liście
if (!isset($_COOKIE['odwiedzono']) && !in_array($user_ip, $zapisane_ip)) {
    
    // Ustaw ciasteczko na 1 rok
    setcookie('odwiedzono', 'tak', time() + (365 * 24 * 3600), "/");
    
    // Dopisz nowe IP do pliku (każde w nowej linijce)
    file_put_contents($plik_ip, $user_ip . "\n", FILE_APPEND);
    
    // Zwiększ licznik i zapisz
    $liczba_odwiedzin++;
    file_put_contents($plik_licznika, $liczba_odwiedzin);
}
?>
<html>
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<head>
<title>Radiograt - Strona glowna</title>
</head>
<body>
<center>
<img src="radiograt.gif" alt="">
<hr width="900">
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
<p><a href="pobierz.html">[Do pobrania (Nokia 9110)]</a></p>
<p><a href="http://radiogratwap.atwebpages.com">[Strona WAP]</a></p>
</font>

<!-- --- a tu ten caly licznik.. wait co tu robisz?!?--- -->
<font size="4">
<hr width="200">
<p>Liczba odwiedzin: <b><?php echo $liczba_odwiedzin; ?></b></p>
</font>

<font size="3">
<hr width="200">
<p><i>Radiograt12p (piotru090)</i></p>
<p><i>Kontakt: piterpencula@gmail.com</i></p>        

</font> 
</center>
</body>
</html>