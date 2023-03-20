const urlParams = new URLSearchParams(window.location.search);
const login = urlParams.get('login');

if(login === 'incorreto') {
    document.getElementById('notificacao').style.display = 'block';
}
