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

const colorLabel = [
'--fundo-cinza', 
'--fundo-preto', 
'--btn-color', 
'--btn-color-hover', 
'--btn-text', 
'--btn-text-hover', 
'--ciano', 
'--button-box', 
'--button-box-border', 
'--button-box-hover', 
'--button-box-text', 
'--button-box-text-hover', 
'--proj-text']
const colorNight = [cinza, preto, azul, azul, branco, branco, azul, cinza, branco, branco, branco,preto,branco]
const colorLight = [branco, azul, azul, branco, branco, azul, cianoC, branco, azul, azul, azul, branco, azul]


function alternateNightMode() {
    let root = document.querySelector(':root')
    let gcs = getComputedStyle(root)
    
    if(!modoEscuro) {
        //alternando para modo escuro
        //variáveis de cores
        for(i=0; i<colorLabel.length;i++) {
            root.style.setProperty(colorLabel[i],colorNight[i])
        }

        //imagens
        try {
            document.getElementById('svg-alvo').setAttribute('src', '../img/Vector_alvo_night.svg')
            document.getElementById('svg-aquarela').setAttribute('src', '../img/Vector_aquarela_night.svg')
            document.getElementById('svg-megafone').setAttribute('src', '../img/Vector_megafone_night.svg')

            document.querySelector('#projeto').style.backgroundImage = "url('../img/aperto_de_maos_night.png')"
        } catch {
        }
    }
    else if (modoEscuro){
        //alternando para modo claro
        for(i=0; i<colorLabel.length;i++) {
            root.style.setProperty(colorLabel[i],colorLight[i])
        }

        //imagens
        try {
            document.getElementById('svg-alvo').setAttribute('src', '../img/Vector_alvo.svg')
            document.getElementById('svg-aquarela').setAttribute('src', '../img/Vector_aquarela.svg')
            document.getElementById('svg-megafone').setAttribute('src', '../img/Vector_megafone.svg')

            document.querySelector('#projeto').style.backgroundImage = "url('../img/aperto\ de\ mães.png')"
            console.log(document.getElementById('projeto').style.backgroundImage)
            console.log('Erro, imagem não foi puxada\n'+err)
        } catch {
        }
    }

    modoEscuro = !modoEscuro
}



cbutton = document.getElementById('confirm-button')

cbutton.style.fill = '#ffffff'