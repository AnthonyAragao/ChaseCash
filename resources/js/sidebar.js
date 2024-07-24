// Side Item
document.addEventListener('DOMContentLoaded', function() {
    const btns = document.querySelectorAll('.side-item');
    const pathArray = window.location.pathname.split('/');
    const path = pathArray[1];


    btns.forEach(btn => {
        if(btn.getAttribute('data-id') === path) {
            btn.classList.add('active');
        }
    });
});
