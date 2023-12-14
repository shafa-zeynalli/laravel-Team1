document.querySelectorAll('.card').forEach(item => {
    item.addEventListener('click', function () {
        window.location.href = 'SinglePage.php?id=' + this.getAttribute('data-id');
    });
});