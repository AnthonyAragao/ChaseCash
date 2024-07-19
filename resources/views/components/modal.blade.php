<div class="modal">
    <div class="modal__sombra"></div>
    <div class="modal__container">
        <div class="modal__header">
            <h1>{{ $title }}</h1>
            <button class="btn_close_modal">
                <i class="fa-solid fa-xmark fa-xl" style="color: #6b7280;"></i>
            </button>
        </div>

        <div class="modal__body">
            {{ $slot }}
        </div>

        <div class="modal__footer">
            {{ $footer ?? '' }}
        </div>
    </div>
</div>
