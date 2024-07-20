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
