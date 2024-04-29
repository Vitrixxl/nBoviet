function connexion(e){
    let loginInput = document.querySelector('#userCo').value;
    let pswInput = document.querySelector('#mdpCo').value;
    if (loginInput != "" && pswInput !=""){
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: 'connexion.php',
            data : {username: loginInput, psw: pswInput},
            success: function (response) {
               
                if (response != 'connected') {
                    alert("Votre mot de passe ou votre identifiant n'est pas correct");
                } else {
                    const container = document.querySelector('.connexion');
                    container.classList.add('bye');
                    const childContainer = container.querySelectorAll('*');
                    let i=0;
                    if (childContainer[i] != undefined) {
                        childContainer[i].classList.add('bye');
                        i++
                    }
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 2000);
                    
                }
            }
        })
    }
   
}

const btnConnect  = document.querySelector(".btnConnect")
btnConnect.onclick=(e)=>{
    connexion(e)
}
