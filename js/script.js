// alert("test");
// NaN - not a number
let str = "base color";

let colors = ["red", "green", "blue"]; // colors.length

function sayHello(name) {
    document.write("hello, " + name);

}

let product = {
    id: 1,
    name: "watch",
    price: 112300,
    arr:
        [
            1, 2, 3
        ],
}


let product2 = {
    id: 2,
    name: "Airpods",
    price: 23000,
    count: 1,
}

let items = [product, product2];
let basketkey = "shopBasket";
// localStorage.setItem(basketkey, JSON.stringify(items));
localStorage.removeItem(basketkey);

// product.arr.push(4);
// console.log(product.arr);
// product.name = "clock";
// console.log(product.name);


//5. action 

// const popup = document.getElementById('popup');
// const temp = popup.children;
// console.log(temp.parent);
// console.log(temp.previousElementSibline);
// console.log(temp.nextElementSibline);

const popup = document.querySelector(".popup");
const buy = document.querySelector("#getPopup");
const close = document.querySelector(".close");
const basketTable = document.getElementById('basket');
const basketBadge = document.getElementById('basketBadge'); // в фанкшион добавить id в спан  


function popup_close() {
    popup.style.display = 'none';
}


function saveBasket(items) {
    localStorage.setItem(basketkey, JSON.stringify(items));

}

function getBasket(items) {

    let basket = localStorage.getItem(basketkey);
    let item = JSON.parse(basket);
    return item;
}

function changeQty(elem) {
    let id = document.getElementById(elem.id);
    let item = getBasket();
    for (let i of items.keys()) {
        if (items[i].id == elem.id) {
            items[i].count = Number(elem.value);
        }
    }
    saveBasket(items);
    items = getBasket();
    showBasket(items);

}

function deleteItem(elem) {
    let id = document.getElementById(elem.id);
    let item = getBasket();
    for (let i of items.keys()) {
        if (items[i].id == elem.id) {
            items.slice(i, 1);
        }
    }
    saveBasket(items);
    items = getBasket();
    
    showBasket(items);

}

function showBasket(items) {
    let count = 0;
    let total = 0;
    let newBasket = document.createElement("table");
    newBasket.classList = document.add("table", "table-striped", "table-secondary", "table-bordered", "w-50");
    for (let item of items) {
        let newBasketTr = document.createElement("tr");
        newBasketTr.innerHTML = "<td>" + item.name + "</td>" +
            "<td>" + item.price + "</td>" +
            "<td><input type=\"number\" class= \"qty\" min=\"1\" id=\"" + item.id + "\" value= \"" + item.count + "\" onChange = \"changeQty(this)\" /></td>"
        "<td>" + item.price * item.count + "</td>" +
            "<td><a href = \"#\" onClick=\"deleteItem(this)\" + id=\"" + item.id + "\">x</a></td>"
        newBasket.append(newBasketTr);
        count++;
        total += item.price * item.count;
    }

    newBasket.append(newBasketTr);
    let newBasketTr = document.createElement("tr");
    newBasketTr.innerHTML = "<td colspan=\"3\"><b>Итого</b></td>" +
        "<td colspan=\"\"><b>" + total + "</b></td>";

    basketTable.innerHTML = newBasket.outerHTML;



}

buy.onclick = function () {
    popup.style.display = 'block';
    setTimeout(popup_close, 2500);
}

close.onclick = function () {
    popup.style.display = 'none';
    items = getBasket();
    showBasket(items);

}

window.onclick = function (event) {
    if (event.target == popup) {
        popup.style.display = 'none';
    }

}

// console.log(getPopup);

//6. dom

//console.log(document.head);
//console.log(document.documentElement); //full html
//console.log(document.body); // body html

//var elem = document.body; //iterable object on DOM-collection

//console.log(elem.childNodes); //  list all nodes dom-collection

//for(let node of elem.childNodes) {
//    console.log(node);
//}

// let name = prompt("Your name: ", "dy default");
// sayHello(name);

// document.write("<h1>" + str + "</h1><ul>");
// for(let i = 0; i < colors.length; i++){
//     document.write("<li>" + colors[i] + "</li>");
// }
// document.write("</ul>");

