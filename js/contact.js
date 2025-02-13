


function redirectToAccueil() {
    window.location.href = "Accueil.html";
}


document.getElementById("Demandez un DevisForm").addEventListener("submit", function(event) {
    event.preventDefault();


    alert("Envoyé avec succès!");

    
    redirectToAccueil();
});





