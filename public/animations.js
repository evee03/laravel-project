//sukces wyskakujący alert
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const alert = document.querySelector('.alert-success');
        if (alert) {
            const closeButton = alert.querySelector('.btn-close');
            closeButton.click(); 
        }
    }, 4000); 
});

//niepowodzenie wyskakujący alert
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        const alert = document.querySelector('.custom-alert');
        if (alert) {
            const closeButton = alert.querySelector('.btn-close');
            closeButton.click(); // Symuluj kliknięcie w przycisk zamknięcia
        }
    }, 4000); 
});

let dayCount = 0;  // Licznik dni treningowych
const maxDays = 7; // Maksymalna liczba dni
const maxExercisesPerDay = 15; // Maksymalna liczba ćwiczeń w dniu

// Funkcja do aktualizowania nazw dni
function updateDayNames() {
    const days = document.querySelectorAll('.workout-day');
    days.forEach((day, index) => {
        const dayNameInput = day.querySelector('.day-name');
        dayNameInput.placeholder = "Wpisz tytuł dnia";
        const dayLabel = day.querySelector('.day-label');
        dayLabel.textContent = `Dzień ${index + 1}`;
        day.dataset.dayIndex = index; // Aktualizacja indeksu dnia
    });
}

// Funkcja do dodawania nowego ćwiczenia w dniu
function addExerciseRow(dayContainer) {
    const exerciseCount = dayContainer.querySelectorAll('tbody tr').length;
    if (exerciseCount >= maxExercisesPerDay) {
        alert('Maksymalna liczba ćwiczeń w dniu to 15.');
        return;
    }

    const exerciseRow = document.createElement('tr');
    
    // Tworzymy listę opcji ćwiczeń z danych przekazanych do JS
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
            <button type="button" class="btn btn-danger btn-sm remove-exercise">Usuń</button>
        </td>
    `;
    dayContainer.querySelector('tbody').appendChild(exerciseRow);

    // Obsługuje usuwanie ćwiczenia
    exerciseRow.querySelector('.remove-exercise').addEventListener('click', () => {
        exerciseRow.remove();
    });
}


document.getElementById('add-day').addEventListener('click', function() {
    if (dayCount < maxDays) {
        const dayContainer = document.createElement('div');
        dayContainer.classList.add('workout-day', 'custom-card', 'p-3', 'mb-4');
        dayContainer.dataset.dayIndex = dayCount;  // Przypisz indeks przed inkrementacją
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

        // Obsługa przycisku dodawania ćwiczenia
        dayContainer.querySelector('.add-exercise').addEventListener('click', () => {
            addExerciseRow(dayContainer);
        });

        // Obsługa przycisku usuwania dnia
        dayContainer.querySelector('.remove-day').addEventListener('click', () => {
            dayContainer.remove();
            dayCount--;
            updateDayNames();
        });

        // Dodaj domyślne ćwiczenie (nieusuwalne)
        addExerciseRow(dayContainer);
    } else {
        alert('Maksymalna liczba dni treningowych to 7.');
    }

});


  






