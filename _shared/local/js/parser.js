if (window.ajaxCallback === undefined) {
    window.ajaxCallback = []
}

window.ajaxCallback.afterParserRun = function (data, btn) {
    if(data.status == 'success') {
        const title =  document.querySelector('.js-parser__title')

        const formData = new FormData();
        title.innerHTML = 'Чтение разделов'

        const progressBar =  document.querySelector('.js-progress-bar')
        const progressBarInfo = document.querySelector('.js-progress-info')
        const pauseBtn = document.querySelector('.js-pause-btn')

        if(data.count == data.total && data.page == data.last_page) {
            title.innerHTML = 'Импорт товаров'
            formData.append('action', 'Parser/continue')
            formData.append('ajaxCallback', 'afterParserContinue')
        } else {
            for (let attr in data.INPUT) {
                if(attr == 'begin') {
                    continue
                }
                if(attr === 'action' || attr === 'ajaxCallback') {
                    formData.append(attr, data.INPUT[attr])
                }
            }
            if(Number(data.page) < Number(data.last_page)) {
                formData.append('page', Number(data.page) + 1)
                formData.append('count', data.count)
                formData.append('last_page', data.last_page)
            } else {
                formData.append('page', 1)
                formData.append('count', Number(data.count) + 1)
            }

            title.innerHTML = 'Чтение разделов'
        }

        progressBar.style.width = `${data.percent}%`
        progressBarInfo.innerText = `${data.count}/${data.total} - ${data.page}/${data.last_page} (${data.percent}%)`

        if(pauseBtn.classList.contains('stopped')) {
            window.metakomParserData = formData
            pauseBtn.textContent = 'Возобновить'
        } else {
            sendAjax(formData).then((result) => {})
        }
    }
}

window.ajaxCallback.afterParserContinue = function (data, btn) {
    if(data.status == 'success') {
        const progressBar =  document.querySelector('.js-progress-bar')
        const progressBarInfo = document.querySelector('.js-progress-info')
        const pauseBtn = document.querySelector('.js-pause-btn')
        const title =  document.querySelector('.js-parser__title')

        const formData = new FormData();
        formData.append('action', 'Parser/continue')
        formData.append('ajaxCallback', 'afterParserContinue')
        title.innerHTML = 'Импорт товаров'
        progressBar.style.width = `${data.percent}%`
        progressBarInfo.innerText = `${data.count}/${data.total} (${data.percent}%)`

        if(pauseBtn.classList.contains('stopped')) {
            window.metakomParserData = formData
            pauseBtn.textContent = 'Возобновить'
        } else {
            if(Number(data.count) < Number(data.total)) {
                sendAjax(formData).then((result) => {})
            } else {
                title.innerHTML = 'Импорт завершен'
            }
        }
    }
}

function startImportProducts() {
    const title =  document.querySelector('.js-parser__title')
    title.innerHTML = 'Импорт товаров'
    disableParserActions()
}

function startScanSections() {
    const title =  document.querySelector('.js-parser__title')
    title.innerHTML = 'Сканирование разделов'
    disableParserActions()
}

function toggleParsePause(btn) {
    btn.classList.toggle('stopped')
    if(btn.classList.contains('stopped')) {
        btn.textContent = 'Ждите ...'
    } else {
        btn.textContent = 'Приостановить'
        const formData = window.metakomParserData
        sendAjax(formData).then((result) => {})
    }
}

function disableParserActions() {
    const actionsBtn = document.querySelectorAll('.js-parser-actions .js-ajax-link')
    actionsBtn.forEach((btn) => {
        btn.disabled = true
    })

}


