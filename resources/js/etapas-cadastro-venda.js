document.addEventListener('DOMContentLoaded', function () {
    const firstStage = document.getElementById('first-stage');
    const secondStage = document.getElementById('second-stage');
    const thirdStage = document.getElementById('third-stage');
    let currentStage = 1;
    const totalStages = 3;

    const updateStages = () => {
        if(currentStage === 1){
            firstStage.style.display = 'block';
            secondStage.style.display = 'none';
            thirdStage.style.display = 'none';
        } else if(currentStage === 2){
            firstStage.style.display = 'none';
            secondStage.style.display = 'block';
            thirdStage.style.display = 'none';

        } else if(currentStage === 3){
            firstStage.style.display = 'none';
            secondStage.style.display = 'none';
            thirdStage.style.display = 'block';
        }

        for (let i = 1; i <= totalStages; i++) {
            const stage = document.getElementById(`stage-${i}`);
            const progress = stage.querySelector('.card-phases__stage-progress');
            const title = stage.querySelector('.card-phases__stage-title');
            const icon = progress.querySelector('i');

            if (i < currentStage) {
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
        if (currentStage > 1) {
            currentStage--;
            updateStages();
        }
    });

    updateStages();
});
