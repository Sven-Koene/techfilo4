var screenWidth = window.innerWidth;
var screenHeight = window.innerHeight;
var timeOut;
var fishes = 0;

//zorgt ervoor dat er een halve seconde zit tussen elke verschijnende vis
function wait() {
    timeOut = setTimeout(createFish, 500);
}


function createFish() {
    //genereerd een random nummer die zal overeenkomen met de x en y positie van de vis en bubbel
    var randomNumberX = Math.random() * screenWidth;
    var randomNumberY = Math.random() * screenHeight;
    //bepaald de kleur van de vis
    var randomNumberColor = Math.random() * 360;
    //voegt de fish toe aan de html
    var fish = document.createElement('fish');
    document.body.appendChild(fish);
    //voeg het random nummer toe aan de style van de vis om de locatie door te geven
    fish.style.left = randomNumberX + "px";
    fish.style.top = randomNumberY + "px";
    fish.style.webkitFilter = "hue-rotate(" + randomNumberColor + "deg)";
    fish.style.filter = "hue-rotate(" + randomNumberColor + "deg)";
    //telt 1 op bij fishes zodat we het kunnen laten stoppen als fishes op 100 staat
    fishes ++;
    wait();
    console.log(fishes);

    //zorgt ervoor dat de vissen stoppen met spawnen als er 100 zijn
    if (fishes >= 100){
        clearTimeout(timeOut);
        fishes = 0;
    }}

//creëer een bubbel
function createBubbles(){
     //genereerd een random nummer die zal overeenkomen met de x en y positie van de vis
    var randomNumberX = Math.random() * screenWidth;
    var randomNumberY = Math.random() * screenHeight;
    //creëer de bubble tag
    var bubble = document.createElement('bubble');
    document.body.appendChild(bubble);
    //voegt de random nummers toe aan de style om de bubble op de juiste plek te spawnen
    bubble.style.left = randomNumberX + "px";
    bubble.style.top = randomNumberY + "px";
    //na elke halve seconde een nieuwe bubel maken
    setTimeout(createBubbles, 500);



// roep een functie aan als alles geladen is
window.addEventListener("load", function () {
    console.log("start het aquarium")
});
}
//voer de bovenstaande functies uit
createBubbles();
createFish();

//clickhandler die ervoor zorgt dat de fish in een deadfish veranderd als erop geklikt wordt
function clickHandler(e){
    var clickedItem = e.target;
    console.log(e);
    if(clickedItem.nodeName == 'FISH'){
        clickedItem.classList.add('dead');
        console.log(clickedItem);

    }
}
//click event listener
document.body.addEventListener('click', clickHandler);





