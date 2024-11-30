window.addEventListener('DOMContentLoaded', function () {
    const deleteEnclos = document.querySelectorAll('.delete-enclos');
    deleteEnclos.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
  
            let form = e.currentTarget;
            Swal.fire({
                title: 'Suppression d\'un enclos',
                text: "Voulez vous supprimer définitivement l'enclos' ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Supprimer',
                cancelButtonText : 'Annuler',
            }).then(function (result) {
                if (result.isConfirmed) {
                    console.log('suppression confirmée', form);
                    // soumission du formulaire par le code
                    form.submit();
                }
            });
        })
    });
  })