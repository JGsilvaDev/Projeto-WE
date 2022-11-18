var hidden = true
var iconHidden = !hidden
const frame = document.getElementById('bot-frame')
const icon = document.getElementById('icon-show')
const title = document.getElementById('bot-titulo')

//esconde e mostra
function hideshow() {
    hidden = !hidden
    iconHidden = !iconHidden
    hideshowFunc(hidden)
    return hidden
}
function hideshowFunc() {
    if(!hidden) {
        frame.style.display = 'block'
        title.style.display = 'block'
    }
    else {
        frame.style.display = 'none'
        title.style.display = 'none'
    }

    if(iconHidden) {
        icon.style.display = 'none'
    }
    else {
        icon.style.display = 'block'
    }
}

//inicialização
hideshowFunc(hidden)