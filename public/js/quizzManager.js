var dragElement = null;

function dragHandler(e){
    dragElement = e;
}

function dropHandler(e){
    if(dragElement != null){
        console.log('MOUSE UP');
        dragElement = null;
    }
}

function init(){

    document.querySelectorAll(".dragElement").forEach(element => {
        element.addEventListener('mousedown',dragHandler);
    });

    document.querySelectorAll(".dropElement").forEach(element => {
        element.addEventListener('mouseup',dragHandler);
    });
}
addEventListener('DOMContentLoaded',init);