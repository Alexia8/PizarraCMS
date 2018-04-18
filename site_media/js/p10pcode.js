//OVERVIEW MENU=================================================================================================
$(document).ready(function () {
    $('#selAll').change(function () {
        var checkboxes = $(this).closest('form').find(':checkbox');
        if ($(this).is(':checked')) {
            checkboxes.prop('checked', true);
        } else {
            checkboxes.prop('checked', false);
        }
    });

    $('#message').show("fast").delay(2500).hide("slow");

});
function openNav() {
    document.getElementById("mySidenav").style.width = "280px";
    document.getElementById("main").style.marginRight = "280px";
    document.getElementById("menuS").style.display = "none";
    document.getElementById("menuSC").style.display = "block";
    document.getElementById("add").style.display = "block";
    document.getElementById("update").style.display = "block";
    document.getElementById("delete").style.display = "block";
    document.getElementById("users").style.display = "block";
    document.getElementById("add2").style.display = "block";
    document.getElementById("ended").style.display = "block";
    document.getElementById("prof").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight = "0";
    document.getElementById("menuS").style.display = "block";
    document.getElementById("menuSC").style.display = "none";
    document.getElementById("add").style.display = "none";
    document.getElementById("update").style.display = "none";
    document.getElementById("delete").style.display = "none";
    document.getElementById("users").style.display = "none";
    document.getElementById("add2").style.display = "none";
    document.getElementById("ended").style.display = "none";
    document.getElementById("prof").style.display = "none";
}

function openPayments() {
    document.getElementById("stuPayments").style.width = "100%";
    document.getElementById("closep").style.display = "block";
}

function closePayments() {
    document.getElementById("stuPayments").style.width = "0";
    document.getElementById("closep").style.display = "none";
}

function openComments() {
    document.getElementById("stuComment").style.top = "0";
    document.getElementById("closep").style.display = "block";
}

function closeComments() {
    document.getElementById("stuComment").style.top = "-21%";
    document.getElementById("closep").style.display = "none";
}

function showPass() {
    document.getElementById("pass").style.display = "inline-block";
    document.getElementById("hide").style.display = "inline-block";
    document.getElementById("show").style.display = "none";
}

function hidePass() {
    document.getElementById("pass").style.display = "none";
    document.getElementById("hide").style.display = "none";
    document.getElementById("show").style.display = "inline-block";
}

function selectStat() {
    var selectBox = document.getElementById("groupSel");
    console.log(selectBox.options[selectBox.selectedIndex].value);
    getGroups(selectBox.options[selectBox.selectedIndex].value);
}


