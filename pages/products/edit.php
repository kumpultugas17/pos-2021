<?php
include '../../koneksi.php';
$id = $_GET['id'];

$query = $koneksi->query("SELECT * FROM products WHERE id='$id'");
$row = mysqli_fetch_array($query);

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>

<div class="card">
    <form id="form-editProduct" enctype="multipart/form-data">
        <div class="card-header bg-info">
            Input Product
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <input class="form-control" type="text" id="product_name" name="product_name" value="<?= $row['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <?php $result = $koneksi->query("SELECT * FROM categories"); ?>
                            <?php foreach ($result as $ctg) { ?>
                                <option value="<?= $ctg['id']; ?>" <?= $ctg['id'] == $row['category_id'] ? 'selected' : '' ?>><?= $ctg['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="10"><?= $row['description']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="number" name="price" id="price" value="<?= $row['price']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input class="form-control" type="number" name="stock" id="stock" value="<?= $row['stock']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label><br>
                        <input type="hidden" name="photo_lama" value="<?= $row['image']; ?>">
                        <input type="file" name="photo" class="file-custom"><br><br>
                        <img src="<?= $row['image']; ?>" class="img-thumbnail" width="200px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>