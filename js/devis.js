document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#Demandez\\ un\\ DevisForm");
    
    if (form) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();
            alert("Votre demande de devis a été soumise avec succès!");
            form.reset();
        });
    }

    const phoneInput = document.querySelector("input[name='senderTel']");
    if (phoneInput) {
        phoneInput.addEventListener("keypress", function (event) {
            const charCode = event.which ? event.which : event.keyCode;
            if (charCode < 48 || charCode > 57) {
                event.preventDefault();
            }
        });
    }
    
});