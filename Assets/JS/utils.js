export const navigation = document.getElementById('navigation')
export const navToggles = document.querySelectorAll('.nav-toggle')
export const form = document.getElementById('form')
export const shortenBtn = document.getElementById('shortenBtn')
export const shortenNewBtn = document.getElementById('shortenNewBtn')
export const copyBtn = document.getElementById('copyBtn')
export const shortenedLinkInput = document.getElementById('shortenedValue')
export const urlInput = document.getElementById('url')
export const errorMessage = urlInput.nextElementSibling
export const domain = document.getElementById('domain')
export const alias = document.getElementById('alias')
export const result = document.getElementById('shorten-result')
export const shortenNew = document.getElementById('shorten')
export const shortenErrorMsg = shortenBtn.nextElementSibling
export const visitLink = document.getElementById('visitLink')

export function checkUrl(urlInput, errorMessage) {
    let errors = 0
    let url = urlInput.value
    if (!url || !isValidURL(url)) {
        errorMessage.textContent = 'Please Enter A Valid URL'
        errorMessage.classList.add('show')
        errors = 1
    }
    else {
        errors = 0
        errorMessage.classList.remove('show')
    }
    return errors
}




export function isValidURL(url) {
    let urlPattern = /^(https?:\/\/)?(www\.)?[\w\.-]+\.\w{2,}((\/[^\s]*)*|(\?[^\\s]*)*)$/;
    let regex = new RegExp(urlPattern);
    return regex.test(url.trim());
}



export function sendRequest(url) {
    let request = new XMLHttpRequest()
    request.open('POST', 'shorten.php', true)
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    let encodedUrl = encodeURIComponent(url)
    let data = "url=" + encodedUrl
    request.send(data)
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            if (request.status === 200) {
                data = JSON.parse(request.response)
                if (data.success) {
                    shortenErrorMsg.classList.remove('show')
                    printResult(data.alias)
                    displayResult()
                } else {
                    shortenErrorMsg.textContent = data.error
                    shortenErrorMsg.classList.add('show')
                }
            }
            else {
                shortenErrorMsg.textContent = "An Error Occured! Please Try Later"
                shortenErrorMsg.classList.add('show')
                shortenBtn.removeAttribute('disabled')
            }
        }
    }

}

export function displayResult() {
    shortenNew.style.display = 'none'
    result.style.display = 'block'
}

export function shortenAnother() {
    urlInput.value = ""
    urlInput.removeAttribute('readonly')
    result.style.display = 'none'
    shortenNew.style.display = 'block'
    copyBtn.textContent = 'Copy'
}

export function printResult(alias) {
    shortenedLinkInput.value = fullUrl(alias)
    urlInput.setAttribute('readonly', true)
    visitLink.href = fullUrl(alias)

}

export function fullUrl(alias) {
    return `http://localhost:8000/${alias}`
}

export function copyUrl(url) {
    let text = url.value
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text)
            .then(() => {
                copyBtn.textContent = 'Copied'
            })
            .catch(() => {
                copyBtn.textContent = 'Failed'
            })
    } else {
        copyBtn.textContent = 'Unable To Copy'
    }
}