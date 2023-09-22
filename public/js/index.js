var button = document.getElementById('btn-cart');
var isAdd = false;
button.addEventListener("click", click)
button.addEventListener("mouseover", over)
button.addEventListener("mouseout", out)


function click (){
    if (!isAdd) {
        button.innerHTML = "<i class=\"bi bi-bag-check\"></i>";
        button.className = "btn btn-success";
        isAdd = true;
    } else {
        button.innerHTML = '<i class="bi bi-bag"></i>';
        button.className = "btn btn-primary";
        isAdd = false;
    }
}

function over() {
    if (isAdd) {
        button.innerHTML = "<i class=\"bi bi-bag-x\"></i>";
        button.className = "btn btn-danger";
    }
}

function out() {
    if (isAdd) {
        button.innerHTML = "<i class=\"bi bi-bag-check\"></i>";
        button.className = "btn btn-success";
    } else {
        button.innerHTML = '<i class="bi bi-bag"></i>';
        button.className = "btn btn-primary";
    }
}
