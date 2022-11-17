

    const input = document.getElementById('msg-input')
    const chatFrame = document.getElementById('chat')
    var scrollID = 0
    const botclass = 'bot-msg'
    const userclass = 'user-msg'
    //strings
    var submitText = ""
    var nome = ""
    var email = ""

    const botDicionario = {'ola':'oi', 'como vai?':'nao vou, sou um robô, bip bop', 'quem é voce?':'não sou ninguém, porém, sou todo o mundo', 'ajuda':'Confira lista de opções'}
    const opcoes = ['Pacotes', 'Agendar um horário', 'Problemas ou dificuldades', 'Assinar ou contratar um serviço', 'Reunião online', 'Atendimento online','Qual é o melhor time?']
    const keys = Object.keys(botDicionario)
    const botKeys = opcoes.concat(keys)
    console.log(botKeys)
    console.log('keys: '+botKeys)

    //#region funcoes HTML

        function CriarDiv(texto, classe, id) {
            //criando a div
            var div = document.createElement('div')
            var pgr = document.createElement('p')

            //atribuindo um texto no innerHTML
            pgr.innerHTML = texto

            //atribuindo a classe
            div.setAttribute('class', classe)
            pgr.setAttribute('class', classe+'_p')
            div.setAttribute('id', id)
            div.append(pgr)
            return div
        }
        function EnterKey(e) {
            if(e && e.keyCode == 13) { //realiza função ao apertar enter
                Listen()
                input.value = ""
                Responder()
            }
        }
        function Listen() {
            submitText = input.value
            EnviarMensagem(submitText, userclass)
            
        }
        //função de delay
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms))
        }
        function clicked(event) {
            var id = event.target.id //pega o id do elemento
            var eventElement = document.getElementById(id).innerHTML
            EnviarMensagem(eventElement, userclass)
            Responder()
        }
    //#endregion

    //#region ======funcoes de controle do bot======
        //envia mensagem, criando um P com os ids e classes necessários
        function EnviarMensagem(mensagem,classe) {
            submitText = mensagem //transfere para essa variável
            chatFrame.append(CriarDiv(mensagem,classe,'scroll_'+scrollID))
            document.getElementById('scroll_'+scrollID).scrollIntoView()
            scrollID++
        }

        //responde a mensagem, função parecida com a de enviar, porém há pequenas alterações na classe
        async function Responder() {
            var resposta = botDicionario[submitText]

            await sleep(500)

            if (!botKeys.includes(submitText)) {
                EnviarMensagem('não entendi, digite ajuda',botclass)
                return 0;
            }
            await sleep(300)
            switch(submitText) {
                case 'ajuda':
                    ajuda()
                    break;
                case opcoes[0]:
                    await sleep(500)
                    EnviarMensagem('Excelente José! Esses são os pacotes que a empresa possuí atualmente. Eles irão estruturar o seu negócio, e ajudará você a alcançar a identidade desejada. Além disso, também temos nosso serviço de consultoria, que te auxiliará a tomar as melhores decisões. Veja um pouco mais sobre eles',botclass)
                    await sleep(1000)
                    EnviarMensagem('“CRIA PRA MIM”\nCriamos o Material Publicitário (posts para redes sociais, vídeos, flyers, banners, cartão visita, entre outros) ideal para sua empresa!',botclass)
                    
                    await sleep(1000)
                    EnviarMensagem('Pacote de serviço “CLIENTE FIEL/CRIA PRA MIM PLUS”\nAlém de criar o seu material publicitário, este pacote inclui a criação de relatórios com métricas úteis para a sua empresa (gerenciamento de mídia). Assim, você poderá analisar e determinar suas estratégias de marketing com maior embasamento e segurança.', botclass)
                    
                    await sleep(1000)
                    EnviarMensagem('Serviço “MINHA IDENTIDADE”\nRepensamos e remodelamos com você a Identidade Visual da sua empresa (logomarca/logotipo, tipografia, grafismos, cores, valores e princípios a serem transmitidos)', botclass)
                    
                    await sleep(1000)
                    EnviarMensagem('Serviço “ME ENSINA QUE EU FAÇO”\nNosso serviço de consultoria! te auxiliando em questões do marketing digital, sejam elas quais forem.',botclass)
                    
                    await sleep(1000)
                    EnviarMensagem('Palestra “ME LEVA PRO DIGITAL”\nNossa palestra abordando os temas fundamentais do marketing digital, gerenciamento das redes sociais, e as aplicações disso tudo na prática! Sabe o mais legal disso tudo '+nome+'? É você que você pode personalizar o seu pacote de acordo com suas necessidades.',botclass)
                    break;

                case opcoes[1]:
                    alert('página de agendamento')
                    break;
                case opcoes[2]:
                    EnviarMensagem('Estamos quase lá José, informe o problema ou a dificuldade ocorrida que irei te ajudar.', botclass)
                    break;
                case opcoes[3]:
                    alert('Assinar serviço')
                    break;
                case opcoes[4]:
                    alert('redirecionar para página de contato/calendário')
                    break;
                case opcoes[5]:
                    alert('redirecionar para página de contato')
                    break;
                case opcoes[6]:
                    await sleep(100)
                    EnviarMensagem('Obviamente é o grande CORINTHIANS', botclass)
                    break;

                default:
                    EnviarMensagem(resposta,botclass)
                    break;
            }            
    }

        //lista de ajuda
        async function ajuda() {
            var keys = Object.keys(botDicionario)
            for(i=0; i < keys.length; i++) {
                
                //adiciona cada div
                console.log('ID antes de enviar: '+scrollID)
                EnviarMensagem(keys[i],'help-msg')
                console.log('ID depois de enviar: '+scrollID)
                

                document.getElementById('scroll_'+(scrollID-1)).setAttribute('onclick', 'clicked(event)')
                await sleep(50)
            }
        }
    //#endregion

    //#region funcoes de mensagem

    async function askname() {
        await sleep(1000)
        EnviarMensagem('Olá, como vai? Eu sou o assistente virtual da empresa. Estou aqui para te ajudar!',botclass)
        await sleep(1000)
        EnviarMensagem('Como posso te chamar?', botclass)
        await sleep(1000)
        nome = prompt('insira o nome')
        console.log(nome)
        await sleep(1000)
        EnviarMensagem('Ah! É importante te avisar, '+ nome +', que talvez não seja capaz de responder e te ajudar com todas as questões. Nesse caso, irei te direcionar a comunicação para uma pessoa real', botclass)
        await sleep(1000)
        
        return 0
    }

    async function selectOption() {
        await askname()
        EnviarMensagem('Agora, nos diga seu email [A FAZER]', botclass)
        EnviarMensagem('Agora, selecione uma opção para começar', botclass)
        var size = opcoes.length
        for(i=0; i < size; i++) {
            
            //adiciona cada div
            EnviarMensagem(opcoes[i],'help-msg')
            

            document.getElementById('scroll_'+(scrollID-1)).setAttribute('onclick', 'clicked(event)')
            await sleep(500)
        }
        return 0
    }






    //#endregion


    //ROTINA PRINCIPAL DO BOT
    function mainLoop() {
        selectOption()
    }
    //mainLoop()

    /*================= A FAZER =================*/
    /*
        - rotina padrão de mensagem que vem antes de escutar os comandos
        - Fazer o design casar com o visual do site
        - Substituir o botão por um ícone
        - Animação de página abrindo e fechando
    */


