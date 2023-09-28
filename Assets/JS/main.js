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
    if (!errors) {
        index.sendRequest(index.urlInput.value)
        index.shortenBtn.setAttribute('disabled', true)
    }
})

index.shortenNewBtn.addEventListener('click', () => {
    index.shortenAnother()
    index.shortenBtn.removeAttribute('disabled')
})

index.copyBtn.addEventListener('click', () => {
    index.copyUrl(index.shortenedLinkInput)
})

