document.addEventListener('DOMContentLoaded', () => {
    const workoutDaysContainer = document.getElementById('workout-days');
    const addDayButton = document.getElementById('add-day');
    const maxDays = 7;
    const maxExercisesPerDay = 15;  
    function renderDay(day, index) {
        const dayContainer = document.createElement('div');
        dayContainer.classList.add('day-container', 'mb-4');
        dayContainer.dataset.dayIndex = index;  
        dayContainer.innerHTML = `
            <h3 class="form-label day-label fw-bold text-white">Dzień ${index + 1}</h3>
            <div class="mb-3">
                <input 
                    type="text" 
                    id="day-${index}-name" 
                    name="days[${index}][name]" 
                    class="form-control" 
                    value="${day.exercises[0]?.name || ''}" 
                    required
                >
            </div>
            <table style="color: #e0e0e0;" class="table">
                <thead>
                    <tr>
                        <th style="color: #e0e0e0;">Ćwiczenie</th>
                        <th style="color: #e0e0e0;">Serie</th>
                        <th style="color: #e0e0e0;">Powtórzenia</th>
                        <th style="color: #e0e0e0;">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    ${day.exercises.map((exercise, i) => `
                        <tr>
                            <td>
                                <select 
                                    name="days[${index}][exercises][${i}][exercise_id]" 
                                    class="form-select" 
                                    required
                                >
                                    <option value="">Wybierz ćwiczenie</option>
                                    ${exercises.map(ex => `
                                        <option ${Number(ex.id_exercise) === Number(exercise.exercise_id) ? 'selected' : ''} value="${ex.id_exercise}">${ex.name_exercise}</option>
                                    `).join('')}
                                </select>
                            </td>
                            <td><input type="number" name="days[${index}][exercises][${i}][sets]" value="${exercise.sets || ''}" class="form-control" placeholder="Serie" required></td>
                            <td><input type="number" name="days[${index}][exercises][${i}][reps]" value="${exercise.reps || ''}" class="form-control" placeholder="Powtórzenia" required></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-exercise ${i === 0 ? 'btn-secondary disabled' : ''}" data-exercise-index="${i}">Usuń</button>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>
            <div class="d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-success btn-sm add-exercise" style="width: 120px; height: 40px;">Dodaj Ćwiczenie</button>
                <button type="button" class="btn btn-danger btn-sm remove-day" style="width: 120px; height: 40px;">Usuń Dzień</button>
            </div>
        `;
        workoutDaysContainer.appendChild(dayContainer);
    
        dayContainer.querySelector('.add-exercise').addEventListener('click', () => {
            addExerciseRow(dayContainer);
        });
    
        dayContainer.querySelectorAll('.remove-exercise').forEach(button => {
            button.addEventListener('click', (e) => {
                const exerciseIndex = e.target.dataset.exerciseIndex;
                removeExercise(dayContainer, exerciseIndex);
            });
        });
    
        dayContainer.querySelector('.remove-day').addEventListener('click', () => {
            dayContainer.remove();
        });
    }
    
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
                <select name="days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][exercise_id]" class="form-select" required>
                    <option value="">Wybierz ćwiczenie</option>
                    ${exerciseOptions}
                </select>
            </td>
            <td><input type="number" name="days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][sets]" class="form-control" placeholder="Serie" required></td>
            <td><input type="number" name="days[${dayContainer.dataset.dayIndex}][exercises][${exerciseCount}][reps]" class="form-control" placeholder="Powtórzenia" required></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-exercise ${exerciseCount === 0 ? 'btn-secondary disabled' : ''}">Usuń</button>
            </td>
        `;
        dayContainer.querySelector('tbody').appendChild(exerciseRow);

        exerciseRow.querySelector('.remove-exercise').addEventListener('click', () => {
            if (exerciseCount > 0){
                exerciseRow.remove();
            }
        });
    }

    function removeExercise(dayContainer, exerciseIndex) {
        const exerciseRow = dayContainer.querySelectorAll('tbody tr')[exerciseIndex];
        exerciseRow.remove();
    }

    if (typeof trainingDays !== 'undefined' && Array.isArray(trainingDays)) {
        trainingDays.forEach((day, index) => renderDay(day, index));
    } else {
        console.warn('Brak danych treningowych lub niepoprawny format.');
    }

    addDayButton.addEventListener('click', () => {
        const currentDays = workoutDaysContainer.children.length;
        if (currentDays >= maxDays) {
            alert('Możesz dodać maksymalnie 7 dni.');
            return;
        }

        const newDay = { name: '', exercises: [] };
        renderDay(newDay, currentDays);
    });

    function updateDayIndices() {
        const dayContainers = document.querySelectorAll('.day-container');
        dayContainers.forEach((container, index) => {
            container.dataset.dayIndex = index;
            container.querySelector('.day-label').textContent = `Dzień ${index + 1}`;
            const inputs = container.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.name = input.name.replace(/\[days\]\[\d+\]/, `[days][${index}]`);
            });
        });
    }
    
});
