@extends('layouts.app')

@section('content')
{{-- Caminho da página --}}
<div class="page-path-and-img">
    <div>
        <h2>Minhas vendas</h2>
        <div class="page-path">
            <span class="icon"><a href="#"><i class="fa-solid fa-home"></i></a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="{{ route("vendas.index") }}">Vendas</a></span>
            <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
            <span><a href="#" class="active">Nova venda</a></span>
        </div>
    </div>
</div>

{{-- Card etapas --}}
<div class="card-phases">
    <div class="card-phases__stage" id="stage-1">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-solid fa-circle-check"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Cliente</span>
    </div>

    <div class="card-phases__stage" id="stage-2">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-regular fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Itens compra</span>
    </div>

    <div class="card-phases__stage" id="stage-3">
        <div class="card-phases__stage-progress">
            <div></div>
            <span><i class="fa-regular fa-circle"></i></span>
            <div></div>
        </div>

        <span class="card-phases__stage-title">Pagamento</span>
    </div>
</div>

{{-- Formulário etapas --}}


{{-- Btns prosseguir nas etapas --}}
<div class="group-btns__phases">
    <button type="button" id="prevBtn">Voltar</button>
    <button type="button" id="nextBtn">Prosseguir</button>
</div>
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentStage = 0;
        const totalStages = 3;

        const updateStages = () => {
            for (let i = 1; i <= totalStages; i++) {
                const stage = document.getElementById(`stage-${i}`);
                const progress = stage.querySelector('.card-phases__stage-progress');
                const title = stage.querySelector('.card-phases__stage-title');
                const icon = progress.querySelector('i');

                if (i < currentStage || i === currentStage) {
                    progress.classList.add('progress-active');
                    title.classList.add('title-active');
                    icon.classList.remove('fa-regular', 'fa-circle');
                    icon.classList.add('fa-solid', 'fa-circle-check');
                } else {
                    progress.classList.remove('progress-active');
                    title.classList.remove('title-active');
                    icon.classList.remove('fa-solid', 'fa-circle-check');
                    icon.classList.add('fa-regular', 'fa-circle');
                }
            }
        };

        document.getElementById('nextBtn').addEventListener('click', () => {
            event.preventDefault();
            if (currentStage < totalStages) {
                currentStage++;
                updateStages();
            }
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            event.preventDefault();
            if (currentStage >= 1) {
                currentStage--;
                updateStages();
            }
        });

        updateStages();
    });
</script>
@endsection
