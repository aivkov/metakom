if (window.ajaxCallback === undefined) {
    window.ajaxCallback = []
}

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu()
    initHeaderMenu()
    initToTop()
    initLocation()
    initMasks()
    initAjaxForms()
    initFormsPolicy()
    initDadata()
})

function initMobileMenu() {
    document.querySelector('.js-toggle-menu').addEventListener('click', () => {
        document.querySelector('.js-header-menu').classList.toggle('opened')
    })
}

function initHeaderMenu() {
    document.addEventListener('click', (e) => {
        const openedMenu = document.querySelectorAll('.js-parent-menu.opened')
        if(openedMenu.length) {
            const parentMenu = e.target.closest('.js-parent-menu')
            openedMenu.forEach((submenu) => {
                if(submenu !== parentMenu) {
                    submenu.classList.remove('opened')
                }

            })

            if(!!parentMenu) {
                parentMenu.classList.toggle('opened')
            } else {
                openedMenu.forEach((submenu) => {
                    submenu.classList.remove('opened')
                })
            }
        }
        else if(e.target.closest('.js-parent-menu')) {
            e.target.closest('.js-parent-menu').classList.add('opened')
        }
    })
}


function initToTop() {
    const btn = document.querySelector('.js-to-top')
    window.addEventListener('scroll', function () {
        if (btn !== null) {
            const offset = window.pageYOffset
            const className = 'is-active'
            if (offset > 500) {
                btn.classList.add(className)
            } else {
                btn.classList.remove(className)
            }
        }
    });

    if (btn !== null) {
        btn.addEventListener('click', () => {
            document.documentElement.scrollTop = 0;
        })
    }
}

function initLocation() {
    const activeClass = 'is-active'
    document.querySelector('.js-location').addEventListener('click', (e) => {
        e.currentTarget.classList.toggle(activeClass)
    })

    document.querySelectorAll('.js-location-city-select').forEach((city) => {
        city.addEventListener('click', () => {
            const id = city.dataset.id
            const phone = city.dataset.phone
            const email = city.dataset.email
            const schedule = city.dataset.schedule
            const map = city.dataset.map
            const cityName = city.innerText

            const hiddenLocation = document.querySelector('.js-location-city-select.none')
            hiddenLocation.classList.remove('none')
            city.classList.add('none')

            document.querySelectorAll('.js-location-city').forEach((cityField) => {
                cityField.innerText = cityName
            })

            document.querySelectorAll('.js-location-phone').forEach((phoneField) => {
                phoneField.innerText = phone
            })

            document.querySelectorAll('.js-location-email').forEach((emailField) => {
                emailField.innerText = email
            })

            document.querySelectorAll('.js-location-schedule').forEach((scheduleField) => {
                console.log(schedule)
                console.log(schedule.replace('#', '<br>'))

                scheduleField.innerHTML = schedule.replace(/#/g, '<br>')
            })

            document.querySelectorAll('.js-location-map').forEach((mapField) => {
                mapField.src = map
            })

            const cityList = document.querySelector('.js-city-list')
            if (!!cityList) {
                const cityItems = cityList.querySelectorAll('.js-city-item')
                cityItems.forEach((cityItem) => {
                    cityItem.classList.remove(activeClass)
                })

                const activeCityItem = cityList.querySelector(`.js-city-item[data-id="${id}"]`)
                if (!!activeCityItem) {
                    activeCityItem.classList.add(activeClass)
                }
            }
        })
    })

    const mapCityList = document.querySelector('.js-city-list')
    if (!!mapCityList) {
        const mapCityItems = mapCityList.querySelectorAll('.js-city-item')

        mapCityItems.forEach((mapCityItem) => {
            mapCityItem.addEventListener('click', () => {
                const cityId = mapCityItem.dataset.id
                if (!!cityId) {
                    const locationCity = document.querySelector(`.js-location-city-select[data-id="${cityId}"]`)
                    if (!!locationCity) {
                        const event = new MouseEvent("click", {cancelable: true})
                        locationCity.dispatchEvent(event)
                    }
                }
            })
        })
    }
}

function initMasks() {
    const initClass = 'initialized-mask'
    const maskFields = document.querySelectorAll(`[data-mask]:not(.${initClass})`)

    maskFields.forEach((el) => {
        el.classList.add(initClass)
        const type = el.dataset.mask
        let params
        switch (type) {
            case 'phone':
                params = {
                    mask: '+{7} (000) 000-00-00'
                }
                break
        }
        if (params !== undefined) {
            IMask(el, params)
        }
    })
}

const sendAjax = async function (formData, container = null) {
    const url = '/ajax/'
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
            window.ajaxCallback[cb](container, result)
        }
        return result
    }
}

function initAjaxForms() {
    initFormErrorFields()
    const initClass = 'initialized'
    const forms = document.querySelectorAll(`.js-ajax-form:not(.${initClass})`)
    for (let key in forms) {
        if (typeof (forms[key]) == 'object') {
            const form = forms[key]
            form.addEventListener('submit', function (e) {
                e.preventDefault()
                let formData = new FormData(form)
                const errorField = form.querySelector('.js-form-error')

                if (!!errorField) {
                    errorField.innerHTML = ''
                    errorField.classList.remove('is-active')
                }
                if (validateForm(form)) {
                    showFormLoader(form)
                    sendAjax(formData, form).then((result) => {
                    })
                }

            })
            form.classList.add(initClass)
        }
    }
}

function initFormErrorFields() {
    document.querySelectorAll('.js-ajax-form .input-block__input').forEach((inputField) => {
        inputField.addEventListener('input', (e) => {
            const inputBlock = inputField.closest('.input-block')
            if (inputBlock.classList.contains('error')) {
                const form = inputField.closest('form')
                inputBlock.classList.remove('error')
                hideFormError(form)
            }
        })
    })
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

    if (errors.length) {
        let errorStr = errors.join('<br>')
        showFormError(form, {message: errorStr})
    }

    return send;
}


window.ajaxCallback.afterFormSend = function (form, data) {
    hideFormLoader(form)
    if (data.status == 'success') {
        form.reset()
        window.modal.open('success')
        document.querySelector('.js-modal-success-message').innerText = data.message
        const modal = form.closest('[data-modal]')
        if (!!modal) {
            const modalId = modal.dataset.modal;
            window.modal.close(modalId)
        }
    } else if (data.status == 'error') {
        showFormError(form, data)
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

function showFormError(form, data) {
    const errorField = form.querySelector('.js-form-error')
    if (!!errorField) {
        errorField.innerHTML = data.message
        errorField.classList.add('is-active')
    }
}

function hideFormError(form) {
    const errorField = form.querySelector('.js-form-error')
    if (!!errorField) {
        errorField.innerHTML = ''
        errorField.classList.remove('is-active')
    }
}

function showFormSuccess(form, data) {
    const errorField = form.querySelector('.js-form-success')
    if (!!errorField) {
        errorField.innerHTML = data.message
        errorField.classList.add('is-active')
    }
}

function initFormsPolicy() {
    const policyCheckboxes = document.querySelectorAll('[data-input-policy]')
    for (let key in policyCheckboxes) {
        if (typeof (policyCheckboxes[key]) == 'object') {
            let btn = policyCheckboxes[key];
            btn.addEventListener('change', function (e) {
                let form = e.target.closest('form');
                let submitBtn = form.querySelector('[type=submit]')
                if (submitBtn !== null) {
                    if (e.target.checked) {
                        submitBtn.disabled = false;
                    } else {
                        submitBtn.disabled = true;
                    }
                }
            })
        }
    }
}

function initDadata() {
    (new Dadata).init()
}


class Modal {
    constructor() {
        this.body = document.querySelector('body');
        this.activeClass = 'is-active';
        this.scrollLocckedClass = 'scroll-locked';
    }

    init() {
        document.addEventListener('click', (e) => {
            const modalCloseBtn = e.target.closest('[data-modal-close]')
            const modalOpenBtn = e.target.closest('[data-modal-open]')

            if (!!modalCloseBtn) {
                const modalId = modalCloseBtn.dataset.modalClose
                this.close(modalId)
            }

            if (!!modalOpenBtn) {
                e.preventDefault()
                this.open(modalOpenBtn.dataset.modalOpen)
            }
        })
    }

    isModalOpened(id) {
        const checkModal = document.querySelector(`[data-modal="${id}"].is-active`)
        if (!!checkModal) {
            return true
        }
        return false
    }

    open(id) {
        const modal = document.querySelector(`[data-modal=${id}]`)
        modal.classList.add(this.activeClass);
        //this.body.classList.add(this.scrollLocckedClass);
    }

    close(id) {
        if (id) {
            const modal = document.querySelector(`[data-modal=${id}]`)
            modal.classList.remove(this.activeClass);
            //this.body.classList.remove(this.scrollLocckedClass);
        }
    }

    remove(id) {
        if (id) {
            const modal = document.querySelector(`[data-modal=${id}]`)
            modal.remove();
            //this.body.classList.remove(this.scrollLocckedClass);
        }
    }
}

window.modal = new Modal();
window.modal.init()