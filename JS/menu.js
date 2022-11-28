//Course name: Web Programming (CST_8285_312)
//Assignment 2
//Students: Kristina Shalaginova, Melanie Methe, Banumajan Mohammad



//Creating a search function on the menu page
function search_item() {
    let input = document.getElementById('searchbar').value
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

//Creatin a filter function on the menu page

