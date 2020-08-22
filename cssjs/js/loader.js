var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 3000);
}

function showPage() {
    document.getElementById("loader").style.display = "block";
    document.getElementById("myDiv").style.display = "block";
}
