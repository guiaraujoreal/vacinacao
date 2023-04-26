function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/php/functions/funcoes.php", true);
    xhr.send();
    window.location = "../pages/php/index.php";
}