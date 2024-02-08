
if (document.querySelector('[data-photo-create]')) {
    
    const inputs = document.querySelector('[data-photo-inputs]');
    const section = document.querySelector('[data-photo-create]');
    const addButtons = section.querySelector('[data-add-button');
    addButtons.addEventListener('click', _ => {
        const input = section.querySelector('[data-photo-inputs-clone] div').cloneNode(true);
        input.querySelector('input').setAttribute('name', 'photos[]');
        inputs.appendChild(input);

        const removeButton = input.querySelector('button');
        removeButton.addEventListener('click', _ => {
            input.remove();
        });
    });
    
}

if (document.querySelector('[data-photo-edit]')) {
    
    const inputs = document.querySelector('[data-photo-inputs]');
    const section = document.querySelector('[data-photo-edit]');
    const addButtons = section.querySelector('[data-add-button');
    addButtons.addEventListener('click', _ => {
        const input = section.querySelector('[data-photo-inputs-clone] div').cloneNode(true);
        input.querySelector('input').setAttribute('name', 'photos[]');
        inputs.appendChild(input);

        const removeButton = input.querySelector('button');
        removeButton.addEventListener('click', _ => {
            input.remove();
        });
    });

    const removeButtons = section.querySelectorAll('[data-photo-remove]');
    removeButtons.forEach(button => {
        button.addEventListener('click', _ => {
            const input = button.closest('.form-group');
            input.remove();
        });
    });
    
}