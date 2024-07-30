function addTask() {
    let taskInput = document.getElementById('task-input');
    let taskList = document.getElementById('task-list');

    if (taskInput.value.trim() !== '') {
        
        let newTask = document.createElement('li');

        // add text
        let taskText = document.createElement('span');
        taskText.textContent = taskInput.value;
        taskText.className = 'task-text'; // css class
        newTask.appendChild(taskText);

        
        // done button
        let doneButton = document.createElement('button');
        doneButton.textContent = 'Done';
        doneButton.onclick = function() {
            newTask.classList.toggle("task-done")
        };
        newTask.appendChild(doneButton);

        // delete button
        let deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = function() {
            taskList.removeChild(newTask);
        };
        newTask.appendChild(deleteButton);

        // add task
        taskList.appendChild(newTask);

        // clear input
        taskInput.value = '';
    }
}
