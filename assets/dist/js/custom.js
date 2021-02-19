$(document).ready(function (){
    loadDashboard();

    $("#sidebarMenu").on("click", ".btnDashboard", function (){
        loadDashboard();
        deActivate();
        $('.btnDashboard').addClass('active');
    });

    $("#sidebarMenu").on("click", ".btnProducts", function (){
        loadProducts();
        deActivate();
        $('.btnProducts').addClass('active');
    });

    $("#konten").on("click", "#btn-createProduct", function (){
        $.ajax({
            url: 'pages/products/create.php',
            type: 'get',
            success: function(data) {
                $('#konten').html(data);
            }
        });
    });

    function loadDashboard() {
        $.ajax({
            url: 'pages/dashboard.php',
            type: 'get',
            success: function(data) {
                $('#konten').html(data);
            }
        });
    }

    function loadProducts() {
        $.ajax({
            url: 'pages/products/index.php',
            type: 'get',
            success: function(data) {
                $('#konten').html(data);
            }
        });
    }

    deActivate();
    function deActivate() {
        $('.btnDashboard').removeClass('active');
        $('.btnProducts').removeClass('active');
        $('.btnOrders').removeClass('active');
        $('.btnCustomers').removeClass('active');
        $('.btnReports').removeClass('active');
    }

    $('#konten').on('submit', '#form-addProduct', function(event){
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'pages/products/action.php?act=add',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                loadProducts();
                // if (response == 'success') {
                //     console.log('Berhasil');
                // } else {
                //     console.log('Gagal');
                // }
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Product has been saved',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });

    $('#konten').on('click', '#btn-deleteProduct', function(){
        Swal.fire({
            title: 'Are You Sure ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('value');
                $.ajax({
                    url: 'pages/products/action.php?act=delete',
                    type: 'POST',
                    data: {
                        id : id
                    },
                    success: function(response) {
                        loadProducts();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Your file has been deleted',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });

});