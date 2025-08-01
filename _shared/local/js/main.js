document.addEventListener('DOMContentLoaded', () => {
    initToggleActive()
})

function initToggleActive() {
    document.querySelectorAll('.js-popup').forEach((link) => {
        link.addEventListener('click', (e) => {
            const children = link.querySelector('.js-popup-children')
            if(e.target.closest('.js-popup-children') !== children) {
                e.preventDefault();
                link.classList.toggle('is-active')
            }
        })
    })

    document.addEventListener('click', (e) => {

        const openedToggle = document.querySelectorAll('.js-popup.is-active')
        if(openedToggle.length) {
            openedToggle.forEach((item) => {
                 if(e.target.closest('.js-popup.is-active') !== item) {
                     item.classList.remove('is-active')
                 }
            })
        }
    })
}