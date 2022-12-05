/*  Course name: Web Programming (CST_8285_312)
      Assignment 2
      Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad
 */

//   Author: Kristina Shalaginova

//Creating a search function on the menu page (Kristina Shalaginova)

function search_item() {

    let input = document.getElementById('searchbar').value;
    input = input.toLowerCase();
    let x = document.getElementsByClassName('item');

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        }
        else {
            x[i].style.display = "list-item";
        }
    }
}

//Creatin a filter function on the menu page (Kristina Shalaginova)
function filter_item() {
    let y = document.getElementsByClassName('item');
    var select = document.getElementById('category-select');
    var value = select.options[select.selectedIndex].value;

    for (i = 0; i < y.length; i++) {

        if (value === "select_item") {
            y[i].style.display = "list-item";
        }
        else if (!y[i].innerHTML.toLowerCase().includes(value)) {
            y[i].style.display = "none";
        }
        else {
            y[i].style.display = "list-item";
        }
    }
}
