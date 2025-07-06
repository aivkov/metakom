document.addEventListener('DOMContentLoaded', () => {
    initToggleActive()
})

console.log(111)
function initToggleActive() {
    document.querySelectorAll('.js-toggle-active').forEach((link) => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            link.classList.toggle('is-active')
        })
    })
}