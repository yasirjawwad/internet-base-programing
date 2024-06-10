// JavaScript code for search functionality
const searchButton = document.getElementById("searchButton");
const searcheform = document.querySelector("#searcher-form");
const price = document.querySelector(".price-range");
const category = document.querySelector(".category");
const searchInput = document.getElementById("searchInput");
const products = document.getElementsByClassName("prod-sea");

searchButton.addEventListener("click", function (e) {
    const searchTerm = searchInput.value.toLowerCase();

    for (let i = 0; i < products.length; i++) {
        const productName = products[i]
            .getElementsByTagName("h5")[0]
            .innerText.toLowerCase();

        if (productName.includes(searchTerm)) {
            products[i].style.display = "block";
        } else {
            products[i].style.display = "none";
        }
    }
});

searcheform.addEventListener("keyup", (e) => {
    const searchTerm = searchInput.value.toLowerCase();

    for (let i = 0; i < products.length; i++) {
        const productName = products[i]
            .getElementsByTagName("h5")[0]
            .innerText.toLowerCase();

        if (productName.includes(searchTerm)) {
            products[i].style.display = "block";
        } else {
            products[i].style.display = "none";
        }
    }
});
searcheform.addEventListener("submit", (e) => {
    e.preventDefault();
    var checked = document.querySelector("input[name='category']:checked");
    const usercategory = checked.value;
    const userprice = price.value;
    for (const iterator of products) {
        if (
            usercategory != "all" &&
            usercategory != iterator.dataset.id.toLowerCase()
        ) {
            iterator.style.display = "none";
        } else {
            iterator.style.display = "block";
        }
    }
});
