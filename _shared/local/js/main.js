if (window.ajaxCallback === undefined) {
    window.ajaxCallback = []
}

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu()
    initAjaxForms()
    initToggleActive()
    initModals()
    initCheckboxesPolicy()
    initMasks()
    initPhoneMasks()
    initInputsError()
})

function afterAjax() {
    initCheckboxesPolicy()
    initMasks()
}

function initModals() {
    window.modal = new Modal();
    window.modal.init()
}

function initMobileMenu() {
    document.querySelector('.js-toggle-menu').addEventListener('click', () => {
        document.querySelector('.js-header-menu').classList.toggle('opened')
    })
}


function initToggleActive() {
    document.querySelectorAll('.js-popup').forEach((link) => {
        link.addEventListener('click', (e) => {
            const children = link.querySelector('.js-popup-children')
            if (e.target.closest('.js-popup-children') !== children) {
                e.preventDefault();
                link.classList.toggle('is-active')
            }
        })
    })

    document.addEventListener('click', (e) => {

        const openedToggle = document.querySelectorAll('.js-popup.is-active')
        if (openedToggle.length) {
            openedToggle.forEach((item) => {
                if (e.target.closest('.js-popup.is-active') !== item) {
                    item.classList.remove('is-active')
                }
            })
        }
    })
}

const sendAjax = window.sendAjax = async function (formData, container = null) {
    const url = '/local/ajax/'
    let response = await fetch(url, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },

        body: formData
    })

    const cb = formData.get('ajaxCallback')
    if (response.status === 200) {
        if (!!container) {
            hideLoader(container)
        }
        let result = await response.json()
        if (typeof (window.ajaxCallback[cb]) == 'function') {
            window.ajaxCallback[cb](result, container)
        }
        return result
    }
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
            const modalAjaxOpenBtn = e.target.closest('[data-modal-ajax-open]')

            if (!!modalCloseBtn) {
                e.preventDefault()
                const modalId = modalCloseBtn.dataset.modalClose
                this.close(modalId)
            }

            if (!!modalOpenBtn) {
                e.preventDefault()
                this.open(modalOpenBtn.dataset.modalOpen, modalOpenBtn.dataset)
                return
            }

            if (!!modalAjaxOpenBtn) {
                e.preventDefault()
                const modalId = modalAjaxOpenBtn.dataset.modalAjaxOpen
                this.openWithAjax(modalId, modalAjaxOpenBtn.dataset)
                return
            }
        })
    }

    openWithAjax(id, data) {
        if (this.modalExists(id)) {
            this.open(id)
            return
        }

        let formData = new FormData
        formData.append('action', 'LoadBlocks/modal')
        formData.append('modal_id', id)

        for (let attr in data) {
            formData.append(attr, data[attr])
        }

        sendAjax(formData).then((result) => {
            if (result.html) {
                document.body.insertAdjacentHTML('beforeend', result.html)
                this.open(id)
                afterAjax()
            }
        });
    }

    modalExists(id) {
        const checkModal = document.querySelector(`[data-modal="${id}"]`)
        if (!!checkModal) {
            return true
        }
        return false
    }

    isModalOpened(id) {
        const checkModal = document.querySelector(`[data-modal="${id}"].is-active`)
        if (!!checkModal) {
            return true
        }
        return false
    }

    open(id, params) {
        const modal = document.querySelector(`[data-modal=${id}]`)
        if (!!modal) {
            modal.classList.add(this.activeClass);
            document.dispatchEvent(new CustomEvent('open-modal', {detail: {modal: modal, id: id, params: params}}),
            )
        }
    }

    close(id) {
        if (id) {
            const modal = document.querySelector(`[data-modal=${id}]`)

            if (!!modal) {
                if (!!modal.dataset.onClose && modal.dataset.onClose == 'remove') {
                    modal.remove(this.activeClass);
                } else {
                    modal.classList.remove(this.activeClass);
                }
                //this.body.classList.remove(this.scrollLocckedClass);
            }
        }
    }

    closeAll() {
        const modals = document.querySelectorAll(`[data-modal].is-active`)
        modals.forEach((modal) => {
            const modalId = modal.dataset.modal
            if(!!modalId) {
                this.close(modalId)
            }
        })
    }

    remove(id) {
        if (id) {
            const modal = document.querySelector(`[data-modal=${id}]`)
            if (!!modal) {
                modal.remove();
                //this.body.classList.remove(this.scrollLocckedClass);
            }
        }
    }
}

function initCheckboxesPolicy() {
    const checkboxes = document.querySelectorAll('[data-checkbox-policy]:not(.initialized)')
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', (e) => {
            const form = checkbox.closest('.form');
            if (!!form) {
                const submitBtns = form.querySelectorAll('[type=submit]');
                submitBtns.forEach((submitBtn) => {
                    submitBtn.disabled = !checkbox.checked
                })
            }
        })
        checkbox.classList.add('initialized')
    })
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
                    mask: '+{7} (000) 000 - 00 - 00'
                }
                break
            case 'date':
                params = {
                    mask: '00.00.0000'
                }
                break
        }
        if (params !== undefined) {
            IMask(el, params)
        }
    })
}

function initPhoneMasks() {
    document.addEventListener('keyup', (e) => {
        const input = e.target
        if(input.dataset.mask == 'phone') {
            if(input.value == '+7 (8') {
                input.value = ''
            }
        }
    });

    document.addEventListener('paste', (e) => {
        const input = e.target
        if(input.input.dataset.mask == 'phone') {
            e.preventDefault()
            navigator.clipboard.readText()
                .then(text => {
                    if(text.startsWith('8')) {
                        text = text.slice(1)
                    }
                    input.value = text
                    input.blur()
                })
                .catch(err => {

                })
        }
    })
}

function initAjaxForms() {
    document.addEventListener('submit', (e) => {
        const target = e.target
        const form = target.closest('.js-ajax-form')
        if (!!form) {
            e.preventDefault()
            let formData = new FormData(form)
            const errorField = form.querySelector('.js-form-error')

            hideFormError(form)

            if (validate(form)) {
                showLoader(form)
                sendAjax(formData, form).then((result) => {
                })
            }
        }
    })
}

function validate(form) {
    let result = true
    const requiredFields = form.querySelectorAll('[data-required]')
    requiredFields.forEach((requiredField) => {
        if (!requiredField.value) {
            requiredField.classList.add('is-error')
            result = false

            const requiredSelect = requiredField.closest('.js-select')
            if (!!requiredSelect) {
                requiredSelect.classList.add('is-error')
            }
        }

    })
    if (!result) {
        showFormError(form, 'Заполните обязательные поля')
    }
    return result
}

function showFormError(form, message) {
    const errorField = form.querySelector('.js-form-error')
    if (!!errorField) {
        errorField.innerHTML = message
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

function showLoader(el) {
    const loaderClass = 'is-loading'
    if (el.tagName == 'FORM') {
        const submitBtn = el.querySelector('[type=submit]')
        submitBtn.classList.add(loaderClass)
    } else {
        el.classList.add(loaderClass)
    }
}

function hideLoader(el) {
    const loaderClass = 'is-loading'
    if (el.tagName == 'FORM') {
        const submitBtn = el.querySelector('[type=submit]')
        submitBtn.classList.remove(loaderClass)
    } else {
        el.classList.remove(loaderClass)
    }
}

function initInputsError() {
    document.addEventListener(('focusin'), (e) => {
        const input = e.target.closest('input')
        if(!!input) {
            input.classList.remove('is-error')
            const form = input.closest('form')
            if(!!form) {
                hideFormError(form)
            }
        }
    })
}

window.ajaxCallback.afterFormSend = function (data, form) {
    if(data.status == 'success') {
        const modal = new Modal
        modal.closeAll()
        openModalSuccess(data)
        form.reset()
    } else if(data.status == 'success') {
        showFormError(form, data.message)
    }
}

function openModalSuccess(data) {

    let title = data.title
    let message = data.message
    if(!title) {
        title = 'Поздравляем!'
    }
    if(!message) {
        message = 'Ваше сообщение отправлено'
    }
    const modal = document.querySelector('[data-modal="success"]')

    if(!!modal) {
        modal.querySelector('.js-title').innerHTML = title
        modal.querySelector('.js-message').innerHTML = message
        const obModal = new Modal
        obModal.open('success', data)
    }


}


