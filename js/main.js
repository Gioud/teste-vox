const nome = document.querySelector("#name")
const email = document.querySelector("#email")
const senha = document.querySelector("#password")
const button = document.querySelector("#form")

function validaSenha(senhaValor){
    const numCaracteres = senhaValor.length
   
}

button.addEventListener('submit', function(e) {
    e.preventDefault()
    const nomeValor = nome.value
    const emailValor = email.value
    const senhaValor = senha.value

    if(nomeValor == '' || emailValor == '' || senhaValor == '') {
        document.getElementById('mensagem').textContent = 'Todos os campos são obrigatórios.'
        return 
    }
   
    if (numCaracteres < 8){
        document.getElementById('mensagem').textContent = 'A senha precisa de 8 caractéres'
        return 
    }
   
})