if (window.ajaxCallback === undefined) {
    window.ajaxCallback = []
}

const sendAjax = async function (formData, container = null) {
    const url = '/local/ajax/'
    let response = await fetch(url, {
        method: `POST`,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },

        body: formData
    })

    const cb = formData.get('ajax-callback')
    if (response.status === 200) {
        let result = await response.json()

        if (typeof (window.ajaxCallback[cb]) == 'function') {
            window.ajaxCallback[cb](result, container)
        }
        return result
    }
}

function initAjaxForms() {
    const initClass = 'initialized'
    const forms = document.querySelectorAll(`.js-ajax-form:not(.${initClass})`)
    for (let key in forms) {
        if (typeof (forms[key]) == 'object') {
            const form = forms[key]
            form.addEventListener('submit', function (e) {
                e.preventDefault()
                let formData = new FormData(form)
                const errorField = form.querySelector('.js-form-error')

                if(!!errorField) {
                    errorField.innerHTML = ''
                    errorField.classList.remove('is-active')
                }
                showFormLoader(form)
                sendAjax(formData, form).then((result) => {})
            })
            form.classList.add(initClass)
        }
    }
}

function afterAjax() {
    initTabs()
    initAjaxForms()
    initSpoilers()
    validateFields()
    initMasks()
    initDatepickers()
    initDadata()
    initPolicy()
    initRefreshCaptcha()
    initCalendar()
}

window.ajaxCallback.afterSendMainForm = function (data, form) {
    hideFormLoader(form)
    if (data.status == 'success') {
        const modal = form.closest('.modal')
        const modalId = modal.dataset.modal
        window.modal.remove(modalId)
        window.modal.open('success')
    } else if (data.status == 'error') {
        const errorField = form.querySelector('.js-form-error')
        errorField.innerHTML = data.message
        errorField.classList.add('is-active')
    }
}

window.ajaxCallback.afterInitCalendar = function (data, calendar) {
    let courses = data.courses
    calendar.innerHTML = (new Calendar(courses)).getHtml()
    initTabs()

    calendar.querySelectorAll('.js-select-interval').forEach((activeDate) => {
        activeDate.addEventListener('click', (e) => {
            if (window.modal.isModalOpened('form-fiz') || window.modal.isModalOpened('form-ur')) {
                selectInterval(e.target)
            }
        })
    })
}



const ajaxForms = document.querySelectorAll('.ajax-form')

for (let key in ajaxForms) {
    if (typeof (ajaxForms[key]) == 'object') {
        ajaxForms[key].addEventListener('submit', function (e) {
            e.preventDefault();
            sendForm(ajaxForms[key])
        })
    }
}

function sendForm(form) {
    if (validateForm(form) === 0) {
        return false;
    }
    const submitBtns = form.querySelectorAll('[type=submit]')
    showLoader(submitBtns);
    hideFormError(form)
    let url = form.dataset.url
    if (url) {
        let formData = new FormData(form);

        sendAjax(url, formData).then((result) => {
            hideLoader(submitBtns);
            if (result.status == 'success') {
                form.reset();
                const modalContainer = form.closest('[data-modal]');
                if (modalContainer !== null) {
                    let modalId = modalContainer.dataset.modal;
                    modal.close(modalId);
                }
                modal.open('success');
            } else if (result.status == 'error') {
                showFormError(form, result.message)
            }
        });
    }
}

function validateForm(form) {

    let errorsFields = form.querySelectorAll('.error')
    if (errorsFields.length) {
        errorsFields.forEach(errorField => {
            errorField.classList.remove('error')
        })
    }

    var send = 1;

    var errors = []
    let requiredFields = form.querySelectorAll('[data-required]');
    if (requiredFields.length) {
        requiredFields.forEach(requiredField => {
            if (requiredField.value === "") {
                requiredField.closest('.input-block').classList.add('error')
                send = 0;
                let errorMessage = 'Заполните все обязательные поля'
                if (!errors.includes(errorMessage)) {
                    errors.push(errorMessage)
                }
            }
        })
    }

    let emailFields = form.querySelectorAll('[data-input-email]')
    if (emailFields.length) {
        emailFields.forEach(emailField => {
            if (!validateEmail(emailField.value)) {
                emailField.closest('.input-block').classList.add('error')
                send = 0;

                let errorMessage = 'Некорректно заполнено поле «Email»'
                if (!errors.includes(errorMessage)) {
                    errors.push(errorMessage)
                }
            }
        })
    }

    let phoneFields = form.querySelectorAll('[data-input-phone]')
    if (phoneFields.length) {
        phoneFields.forEach(phoneField => {
            if (!validatePhone(phoneField.value)) {
                phoneField.closest('.input-block').classList.add('error')
                send = 0;

                let errorMessage = 'Некорректно заполнено поле «Телефон»'
                if (!errors.includes(errorMessage)) {
                    errors.push(errorMessage)
                }
            }
        })
    }

    if (errors.length) {
        showFormError(form, errors.join('<br>'))
    }

    return send;
}

function validateEmail(email) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (email && reg.test(email) == false) {
        return false;
    }
    return true;
}

function validatePhone(phone) {
    if (phone.length == 17 || phone.length == 0) {
        return true
    }
    return false
}

const inputsFields = document.querySelectorAll('.ajax-form .input-block input')

for (let key in inputsFields) {
    if (typeof (inputsFields[key]) == 'object') {
        inputsFields[key].addEventListener('click', function (e) {
            removeFieldError(e.target)
        })
    }
}

function removeFieldError(el) {
    const errorField = el.closest('.input-block.error')
    if (typeof (errorField) == 'object' && errorField !== null) {
        errorField.classList.remove('error')
        const form = el.closest('form')
        hideFormError(form)
    }
}

function showFormError(form, message) {
    const errorField = form.querySelector('[data-form-error]')
    if (errorField !== null) {
        errorField.innerHTML = message;
        errorField.classList.add('is-active')
    }
}

function hideFormError(form) {
    if (form !== null) {
        let errorField = form.querySelector('[data-form-error]')
        if (errorField !== null) {
            errorField.innerHTML = '';
            errorField.classList.remove('is-active')
        }
    }
}

function showLoader(collection) {
    for (let key in collection) {
        if (typeof (collection[key]) == 'object') {
            collection[key].classList.add('is-loading')
        }
    }
}

function hideLoader(collection) {
    for (let key in collection) {
        if (typeof (collection[key]) == 'object') {
            collection[key].classList.remove('is-loading')
        }
    }
}

function showFormLoader(form) {
    form.classList.add('is-loading')
    form.querySelector('[type=submit]').disabled = true
}

function hideFormLoader(form) {
    form.classList.remove('is-loading')
    form.querySelector('[type=submit]').disabled = false
}
