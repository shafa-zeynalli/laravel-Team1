document.querySelectorAll('.removeItem').forEach(item => {
    item.addEventListener('click', function () {
        window.location.href = 'Cart.php?id=' + this.getAttribute('data-product-id');
    });
});