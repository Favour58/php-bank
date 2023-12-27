///request
function showRequest(){
     showPop();
     requestSection.style.display = "flex";
}
function hideRequest(){
     hidePop();
     requestSection.style.display = "none";
}
//send
function showSend(){
     showPop();
     sendSection.style.display = "flex";
}
function hideSend(){
     hidePop();
     sendSection.style.display = "none";
}
//transfer
function showTransfer(){
     showPop();
     transferSection.style.display = "flex";
}
function hideTransfer(){
     hidePop();
     transferSection.style.display = "none";
}

//loan
function showLoan(){
     showPop();
     loanSection.style.display = "flex";
}
function hideLoan(){
     hidePop();
     loanSection.style.display = "none";
}

//bills
function showBills(){
          showPop();
          billSession.style.display ="flex"
     }
     function hideBills(){
          hidePop();
          billSession.style.display = "none";
     }
//more//
let checkMore = false;
function more(){
     if (!checkMore) {
     morePops.style.display = "grid";
     checkMore = true
     }
     else{
          morePops.style.display = "none";
          checkMore = false
     }

}

function showPop(){
     boardSection.style.opacity ="0.05";
     boardSection.style.zIndex = "-2";
}
function hidePop(){
     boardSection.style.opacity ="1";
     boardSection.style.zIndex = "1";
}

//show_alert_messages//
let reqStatus = document.getElementById('reqStatus').innerHTML;
let reqMsg = document.getElementById('reqMsg').innerHTML;
let  alertPop = document.querySelector(".alertPop");
if (reqStatus  == "true") {
     showReqPopUp();
     if (reqMsg == "Your request has been sent succesfully") {
          alertPop.style.backgroundColor = "green";
     }
     else if(reqMsg == "Your request was not sent"){
          alertPop.style.backgroundColor = "red";
     }
     setTimeout(hideReqPopUp, 5000);
}
else{
     hideReqPopUp()
}

function  showReqPopUp(){
     alertmsg.style.display = "flex";
}
function  hideReqPopUp(){
     alertmsg.style.display = "none";
}