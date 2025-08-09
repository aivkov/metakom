class Dadata {
    initClass = 'initialized-dadata'
    activeClass = 'is-active'
    timeout = 300
    timer = null
    type = null
    tab = null
    input = null
    inputBlock = null
    dropdown = null
    dropdownList = null
    query = ''

    init() {
        const dadataFields = document.querySelectorAll(`[data-dadata]:not(.${this.initClass})`)
        dadataFields.forEach((input) => {
            input.addEventListener('keyup', (e) => {
                this.input = input
                this.inputBlock = this.input.closest('.input-block')
                this.dropdown = this.inputBlock.querySelector('.js-dadata-dropdown')
                this.dropdownList = this.inputBlock.querySelector('.js-dadata-dropdown-list')

                clearTimeout(this.timer)
                this.timer = setTimeout(() => {
                   // this.clearFields()
                    this.load()
                }, this.timeout)
            })

            input.addEventListener('focus', (e) => {
                this.changeFocus(input)
            })

            input.addEventListener('blur', (e) => {
                this.changeFocus(input)
            })

            input.classList.add(this.initClass)
        })

    }

    changeFocus(input) {
        const inputBlock = input.closest('.input-block')
        this.dropdown = inputBlock.querySelector('.js-dadata-dropdown')

        if (input === document.activeElement) {
            if (this.dropdown.querySelectorAll('.js-data-dropdown-item').length) {
                this.show()
            }
        } else {
            setTimeout(() => {
                this.hide()
            }, 300)
        }
    }

    clearFields() {
        const type = this.input.dataset.dadata
        const parent = type == "address" ? this.input.closest('.js-block-address') : this.tab

        if (type == 'address') {
            parent.querySelectorAll('[data-dadata-field]:not([data-dadata])').forEach((input) => {
                input.value = ''
            })
        } else {
            parent.querySelectorAll(`[data-dadata-type="${type}"]`).forEach((input) => {
                input.value = ''
            })
        }
    }

    load() {
        this.query = this.input.value
        this.type = this.input.dataset.dadata
        if (this.query) {
            var formData = new FormData()
            formData.append('action', 'Dadata/get')
            formData.append('type', this.type);
            formData.append('query', this.query);

            sendAjax(formData).then(result => {
                this.add(result)
                this.show()
            })
        } else {
            this.hide()
        }
    }

    add(result) {
        console.log(result)
        this.clearResult()
        if (!result.suggestions.length) {
            this.addEmptyMessage()
            return
        }
        result.suggestions.forEach((item) => {
            this.addAddress(item)
        })
    }

    addEmptyMessage() {
        let el = this.createRow('Ничего не найдено')
        el.classList.add('empty')
        this.appendRow(el)
    }

    clearResult() {
        this.dropdownList.innerHTML = ''
    }

    selectItem(el, isAddress = false) {
        let input
        let parent = el.closest('form')
        for (let key in el.dataset) {
            this.getDataAttr(key)
            input = parent.querySelector(`[data-dadata="${this.getDataAttr(key)}"]`)
            if (!!input) {
                let value = el.dataset[key]
                if (value == 'undefined' || value == 'null') {
                    value = ''
                }
                input.value = value
            }
        }

        this.hide()
    }

    getDataAttr(key) {
        let attr = key.replace(/([A-Z])/g, '-$1')
        return attr.toLowerCase()
    }


    addAddress(item) {
        let text = item.value
        const zip = item.data.postal_code
        if (!!zip) {
            text = `${zip}, ${text}`
        }
        let el = this.createRow(text)
        el.setAttribute('data-address', text)


        el.addEventListener('click', (e) => {
            this.selectItem(el, true)
        })
        this.appendRow(el)
    }

    createRow(text) {
        let el = document.createElement('div')
        el.innerHTML = text
        el.classList.add('input-block__dropdown-item', 'js-data-dropdown-item')
        return el
    }

    appendRow(el) {
        this.dropdownList.append(el)
    }

    show() {
        this.dropdown.classList.add(this.activeClass)
    }

    hide() {
        this.dropdown.classList.remove(this.activeClass)
    }
}
