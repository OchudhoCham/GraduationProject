function openForm(){
    var form = document.getElementById("user-registeration")
form.style.display = "block";
}

document.querySelector("#user-registeration form").addEventListener("submit", function(e){
e.preventDefault();
var form = document.getElementById("user-registeration");
form.style.display = "none";
});

function openFormForNewProduct(){
    var form = document.getElementById("add_product")
form.style.display = "block";
}

document.querySelector("#add_product form").addEventListener("submit", function(e){
e.preventDefault();
var form = document.getElementById("add_product");
form.style.display = "none";
});