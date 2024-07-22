import './bootstrap';
import './sidebar';
import './modal';


document.addEventListener('DOMContentLoaded', function() {
    const replaceValue = function() {
        this.value = this.value.replace(/[^\d.,]/g, '');
    };

    const replaceValueOnlyNumbers = function(){
        this.value = this.value.replace(/\D/g, '');
    }

    document.getElementById('custo').addEventListener('input', replaceValue);
    document.getElementById('preco_venda').addEventListener('input', replaceValue);
    document.getElementById('estoque').addEventListener('input', replaceValueOnlyNumbers);
    document.getElementById('pontos').addEventListener('input', replaceValueOnlyNumbers);
    document.getElementById('codigo').addEventListener('input', replaceValueOnlyNumbers);
});
