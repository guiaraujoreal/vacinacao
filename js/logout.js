function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "functions/funcoes.php", true);
    xhr.send();
    window.location = "index.php";
}