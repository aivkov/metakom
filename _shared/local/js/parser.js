if (window.ajaxCallback === undefined) {
    window.ajaxCallback = []
}

window.ajaxCallback.afterParserRun = function (data, btn) {
    if(data.status == 'success') {
        const title =  document.querySelector('.js-parser__title')

        const formData = new FormData();
        title.innerHTML = 'Чтение разделов'
        let percent
        const progressBar =  document.querySelector('.js-progress-bar')
        const progressBarInfo = document.querySelector('.js-progress-info')
        const pauseBtn = document.querySelector('.js-pause-btn')

        if(data.count < data.total) {
            percent = String(Math.round(Number(data.count) / Number(data.total) * 100))
            for (let attr in data.INPUT) {
                if(attr !== 'count') {
                    formData.append(attr, data.INPUT[attr])
                }
            }
            formData.append('count', Number(data.count) + 1)
        } else {
            title.innerHTML = 'Импорт товаров'
            percent = '0'
            formData.append('action', 'Parser/continue')
            formData.append('ajaxCallback', 'afterParserContinue')
        }

        progressBar.style.width = `${percent}%`
        progressBarInfo.innerText = `${data.count}/${data.total} (${percent}%)`

        sendAjax(formData).then((result) => {})
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
            title.innerHTML = 'Импорт приостановлен'
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
    const pauseBtn = document.querySelector('.js-pause-btn')
    title.innerHTML = 'Импорт товаров'
    pauseBtn.classList.remove('stopped')
}