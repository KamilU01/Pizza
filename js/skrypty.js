function validateForm() {
    let name = document.forms["formPizza"]["name"].value;
    let description = document.forms["formPizza"]["description"].value;
    let sprice = document.forms["formPizza"]["sprice"].value;
    let mprice = document.forms["formPizza"]["mprice"].value;
    let lprice = document.forms["formPizza"]["lprice"].value;
    let papryczki = document.forms["formPizza"]["papryczki"].value;

    let validationAlert = document.getElementById("validationAlert");

    let errorMsg = "";

    if (validationAlert.style.display = "block") {
        validationAlert.style.display = "none";
        validationAlert.innerHTML = "Wykryto następujące błędy: <br>";
    }

    if (name == "")
        errorMsg += "- brak nazwy pizzy; <br>";

    if (description == "")
        errorMsg += "- brak opisu składników; <br>";

    if (sprice == "")
        errorMsg += "- brak ceny dla małej pizzy; <br>";

    if (mprice == "")
        errorMsg += "- brak ceny dla średniej pizzy; <br>";

    if (lprice == "")
        errorMsg += "- brak ceny dla dużej pizzy; <br>";

    if (sprice >= mprice || sprice >= lprice || mprice >= lprice)
        errorMsg += "- cena większej pizzy nie może być niższa od ceny pizzy mniejszej; <br>";

    if (papryczki == "")
        document.forms["formPizza"]["papryczki"].value = '0';

    if (errorMsg != "") {
        validationAlert.innerHTML += errorMsg;
        validationAlert.style.display = "block";
        return false;
    }
}