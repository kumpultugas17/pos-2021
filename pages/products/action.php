<?php
include '../../koneksi.php';

switch ($_GET['act']) {
    case 'add':
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $temp = "images/";
    if (!empty($_FILES['photo']['tmp_name'])) {
        $fileUpload = $_FILES['photo']['tmp_name'];
        $imageName = $_FILES['photo']['name'];
        $random = rand(1111111, 99999999);
        $imageExt = substr($imageName, strrpos($imageName, '.'));
        $imageExt = str_replace('.', '', $imageExt);
        $imageName = preg_replace("/\.[^.\s]{3,4}$/4", "", $imageName);
        $newName = str_replace(' ', '', $random . '.' . $imageExt);
        $photo = $temp.$newName;
        move_uploaded_file($fileUpload, '../../images/'.$newName);
    } else {
        $photo = $temp.'no-image.png';
    }

    $query = $koneksi->query("INSERT INTO products (name, category_id, description, image, price, stock) VALUES ('$product_name', '$category_id', '$description', '$photo', '$price', '$stock')");
    break;

    case 'update':

    break;

    case 'delete';
    $id = $_POST['id'];

    $result = $koneksi->query("SELECT * FROM products WHERE id = '$id' LIMIT 1");
    while ($row = mysqli_fetch_assoc($result)) {
        $photo = $row['image'];
        if ($photo != "images/no-image.png") {
            unlink('../../'.$photo);
        }
    }

    mysqli_query($koneksi, "DELETE FROM products WHERE id = '$id'");
    break;
}