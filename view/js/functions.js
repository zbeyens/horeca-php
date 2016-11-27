//exceptions...
function divSelectCheck3(nameSelect, option1, option2, option3) {
    if (nameSelect) {
        if (nameSelect.value == 1) {
            document.getElementById(option1).style.display = "block"    
            document.getElementById(option2).style.display = "none";
            document.getElementById(option3).style.display = "none";
            /*var queries = document.querySelectorAll(option); //getElementById est au moins 5 fois plus performant
            for (var i = 0; i < queries.length; i++) {
                queries[i].style.display = "block";
            }*/
        }
        else if (nameSelect.value == 2) {
            document.getElementById(option1).style.display = "none";
            document.getElementById(option2).style.display = "block";
            document.getElementById(option3).style.display = "none";
        }
        else if (nameSelect.value == 3) {
            document.getElementById(option1).style.display = "none";
            document.getElementById(option2).style.display = "none";
            document.getElementById(option3).style.display = "block";
        }
        else {
            document.getElementById(option1).style.display = "none";
            document.getElementById(option2).style.display = "none";
            document.getElementById(option3).style.display = "none";
        }
    }
    else {
        document.getElementById(option1).style.display = "none";
        document.getElementById(option2).style.display = "none";
        document.getElementById(option3).style.display = "none";
    }
}

function divSelectCheck(nameSelect, option1) {
    if (nameSelect) {
        if (nameSelect.value == 1) {
            document.getElementById(option1).style.display = "block";
        }
        else {
            document.getElementById(option1).style.display = "none";
        }
    }
    else {
        document.getElementById(option1).style.display = "none";
    }
}