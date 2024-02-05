import axios from 'axios';
import './bootstrap';


console.log('Hello! I am app.js.');

const clearForm = form => {
    form.querySelectorAll('input').forEach(input => {
        input.value = '';
    });
}

const destroyFromList = url => {

}



const deleteFromList = url => {
    axios.get(url)
        .then(response => {
            const section = document.querySelector('[data-modal-delete]');
            section.innerHTML = response.data.html;
            section.querySelectorAll('[data-close]').forEach(button => {
                button.addEventListener('click', _ => {
                    section.innerHTML = '';
                });
            });
            const destroy = section.querySelector('[data-destroy]');
            destroy.addEventListener('click', _ => {
                const url = destroy.dataset.url;
                destroyFromList(url);
                section.innerHTML = '';
            });

        })
        .catch(error => {
            console.error(error);
        });
}

const addEventsToList = _ => {
    const list = document.querySelector('[data-list]');
    const buttons = list.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('click', _ => {
            const url = button.dataset.url;
            const action = button.dataset.action;
            if (action === 'delete') {
                deleteFromList(url);
            } else if (action === 'edit') {
                editFromList(url);
            } else if (action === 'show') {
                showFromList(url);
            } else {
                console.error('Action not found');
            }
        });
    });
}

const getList = _ => {
    const list = document.querySelector('[data-list]');
    const url = list.dataset.url;
    axios.get(url)
        .then(response => {
            list.innerHTML = response.data.html;
            addEventsToList();
        })
        .catch(error => {
            console.error(error);
        });
}


if (document.querySelector('[data-create-form]')) {
    const createForm = document.querySelector('[data-create-form]');
    const url = createForm.dataset.url;
    const button = createForm.querySelector('button');
    const inputs = createForm.querySelectorAll('input');

    button.addEventListener('click', _ => {
        const data = {};
        inputs.forEach(input => {
            data[input.name] = input.value;
        });
        axios.post(url, data)
            .then(response => {
                console.log(response.data);
                clearForm(createForm);
                getList();
            })
            .catch(error => {
                console.error(error);
            });


    });


    if (document.querySelector('[data-list]')) {
        getList();
    }





}