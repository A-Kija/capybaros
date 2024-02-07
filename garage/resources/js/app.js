import axios from 'axios';
import './bootstrap';

import './photos.js';


console.log('Hello! I am app.js.');

let sortValue;

const resetErrorBorders = form => {
    form.querySelectorAll('input').forEach(input => {
        input.classList.remove('border', 'border-danger');
    });
}

const showOk = message => {
    const section = document.querySelector('[data-ok]');
    const div = document.createElement('div');
    div.textContent = message;
    section.appendChild(div);
    const timerId = setTimeout(_ => {
        section.innerHTML = '';
    }, 5000);
    section.addEventListener('click', _ => {
        section.innerHTML = '';
        clearTimeout(timerId);
    });
}

const showErrors = (errors, where) => {
    const section = document.querySelector('[data-errors]');
    section.innerHTML = '';
    const ul = document.createElement('ul');
    section.appendChild(ul);
    for (let key in errors) {
        const li = document.createElement('li');
        li.textContent = errors[key];
        ul.appendChild(li);
        where.querySelector(`[name="${key}"]`).classList.add('border', 'border-danger');
    }
    const timerId = setTimeout(_ => {
        section.innerHTML = '';
        resetErrorBorders(where);
    }, 5000);
    section.addEventListener('click', _ => {
        section.innerHTML = '';
        resetErrorBorders(where);
        clearTimeout(timerId);
    });
}

const makeLinks = _ => {
    const links = document.querySelectorAll('[data-links] a');
    links.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const url = e.target.href;
            const pageNumber = url.split('=').pop();
            getList(pageNumber);
        });
    });
}

const clearForm = form => {
    form.querySelectorAll('input').forEach(input => {
        input.value = '';
    });
}

const destroyFromList = url => {
    axios.delete(url)
        .then(response => {
            console.log(response.data);
            getList();
            showOk(response.data.message);
        })
        .catch(error => {
            console.error(error);
        });
}

const updateFromList = (url, data, section) => {
    axios.put(url, data)
        .then(response => {
            console.log(response.data);
            getList();
            showOk(response.data.message);
            section.innerHTML = '';
        })
        .catch(error => {
            showErrors(error.response.data.errors, section);
        });
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

const editFromList = url => {
    axios.get(url)
        .then(response => {
            const section = document.querySelector('[data-modal-edit]');
            section.innerHTML = response.data.html;
            section.querySelectorAll('[data-close]').forEach(button => {
                button.addEventListener('click', _ => {
                    section.innerHTML = '';
                });
            });
            section.querySelector('[data-update]').addEventListener('click', e => {
                const url = e.target.dataset.url;
                const data = {};
                section.querySelectorAll('input').forEach(input => {
                    data[input.name] = input.value;
                });
                updateFromList(url, data, section);
            });
        });
}

const showFromList = url => {
    axios.get(url)
        .then(response => {
            const section = document.querySelector('[data-modal-show]');
            section.innerHTML = response.data.html;
            section.querySelectorAll('[data-close]').forEach(button => {
                button.addEventListener('click', _ => {
                    section.innerHTML = '';
                });
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

const getList = (page = 0) => {
    const list = document.querySelector('[data-list]');
    const url = list.dataset.url;

    const sortUrl = sortValue ? `${url}?sort=${sortValue}` : url;

    let pageUrl = sortUrl;

    if (sortValue) {
        if (page) {
            pageUrl = `${sortUrl}&page=${page}`;
        } 
    } else {
        if (page) {
            pageUrl = `${sortUrl}?page=${page}`;
        }
    }

    axios.get(pageUrl)
        .then(response => {
            list.innerHTML = response.data.html;
            addEventsToList();
            makeLinks();
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
                clearForm(createForm);
                showOk(response.data.message);
                getList();
            })
            .catch(error => {
                showErrors(error.response.data.errors, createForm);
            });
    });


    if (document.querySelector('[data-list]')) {
        getList();
    }

    if (document.querySelector('[data-sort-select]')) {
        const select = document.querySelector('[data-sort-select]');
        select.addEventListener('change', e => {
            sortValue = e.target.value;
            getList();
        });
    }






}