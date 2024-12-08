const ATTIBUTTRUE = 'tryTrue';
const ATTIBUTPARTIAL = 'tryPartial';
const ATTIBUTFAlSE = 'tryFalse';
//list brute des entité
let lst_entity = []
lst_entity.push(
    {'ENTITY_ID':1,'ENTITY_NAME':'C#','ENTITY_IMAGE':null,
        'attributs':[
            {'name':'First appeared','values':['2001']},
            {'name':'Filename extensions','values':['.cs']},
            {'name':'Paradigme','values':['orienté objet','impératif','Structuré']},
            {'name':'Auteur','values':['Microsoft']}
        ]},

    {'ENTITY_ID':2,'ENTITY_NAME':'Java','ENTITY_IMAGE':null,
        'attributs':[
            {'name':'First appeared','values':['1995']},
            {'name':'Filename extensions','values':['.java','.class','.jar','.jad','.jmod']},
            {'name':'Paradigme','values':['orienté objet','impératif','Structuré','générique']},
            {'name':'Auteur','values':['Oracle Corporation']}
        ]},

    {'ENTITY_ID':3,'ENTITY_NAME':'PHP','ENTITY_IMAGE':null,
        'attributs':[
            {'name':'First appeared','values':['1995']},
            {'name':'Filename extensions','values':['.php','.phar']},
            {'name':'Paradigme','values':['orienté objet','impératif','Structuré','fonctionnel','générique','procédural','réflexif','interprété']},
            {'name':'Auteur','values':['Rasmus Lerdorf']}
        ]}
);
let idSolution;
//Init game
function initGame(){
    //Set entity input
    let entityInput = document.getElementById("entityInput");
    entityInput.innerHTML = '';

    var option = document.createElement('option');
    option.innerText = "--Please choose an option--";
    entityInput.appendChild(option);

    getAllEntity().forEach(entity => {
        var option = document.createElement('option');
        option.value = entity.ENTITY_ID;
        option.innerText = entity.ENTITY_NAME;
        entityInput.appendChild(option);
    });

    //set game play
    document.getElementById("input").addEventListener('click',playGame);

    //remove try
    document.getElementById("EntityTry").innerHTML = '';

    //get solution
    idSolution = InitSolution();
}

//Play
function playGame(){
    var TryId = document.getElementById("entityInput").value
    var entityTry = getEntityById(TryId);
    var entitySolution = getEntityById(idSolution);
    if(entityTry.ENTITY_ID != entitySolution.ENTITY_ID){
        addTryToTable(entityTry, entitySolution);
        removeTryOption(entityTry);
    }else{
        addTryToTable(entityTry, entitySolution);
        setTimeout(gameWin(), 100);
    }
}

function getEntityById(id){
    const entity = getAllEntity().find(e => e.ENTITY_ID == id);
    return entity || null;
}

//add in the table the entity tried
function addTryToTable(entityTry, entitySolution){
    let tbody = document.getElementById("EntityTry");
    let tr = document.createElement('tr');
    tbody.appendChild(tr);
    let tdName = document.createElement('td');
    tdName.textContent = entityTry.ENTITY_NAME;
    tr.appendChild(tdName);

    // add a block for every attributs
    for(idAttri = 0; idAttri < entityTry.attributs.length;idAttri++){
        let td = document.createElement('td');
        let tdText = "";
        entityTry.attributs[idAttri].values.forEach(val => {
            tdText += val + ", ";
        });
        td.innerText = tdText.substring(0, tdText.length - 2); // substring to crop the last ", "
        td.classList.add(verifAttibut(entityTry.attributs[idAttri], entitySolution.attributs[idAttri]));
        tr.appendChild(td);
    }
}

//return if the values of an attribut match the solution values (true, false or partial)
function verifAttibut(lstAttriTry, lstAttriSoluc){
    lstValTry = lstAttriTry.values;
    lstValSoluc = lstAttriSoluc.values;

    var nbCorrect = 0;
    var nbWrong = 0;
    for(idval = 0; idval < lstValTry.length; idval++){
        if(lstValSoluc.includes(lstValTry[idval])){
            nbCorrect++;
        }else{
            nbWrong++;
        }
    }
    if(nbCorrect == 0) return ATTIBUTFAlSE;
    if(nbCorrect == lstValSoluc.length && nbWrong == 0) return ATTIBUTTRUE;
    return ATTIBUTPARTIAL;

}
function gameWin(){
    console.log("WIN!!!");
    var divWin = document.createElement('div');
    divWin.classList.add('winDiv');
    document.body.appendChild(divWin);

    //btn close
    var btnClose = document.createElement('button');
    btnClose.innerText = "X";
    btnClose.addEventListener('click',function(){
        document.body.removeChild(divWin);
    });

    //Corps of Win div
    divWin.appendChild(btnClose);
    var H1 = document.createElement('H1');
    H1.innerText = "YOU WIN !!!";
    divWin.appendChild(H1);
    var p = document.createElement('p');
    p.innerText = "wana retry ?";
    divWin.appendChild(p);

    //btn to retry
    var btnRetry = document.createElement('button');
    btnRetry.innerText = "yes";
    btnRetry.addEventListener('click',function(){
        document.body.removeChild(divWin);
        initGame();
    });
    divWin.appendChild(btnRetry);
}

function removeTryOption(entityTry){
    let idToRemove = entityTry.ENTITY_ID;
    let optionToRemove = document.querySelector('#entityInput option[value="'+idToRemove+'"]');
    document.getElementById('entityInput').removeChild(optionToRemove);
}

//Get solution entity id
function InitSolution(){
    var lst_entity = getAllEntity();
    return lst_entity[getRandomInt(lst_entity.length)].ENTITY_ID
}

//Get Search entityes
function getAllEntity(){
    return lst_entity;
}
//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}
addEventListener('DOMContentLoaded',initGame);