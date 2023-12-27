///logout
function showLogout(){
     showPop();
     logoutSection.style.display = "flex";
}
function hideLogout(){
     hidePop();
     logoutSection.style.display = "none";
}

function showPop(){
     boardSection.style.opacity ="0.05";
     boardSection.style.zIndex = "-2";
}
function hidePop(){
     boardSection.style.opacity ="1";
     boardSection.style.zIndex = "1";
}
