import './bootstrap';

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


// Modal
const btn_open_modal = document.getElementById('btn_open_modal');
const modal = document.querySelector('.modal');
const modal_sombra = document.querySelector('.modal__sombra');
const btn_close_modal = document.querySelectorAll('.btn_close_modal');

const close_modal = () => {
    modal.style.display = 'none';
    document.querySelector('body').style.overflow = 'auto';
}

if (btn_open_modal && modal) {
    btn_open_modal.addEventListener('click', (event) => {
        event.preventDefault();
        modal.style.display = 'block';
        document.querySelector('body').style.overflow = 'hidden';
    });
}

if (modal_sombra) {
    modal_sombra.addEventListener('click', close_modal);
}

btn_close_modal.forEach(btn => {
    btn.addEventListener('click', close_modal);
});


