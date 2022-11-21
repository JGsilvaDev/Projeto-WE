const cookies = document.getElementById('cookies-container')

function Destroy(elemento) {
  elemento.style.display = 'none'
}

function GetCookies() {
  console.log("Cookies foram coletados")
}

function GetAnalytics() {
  console.log("Analytics foram coletados")
}

function Recusar() {
  console.log("Cookies foram recusados... encerrando códgio")
  Destroy(cookies)
}

function Aceitar() {
  console.log("Cookies aceitos... coletando")
  GetCookies()
  GetAnalytics()
  Destroy(cookies)
}

