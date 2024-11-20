//Created By Saïam Cañedo
//<script src="javascript/popup.js" onload="openStoredPopup()"></script>
//<script src="javascript/popup.js"></script>

//creat the div that containe the popups
const popupConteneur = document.createElement('div');
popupConteneur.classList.add("popup_conteneur");
document.body.appendChild(popupConteneur);

//Part to store popup and display it between pages
var storedPopups = localStorage.getItem('storedPopups')? JSON.parse(localStorage.getItem('storedPopups')) : [];

//store a popup
function addStoredPopup(titre, message, time = 0){
    storedPopups.push({titre: titre, message: message, time: time});
    localStorage.setItem('storedPopups', JSON.stringify(storedPopups));
}

//open all the stored popup
function openStoredPopup(){
    storedPopups.forEach(popup => {
        openPopup(popup.titre, popup.message, popup.time);
    });
    clearStoredPopup();
}

//clear all the stored popup
function clearStoredPopup(){
    storedPopups = [];
    localStorage.setItem('storedPopups', JSON.stringify(storedPopups));
}

//part to open and close popup
function openPopup(titre, message, time = 0) {
    //create the popup and all his inner element
    let popup = document.createElement('div');
    popup.classList.add("popup");
    popupConteneur.appendChild(popup);
    
    let popup_titre = document.createElement('h3');
    popup_titre.innerText = titre;
    popup.appendChild(popup_titre);

    let popup_message = document.createElement('p');
    popup_message.innerText = message;
    popup.appendChild(popup_message);
    //animate the popup
    setTimeout(() => {
        popup.classList.add("active");
    }, 100);

    //add the event to close the popup
    popup.addEventListener('click', () => {
        closePopup(popup);
    });
    if(time != 0){
        setTimeout(() => {
            closePopup(popup)
        }, time);
    }
}
//close the popup pass in parametter
function closePopup(popup){
    if(popupConteneur.contains(popup)){
        popup.classList.remove("active");
        popup.classList.add("closing"); 
        setTimeout(() => {
            if(popupConteneur.contains(popup)){
                popupConteneur.removeChild(popup);
            }
        }, 200);
    }
}