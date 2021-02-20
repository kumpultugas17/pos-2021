<?php
include '../../koneksi.php';
$id = $_GET['id'];

$query = $koneksi->query("SELECT products.name as product_name, products.description as description, products.image as photo, products.price as price, products.stock as stock, categories.name as category_name FROM products INNER JOIN categories ON products.category_id = categories.id WHERE products.id='$id'");
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
    <form>
        <div class="card-header bg-info">
            Input Product
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input class="form-control" type="text" id="product_name" name="product_name" value="<?= $row['product_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input class="form-control" type="text" id="category_name" name="category_name" value="<?= $row['category_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5">
                            <?= $row['description']; ?>
                        </textarea>
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
                        <img src="<?= $row['photo']; ?>" class="img-thumbnail" alt="No Image" width="200px">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-secondary" id="btn-bkProduct">Back</button>
                </div>
            </div>
        </div>
    </form>
</div>