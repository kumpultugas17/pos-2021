<?php
include '../../koneksi.php';
$result = $koneksi->query("SELECT products.id as id, products.name as product_name, products.description as description, products.image as photo, products.price as price, products.stock as stock, categories.name as category_name FROM products INNER JOIN categories ON products.category_id = categories.id");
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

<button class="btn btn-sm btn-primary mb-3" id="btn-createProduct">Create Product</button>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead class="bg-light">
            <tr>
                <th class="text-center">#</th>
                <th>Produk Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['product_name']; ?></td>
                    <td><?= $row['category_name']; ?></td>
                    <td><?= substr($row['description'], 0, 50) . ' ...'; ?></td>
                    <td><?= 'Rp ' . number_format($row['price'], 0, ',', '.'); ?></td>
                    <td class="text-center"><?= $row['stock']; ?></td>
                    <td class="text-center"><img src="<?= $row['photo']; ?>" width="50px"></td>
                    <td class="text-center">
                        <button id="btn-previewProduct" class="btn btn-sm btn-info">
                            <i class="fa fa-search"></i>
                        </button>
                        <button id="btn-editProduct" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button value="<?= $row['id']; ?>" id="btn-deleteProduct" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>