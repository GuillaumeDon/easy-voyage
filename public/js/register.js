
const form = document.querySelector('#formRegister');
const message = document.querySelector('#message');

form.addEventListener('submit', (e) => {
    e.preventDefault(); // prevent default form submit

    // create FormData object to store form data
    const formData = new FormData(form);

    // make AJAX request to login.php
    fetch('registerAjax', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        return response.json()
    })
    .then(data=>{
        if(data.success){
        console.log(data);
        message.textContent ='Votre compte a bien été crée!';
        message.classList.add('messageSuccess');
        message.style.display = 'flex';
        // message.style.backgroundColor = 'green';
        setTimeout(() => {
            message.classList.remove('messageSuccess');

            window.location.href = 'home'; 
        }, 2000); 
            // message.style.color = 'white';
            // message.style.backgroundColor = 'green';
            // setTimeout(() => {
            //     window.location.href = 'home'; // redirect to home page
            // }, 2000);
            //  // wait 2 seconds before redirecting

        }else if(data.errorPass){ 
            console.log(data);
            message.textContent ='Les mots de passe entrés sont différents!';
            // message.style.color = 'white';
            // message.style.backgroundColor = 'red';
            message.style.display = 'flex';
            message.classList.add('messageError')
            setTimeout(() => {
                message.style.display= 'none';
                message.classList.remove('messageError') 
            }, 2000);
        }
        
            else if(data.error){
                console.log(data);
                message.textContent ='Tout les champs doivent être remplis!';
                // message.style.color = 'white';
                // message.style.backgroundColor = 'red';
                message.style.display = 'flex';
                message.classList.add('messageError')
                setTimeout(() => {
                    message.style.display= 'none';
                    message.classList.remove('messageError') 
                }, 2000);
            }
            
        
        else if(data.errorMail){
            console.log(data.errorMail);
            message.textContent ='Cet email est déjà enregistré!';
            // message.style.color = 'white';
            // message.style.backgroundColor = 'red';
            message.style.display = 'flex';
            message.classList.add('messageError')
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

