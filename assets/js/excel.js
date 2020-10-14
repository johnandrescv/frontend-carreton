$.get( "./assets/php/listado.php", ( data ) => {
    for (const item of data) {
        $('#'+item.categoria).append('<div class="col"><div class="product-item"><div class="product-item__thumb"><a href="single-product.html"><img class="thumb-primary" src="assets/img/product/product-6.png" alt="Product" /><img class="thumb-secondary" src="assets/img/product/product-7.png" alt="Product" /></a></div><div class="product-item__content mt-3"><h4 class="title"><a href="single-product.html">'+item.nombre+'</a></h4></div></div></div>');
    }
});