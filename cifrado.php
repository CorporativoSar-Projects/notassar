<?php
$pass= "JAJA";
$cifrado = cifrarSHA256($pass);
echo ($cifrado);
echo "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855";


function cifrarSHA256($texto) {
		return hash('sha256', $texto);
	}
?>