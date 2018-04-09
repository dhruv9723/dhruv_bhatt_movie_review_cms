<?php
	
	function single_edit($tbl,$col,$id) {
		$result = getSingle($tbl, $col, $id);
		$getResult = mysqli_fetch_array($result);
		//echo mysqli_num_fields($result);
		echo "<form action=\"phpscripts/editall.php\" method=\"post\">";
		echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
		echo "<input hidden name=\"col\" value=\"{$col}\">";
		echo "<input hidden name=\"id\" value=\"{$id}\">";
		for($i=0; $i<mysqli_num_fields($result); $i++) {
			$dataType = mysqli_fetch_field_direct($result,$i);
			$fieldname = $dataType -> name;
			//echo $fieldname."<br>";
			$fieldtype = $dataType -> type;
			//echo $fieldtype."<br>";
			if($fieldname != $col){
				echo "<label>{$fieldname}</label><br>";
				if($fieldtype != "252"){
					echo "<input type=\"text\" name=\"{$fieldname}\" value=\"{$getResult[$i]}\"><br><br>";
				}else{
					echo "<textarea name=\"{$fieldname}\">{$getResult[$i]}</textarea><br><br>";
				}
			}
		}
		echo "<input type=\"submit\" name=\"submit\" value=\"Save Content\">";
		echo "</form>";
	}
?>