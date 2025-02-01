//success alert
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            const closeButton = alert.querySelector('.btn-close');
            closeButton.click(); 
        }
    }, 4000); 
});

//error alert
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const alert = document.querySelector('.custom-alert');
        if (alert) {
            const closeButton = alert.querySelector('.btn-close');
            closeButton.click(); 
        }
    }, 4000); 
});

//welcome quiz
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.quiz-step');
    const resultSection = document.querySelector('.quiz-result');
    const resultText = document.getElementById('quizResult');
    const buttons = document.querySelectorAll('.quiz-step button');
    let currentStep = 0;
    let answers = [];

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            if (index === stepIndex) {
                step.classList.remove('d-none');
            } else {
                step.classList.add('d-none');
            }
        });
    }

    function showResult() {
        const result = calculateResult(answers);
        resultText.textContent = result;
        resultSection.classList.remove('d-none');
    }

    function calculateResult(answers) {
        const [goal, frequency, place] = answers;

        if (goal === '1' && frequency === '1' && place === '1') {
            return "Plan treningowy w domu z naciskiem na redukcję wagi, zawierający ćwiczenia cardio i trening siłowy z wykorzystaniem masy ciała.";
        } else if (goal === '1' && frequency === '1' && place === '2') {
            return "Plan treningowy na siłowni z naciskiem na spalanie tłuszczu, zawierający trening interwałowy (HIIT) i ćwiczenia na maszynach cardio.";
        } else if (goal === '1' && frequency === '1' && place === '3') {
            return "Plan treningowy na świeżym powietrzu z naciskiem na redukcję wagi, zawierający bieganie, jazdę na rowerze i ćwiczenia funkcjonalne.";
        } else if (goal === '2' && frequency === '2' && place === '1') {
            return "Plan treningowy w domu z naciskiem na budowanie mięśni, zawierający ćwiczenia z hantlami, gumami oporowymi i trening siłowy.";
        } else if (goal === '2' && frequency === '2' && place === '2') {
            return "Plan treningowy na siłowni z naciskiem na budowanie masy mięśniowej, zawierający trening siłowy z wolnymi ciężarami i maszynami.";
        } else if (goal === '2' && frequency === '2' && place === '3') {
            return "Plan treningowy na świeżym powietrzu z naciskiem na budowanie mięśni, zawierający ćwiczenia z wykorzystaniem własnej masy ciała i sprzętu przenośnego.";
        } else if (goal === '3' && frequency === '3' && place === '1') {
            return "Plan treningowy w domu z naciskiem na poprawę kondycji, zawierający ćwiczenia cardio, jogę i stretching.";
        } else if (goal === '3' && frequency === '3' && place === '2') {
            return "Plan treningowy na siłowni z naciskiem na poprawę kondycji, zawierający trening obwodowy, zajęcia fitness i ćwiczenia na maszynach cardio.";
        } else if (goal === '3' && frequency === '3' && place === '3') {
            return "Plan treningowy na świeżym powietrzu z naciskiem na poprawę kondycji, zawierający bieganie, jazdę na rowerze i trening funkcjonalny.";
        } else {
            return "Plan treningowy dostosowany do Twoich odpowiedzi. Skontaktuj się z trenerem, aby uzyskać spersonalizowane wskazówki.";
        }
    }

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const answer = this.getAttribute('data-answer');
            answers.push(answer);

            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            } else {
                showResult();
            }
        });
    });

    showStep(currentStep);
});

//create treining
let dayCount = 0;  
const maxDays = 7; 
const maxExercisesPerDay = 15; 

//update name day
function updateDayNames() {
    const days = document.querySelectorAll('.workout-day');
    days.forEach((day, index) => {
        const dayNameInput = day.querySelector('.day-name');
        dayNameInput.placeholder = "Wpisz tytuł dnia";
        const dayLabel = day.querySelector('.day-label');
        dayLabel.textContent = `Dzień ${index + 1}`;
        day.dataset.dayIndex = index; 
    });
}

//add exercise in day
function addExerciseRow(dayContainer) {
    const exerciseCount = dayContainer.querySelectorAll('tbody tr').length;
    if (exerciseCount >= maxExercisesPerDay) {
        alert('Maksymalna liczba ćwiczeń w dniu to 15.');
        return;
    }

    const exerciseRow = document.createElement('tr');
    
    let exerciseOptions = '';
exercises.forEach(exercise => {
    exerciseOptions += `<option value="${exercise.id_exercise}">${exercise.name_exercise}</option>`;
});

    
    exerciseRow.innerHTML = `
        <td>
            <select name="workout_days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][exercise_id]" class="form-select" required>
                ${exerciseOptions}
            </select>
        </td>
        <td><input type="number" name="workout_days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][series]" class="form-control" required></td>
        <td><input type="text" name="workout_days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][reps]" class="form-control" required></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-exercise ${exerciseCount === 0 ? 'btn-secondary disabled' : ''}">Usuń</button>
        </td>
    `;
    dayContainer.querySelector('tbody').appendChild(exerciseRow);

    //delete exercise
    exerciseRow.querySelector('.remove-exercise').addEventListener('click', () => {
        if (exerciseCount > 0){
            exerciseRow.remove();
        }
    });
}

document.getElementById('add-day').addEventListener('click', function() {
    if (dayCount < maxDays) {
        const dayContainer = document.createElement('div');
        dayContainer.classList.add('workout-day', 'custom-card', 'p-3', 'mb-4');
        dayContainer.dataset.dayIndex = dayCount;  
        dayCount++;

        dayContainer.innerHTML = `
            <div class="mb-3">
                <h3><label class="form-label day-label fw-bold text-white">Dzień ${dayCount}</label></h3>
                <input type="text" class="form-control day-name" name="workout_days[${dayContainer.dataset.dayIndex}][name]" placeholder="Wpisz tytuł dnia" required>
            </div>

            <table style="color: #e0e0e0;" class="table">
                <thead>
                    <tr>
                        <th style="color: #e0e0e0;">Ćwiczenie</th>
                        <th style="color: #e0e0e0;">Serie</th>
                        <th style="color: #e0e0e0;">Powtórzenia</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            <div class="row">
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-success btn-sm add-exercise" style="width: 120px; height: 40px;">Dodaj Ćwiczenie</button>
                    <button type="button" class="btn btn-danger btn-sm remove-day" style="width: 120px; height: 40px;">Usuń Dzień</button>
                </div>
            </div>
        `;

        document.getElementById('workout-days').appendChild(dayContainer);
        updateDayNames();

        //add exercise
        dayContainer.querySelector('.add-exercise').addEventListener('click', () => {
            addExerciseRow(dayContainer);
        });

        //button delete day
        dayContainer.querySelector('.remove-day').addEventListener('click', () => {
            dayContainer.remove();
            dayCount--;
            updateDayNames();
        });

        //deafult exercise (indelible)
        addExerciseRow(dayContainer);
    } else {
        alert('Maksymalna liczba dni treningowych to 7.');
    }

});


  






