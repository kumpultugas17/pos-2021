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
    <form id="form-addProduct" enctype="multipart/form-data">
        <div class="card-header bg-info">
            Input Product
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input class="form-control" type="text" id="product_name" name="product_name">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option selected disabled>Select Category</option>
                            <?php
                            include '../../koneksi.php';
                            $result = $koneksi->query("SELECT * FROM categories");
                            foreach ($result as $row) {
                                ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="8"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="number" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input class="form-control" type="number" name="stock" id="stock">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input class="custom-file" type="file" name="photo" id="photo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" id="btn-saveProduct">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>