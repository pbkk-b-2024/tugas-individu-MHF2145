document.getElementById('toggle-sidebar').addEventListener('click', function () {
    var sidebar = document.querySelector('.main-sidebar');
    var contentWrapper = document.querySelector('.content-wrapper');

    sidebar.classList.toggle('active');
    contentWrapper.classList.toggle('shifted');
});
