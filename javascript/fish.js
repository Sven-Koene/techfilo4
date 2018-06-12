var screenWidth = window.innerWidth;
var screenHeight = window.innerHeight;
var timeOut;
var fishes = 0;


function wait() {
    timeOut = setTimeout(createFish, 500);
}


function createFish() {
    var randomNumberX = Math.random() * screenWidth;
    var randomNumberY = Math.random() * screenHeight;
    var randomNumberColor = Math.random() * 360;
    var fish = document.createElement('fish');
    document.body.appendChild(fish);
    fish.style.left = randomNumberX + "px";
    fish.style.top = randomNumberY + "px";
    fish.style.webkitFilter = "hue-rotate(" + randomNumberColor + "deg)";
    fish.style.filter = "hue-rotate(" + randomNumberColor + "deg)";
    fishes ++;
    wait();
    console.log(fishes);

    if (fishes >= 100){
        clearTimeout(timeOut);
        fishes = 0;
    }}

//creëer een bubbel
function createBubbles(){
    var randomNumberX = Math.random() * screenWidth;
    var randomNumberY = Math.random() * screenHeight;
    var bubble = document.createElement('bubble');
    document.body.appendChild(bubble);
    bubble.style.left = randomNumberX + "px";
    bubble.style.top = randomNumberY + "px";
    setTimeout(createBubbles, 500);



// roep een functie aan als alles geladen is
window.addEventListener("load", function () {
    console.log("start het aquarium")
});
}

createBubbles();
createFish();

function clickHandler(e){
    var clickedItem = e.target;
    console.log(e);
    if(clickedItem.nodeName == 'FISH'){
        clickedItem.classList.add('dead');
        console.log(clickedItem);

    }
}
// //click event listener
document.body.addEventListener('click', clickHandler);





