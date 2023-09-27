import * as index from './utils.js';


index.navToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        index.navigation.classList.toggle('show')
    })
})

index.form.addEventListener('submit', (e) => {
    e.preventDefault()
})

index.shortenBtn.addEventListener('click', () => {

    let errors = index.checkUrl(index.urlInput, index.errorMessage)
    if (!errors) index.sendRequest(index.urlInput.value)

})





