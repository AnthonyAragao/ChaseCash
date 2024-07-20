// Side Item
document.addEventListener('DOMContentLoaded', function() {
    const btns = document.querySelectorAll('.side-item');

    function restoreActiveState() {
        const activeId = localStorage.getItem('activeSideItem');
        if (activeId) {
            btns.forEach(btn => {
                if (btn.getAttribute('data-id') === activeId) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }
    }

    btns.forEach(btn => {
        btn.addEventListener('click', function () {
            btns.forEach(btn => {
                btn.classList.remove('active');
            });

            this.classList.add('active');

            localStorage.setItem('activeSideItem', this.getAttribute('data-id'));
        });
    });

    restoreActiveState();
});
