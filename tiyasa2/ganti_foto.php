<?php
/* Mendapatkan rincian POST */
$post = isset($_POST) ? $_POST : array();
switch ($post['action']) {
	case 'save':
		savePicTmp();
		break;
	default:
		changePic();
}
/* Fungsi untuk mengubah foto profil */
function changePic()
{
	$post = isset($_POST) ? $_POST : array();
	$max_width = "500";
	//lokasi simpan foto cover
	$pathThumbs = 'images/thumbs';
	$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");
	$name =	$_POST['TempatGambar'] . ".jpg";
	$size = $_FILES['pic']['size'];

	$nama_file = $_POST['TempatGambar'] . ".jpg";
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	// Set path folder tempat menyimpan gambarnya
	$path = "./images/fulls/" . $nama_file;
	if ($ukuran_file <= 1000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
		// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
		// Proses upload

		if (move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
			echo "<script>alert('Data berhasil di tambahkan!');</script>";
		} else {
			// Jika gambar gagal diupload, Lakukan :
			echo "<script>alert('Data gagal di tambahkan!');</script>";
		}
	} else {
		// Jika ukuran file lebih dari 1MB, lakukan :
		echo "<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB');</script>";
	}

	if (strlen($name)) {
		list($txt, $ext) = explode(".", $name);
		if (in_array($ext, $valid_formats)) {
			if ($size < (848 * 600)) {
				$filePathThumbs = $pathThumbs . '/' . $name;
				$tmp = $_FILES['pic']['tmp_name'];
				if (move_uploaded_file($tmp, $filePathThumbs)) {
					$width = getWidth($filePathThumbs);
					$height = getHeight($filePathThumbs);
					//Menskalakan gambar jika lebih besar dari lebar yang ditentukan di atas
					if ($width > $max_width) {
						$scale = $max_width / $width;
						$uploaded = resizeImage($filePathThumbs, $width, $height, $scale);
					} else {
						$scale = 1;
						$uploaded = resizeImage($filePathThumbs, $width, $height, $scale);
					}
					$res = savePic(array(
						'userId' => isset($userId) ? intval($userId) : 0,
						'avatar' => isset($actual_image_name) ? $actual_image_name : '',
					));
					echo "<img id='photo' file-name='" . $name . "' class='' src='" . $filePathThumbs . '?' . time() . "' class='preview'/>";
				} else {
					echo "gagal upload foto cover";
				}
			} else
				echo "Ukuran file gambar maksimal 1 MB";
		} else
			echo "Format file tidak valid..";
	} else
		echo "Silakan pilih gambar..!";
	exit;
}
/* Fungsi untuk menyimpan foto profil */
function savePic($options)
{
	//Menangani update foto profil dengan Query update MySQL menggunakan array $options
}

/* Update gambar */
function savePicTmp()
{
	$post = isset($_POST) ? $_POST : array();
	$t_width = 848; // Lebar thumbnail maksimum
	$t_height = 600;    // Tinggi thumbnail maksimum
	if (isset($_POST['t']) and $_POST['t'] == "ajax") {
		extract($_POST);
		$imagePath = 'images/thumbs/' . $_POST['image_name'];
		$ratio = ($t_width / $w1);
		$nw = ceil($w1 * $ratio);
		$nh = ceil($h1 * $ratio);
		$nimg = imagecreatetruecolor($nw, $nh);
		$im_src = imagecreatefromjpeg($imagePath);
		imagecopyresampled($nimg, $im_src, 0, 0, $x1, $y1, $nw, $nh, $w1, $h1);
		imagejpeg($nimg, $imagePath, 90);
	}
	echo $imagePath . '?' . time();;
	echo "<script>alert('Data berhasil di tambahkan!');</script>";
	exit(0);
}
/* Fungsi untuk mengubah ukuran gambar */
function resizeImage($image, $width, $height, $scale)
{
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);
	imagejpeg($newImage, $image, 90);
	chmod($image, 0777);
	return $image;
}
/* Fungsi untuk mendapatkan tinggi gambar */
function getHeight($image)
{
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
/* Fungsi untuk mendapatkan lebar gambar. */
function getWidth($image)
{
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}