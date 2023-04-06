
const form = document.querySelector('#createJourney');
const message = document.querySelector('#message');


form.addEventListener('submit', (e) => {
    e.preventDefault(); // prevent default form submit

    // create FormData object to store form data
    const formData = new FormData(form);

    // make AJAX request to login.php
    fetch('createJourneyAjax', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        return response.json()
    })
    .then(data=>{
        if(data.success){
            console.log(data);
            message.textContent ='Voyage créé!';
            message.classList.add('messageSuccess');
        message.style.display = 'flex';


            setTimeout(() => {
                message.classList.remove('messageSuccess');
                window.location.href = 'home'; 
            }, 2000);

        }else{
            console.log(data);
            message.textContent ='Veuillez remplir tout les champs!';
            message.style.display = 'flex';
            message.classList.add('messageError');
            setTimeout(() => {
                message.style.display= 'none';
                message.classList.remove('messageError')
            }, 2000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});



