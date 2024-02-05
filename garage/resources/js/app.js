import axios from 'axios';
import './bootstrap';


console.log('Hello! I am app.js.');

const clearForm = form => {
    form.querySelectorAll('input').forEach(input => {
        input.value = '';
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
            })
            .catch(error => {
                console.error(error);
            });


    });



    

}