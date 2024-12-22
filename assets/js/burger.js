let open = document.getElementById('home-burger')
let close = document.getElementById('close-burger')
let menu = document.getElementById('mobilemenu')

open.addEventListener('click', () => {
    menu.style.transition = 'right 700ms ease-in'
    menu.style.right = 0
})

close.addEventListener('click', () => {
    menu.style.transition = 'right 700ms ease-in'
    menu.style.right = '-80%'
})