<?php 
if (empty($profil)) {
	echo "Belum ada profil untuk cabang ini. Silahkan anda login untuk menginputkan profil organisasi anda.
	Profil bisa berisi sejarah, struktur pengurus, program kerja dan lain-lain yang berhubungan dengan organisasi anda";
} else {
	foreach ($profil as $key => $row) {
	echo "<h2>" .$row->judul. "</h2>";
	echo $row->profil;
	}
} 
?>