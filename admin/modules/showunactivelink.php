<?php
	// show deleted data
	if($_SESSION['usertype']=="1"){	
	echo "<div class='show-discard'>";
		echo "<p>";
		if(isset($_GET['discard'])){
			echo "<a href='$pagecall.php'>Show Active ".ucwords($tabel);
			echo "</a>";	
		}
		else{
			echo "<a href='$pagecall.php?discard'>Show Unactive ".ucwords($tabel);
			echo "</a>";	
		}
		echo "</p>";
		echo "</div>";
	}
?>