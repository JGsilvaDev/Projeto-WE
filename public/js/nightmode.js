
//SE FOR A PRIMEIRA VEZ RODANDO, DESCOMENTE ESSA LINHA, EXECUTE O CÓDIGO, E DEPOIS COMENTE NOVAMENTE
//document.cookie = "modoEscuro = false"

window.addEventListener('load',() => {
    console.log(getCookie('modoEscuro'))
})
//#region cores
    //cores
    //variáveis originais
    var fundo_cinza= '#F3F3F3'
    var fundo_preto= '#018390'
    var btn_color= '#018390'
    var btn_color_hover= '#F3F3F3'
    var btn_text= '#F3F3F3'
    var btn_text_hover= '#018390'
    var ciano= '#27FBB8'
    var button_box= '#F3F3F3'
    var button_box_border= '#018390'
    var button_box_hover= '#018390'
    var button_box_text= '#333333'
    var button_box_text_hover= '#F3F3F3'
    var proj_text= '#00353A'
    //imagens

    //cores claro
    var branco = '#F3F3F3'
    var azul = '#018390'
    var cianoC = '#27FBB8'
    //cores escuro
    var preto = '#1C1C1C'
    var cinza = '#333333'
    var laranja = '#FA8F23'

    //alternando
    
    // root.style.setProperty('--fundo-preto','red')
    
    var colorLabel = [
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
    var colorNight = [cinza, preto, azul, azul, branco, branco, azul, cinza, branco, branco, branco,preto,branco]
    var colorLight = [branco, azul, azul, branco, branco, azul, cianoC, branco, azul, azul, azul, branco, azul]
        //#endregion 
        
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
    
    
    alternateNightMode()
    
    function nmSwitch() {
        if(getCookie('modoEscuro') === 'false')
        {
            document.cookie = 'modoEscuro=true'
        }
        else if(getCookie('modoEscuro') === 'true')
        {
            document.cookie = 'modoEscuro=false'
        }
        alternateNightMode()
    }

function alternateNightMode() {
    let root = document.querySelector(':root')
    let gcs = getComputedStyle(root)
    
    if(getCookie('modoEscuro') === 'true') {
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
    else if (getCookie('modoEscuro') === 'false'){
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
        } catch {
        }
    }
}