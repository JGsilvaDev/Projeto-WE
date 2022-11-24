//===== MODO ESCURO FEITO PELO DIGAS, THE JS NINJA ===== //

const log = console.log

//cores
//variáveis originais
const fundo_cinza= '#F3F3F3'
const fundo_preto= '#018390'
const btn_color= '#018390'
const btn_color_hover= '#F3F3F3'
const btn_text= '#F3F3F3'
const btn_text_hover= '#018390'
const ciano= '#27FBB8'
const button_box= '#F3F3F3'
const button_box_border= '#018390'
const button_box_hover= '#018390'
const button_box_text= '#333333'
const button_box_text_hover= '#F3F3F3'
const proj_text= '#00353A'
//imagens

//cores claro
const branco = '#F3F3F3'
const azul = '#018390'
const cianoC = '#27FBB8'
//cores escuro
const preto = '#1C1C1C'
const cinza = '#333333'
const laranja = '#FA8F23'

//alternando
modoEscuro = false

// root.style.setProperty('--fundo-preto','red')

function alternateNightMode() {
    let root = document.querySelector(':root')
    let gcs = getComputedStyle(root)

    // let fundoPreto = gcs.getPropertyValue('--fundo-preto')
    // let fundoCinza = gcs.getPropertyValue('--fundo-cinza')
    // let btnColor = gcs.getPropertyValue('--btn-color')
    // let btnColorHover = gcs.getPropertyValue('--btn-color-hover')
    // let btnText = gcs.getPropertyValue('--btn-text')
    // let btnTextHover = gcs.getPropertyValue('--btn-text-hover')
    // let Ciano = gcs.getPropertyValue('--ciano')
    // let buttonBox = gcs.getPropertyValue('--button-box')
    // let buttonBoxBorder = gcs.getPropertyValue('--button-box-border')
    // let buttonBoxHover = gcs.getPropertyValue('--button-box-hover')
    // let buttonBoxText = gcs.getPropertyValue('--button-box-text')
    // let buttonBoxTextHover = gcs.getPropertyValue('--button-box-text-hover')
    // let projText = gcs.getPropertyValue('--proj-text')

    if(!modoEscuro) {
        //alternando para modo escuro
        root.style.setProperty('--fundo-cinza', cinza)
        root.style.setProperty('--fundo-preto', preto)
        root.style.setProperty('--btn-color', laranja)
        root.style.setProperty('--btn-color-hover', laranja)
        root.style.setProperty('--btn-text', branco)
        root.style.setProperty('--btn-text-hover', branco)
        root.style.setProperty('--ciano', laranja)
        root.style.setProperty('--button-box', cinza)
        root.style.setProperty('--button-box-border', branco)
        root.style.setProperty('--button-box-hover', branco)
        root.style.setProperty('--button-box-text', branco)
        root.style.setProperty('--button-box-text-hover', preto)
        root.style.setProperty('--proj-text',branco)

        document.getElementById('svg-alvo').setAttribute('src', '../img/Vector_alvo_night.svg')
        document.getElementById('svg-aquarela').setAttribute('src', '../img/Vector_aquarela_night.svg')
        document.getElementById('svg-megafone').setAttribute('src', '../img/Vector_megafone_night.svg')

        document.querySelector('#projeto').style.backgroundImage = "url('../img/aperto_de_maos_night.png')"
        console.log(document.getElementById('projeto').style.backgroundImage)
    }
    else if (modoEscuro){
        //alternando para modo claro
        root.style.setProperty('--fundo-cinza', branco)
        root.style.setProperty('--fundo-preto', azul)
        root.style.setProperty('--btn-color', azul)
        root.style.setProperty('--btn-color-hover', branco)
        root.style.setProperty('--btn-text', branco)
        root.style.setProperty('--btn-text-hover', azul)
        root.style.setProperty('--ciano', cianoC)
        root.style.setProperty('--button-box', branco)
        root.style.setProperty('--button-box-border', azul)
        root.style.setProperty('--button-box-hover', azul)
        root.style.setProperty('--button-box-text', azul)
        root.style.setProperty('--button-box-text-hover', branco)
        root.style.setProperty('--proj-text',azul)

        document.getElementById('svg-alvo').setAttribute('src', '../img/Vector_alvo.svg')
        document.getElementById('svg-aquarela').setAttribute('src', '../img/Vector_aquarela.svg')
        document.getElementById('svg-megafone').setAttribute('src', '../img/Vector_megafone.svg')

        document.querySelector('#projeto').style.backgroundImage = "url('../img/aperto_de_maos.png')"
        console.log(document.getElementById('projeto').style.backgroundImage)
    }

    modoEscuro = !modoEscuro
}