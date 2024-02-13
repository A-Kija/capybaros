
if (document.querySelector('[data-mechanic-create]')) {
    
    const inputs = document.querySelector('[data-mechanic-inputs]');
    const section = document.querySelector('[data-mechanic-create]');
    const addButtons = section.querySelector('[data-add-button');
    addButtons.addEventListener('click', _ => {
        const input = section.querySelector('[data-mechanic-inputs-clone] div').cloneNode(true);
        input.querySelector('select').setAttribute('name', 'mechanic_id[]');
        inputs.appendChild(input);

        const removeButton = input.querySelector('[data-mechanic-remove]');
        removeButton.addEventListener('click', _ => {
            input.remove();
        });
    });

    const removeButtons = section.querySelectorAll('[data-mechanic-remove]');
    removeButtons.forEach(button => {
        button.addEventListener('click', _ => {
            const input = button.closest('.form-group');
            input.remove();
        });
    });
    
}

if (document.querySelector('[data-mechanic-edit]')) {
    
    const inputs = document.querySelector('[data-mechanic-inputs]');
    const section = document.querySelector('[data-mechanic-edit]');
    const addButtons = section.querySelector('[data-add-button');
    addButtons.addEventListener('click', _ => {
        const input = section.querySelector('[data-mechanic-inputs-clone] div').cloneNode(true);
        input.querySelector('select').setAttribute('name', 'mechanic_id[]');
        inputs.appendChild(input);

        const removeButton = input.querySelector('button');
        removeButton.addEventListener('click', _ => {
            input.remove();
        });
    });

    const removeButtons = section.querySelectorAll('[data-mechanic-remove]');
    removeButtons.forEach(button => {
        button.addEventListener('click', _ => {
            const input = button.closest('.form-group');
            input.remove();
        });
    });
    
}