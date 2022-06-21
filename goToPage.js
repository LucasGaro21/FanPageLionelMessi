const pageButtons = document.querySelectorAll('.btn-page');

pageButtons.forEach(button => {
    button.addEventListener('click', () => {
        window.location.href = `http://localhost/Fan%20Page/front-notice.php?page=${button.innerHTML}`;
    });
});
