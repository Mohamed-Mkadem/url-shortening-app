const navigation = document.getElementById('navigation')
const navToggles = document.querySelectorAll('.nav-toggle')


navToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        navigation.classList.toggle('show')

    })
})