const nome = document.querySelector("#name")
const email = document.querySelector("#email")
const senha = document.querySelector("#password")
const form = document.querySelector("#form")

form.addEventListener('submit', function(e) {
    e.preventDefault()
    const nomeValor = nome.value
    const emailValor = email.value
    const senhaValor = senha.value

    if(nomeValor === '' || emailValor === '' || senhaValor === '') {
        document.getElementById('mensagem').textContent = 'Todos os campos são obrigatórios.'
        return
    }

    if (senhaValor.length < 8){
        document.getElementById('mensagem').textContent = 'A senha precisa de 8 caractéres'
        return
    }

    form.submit();
})