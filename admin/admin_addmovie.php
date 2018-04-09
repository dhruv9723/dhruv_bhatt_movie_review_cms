<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once('phpscripts/config.php');

	$tbl="tbl_genre";
	$genQuery = getAll($tbl);

	if(isset($_POST['submit'])) {
		$title = $_POST['title'];
		$cover = $_FILES['cover'];
		$year = $_POST['year'];
		$runtime = $_POST['runtime'];
		$storyline = $_POST['storyline'];
		$trailer = $_POST['trailer'];
		$release = $_POST['release'];
		$genre = $_POST['genList'];
		$uploadMovie = addMovie($title, $cover, $year, $runtime, $storyline, $trailer, $release, $genre);
		$message = $uploadMovie;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Movie</title>
</head>
<body>
	<h1>Welcome Company Name</h1>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
		<label>Movie Title:</label>
		<input name="title" type="text" value=""><br><br>
		<label>Movie Cover Image:</label>
		<input name="cover" type="file" value=""><br><br>
		<label>Movie Year:</label>
		<input name="year" type="text" value=""><br><br>
		<label>Movie Runtime</label>
		<input name="runtime" type="text" value=""><br><br>
		<label>Movie Storyline</label>
		<input name="storyline" type="text" value=""><br><br>
		<label>Movie Trailer</label>
		<input name="trailer" type="text" value=""><br><br>
		<label>Movie Release</label>
		<input name="release" type="text" value=""><br><br>
		<select name="genList">
			<option value="">Please select a genre</option> 
			<?php 
				while($row = mysqli_fetch_array($genQuery)){
					echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
				} 
			?>
		</select><br><br><br>
		<input type="submit" name="submit" value="Add Movie">
	</form>
</body>
</html>