window.addEventListener('DOMContentLoaded', function () {
    const deleteEnclos = document.querySelectorAll('.delete-enclos');
    deleteEnclos.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
  
            let form = e.currentTarget;
            Swal.fire({
                title: 'Suppression d\'un enclos',
                text: "Voulez vous supprimer définitivement l'enclos ?",
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

window.addEventListener('DOMContentLoaded', function () {
    const deleteAnimal = document.querySelectorAll('.delete-animal');
    deleteAnimal.forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
  
            let form = e.currentTarget;
            Swal.fire({
                title: 'Suppression d\'un animal',
                text: "Voulez vous supprimer définitivement cet animal ?",
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