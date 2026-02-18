function validateForm(){
    let prev = parseFloat(document.getElementById("previous").value);
    let curr = parseFloat(document.getElementById("current").value);
    let error = document.getElementById("Error");

    if(curr<perv){
        error.innerHTML = "Invalid Reading: Current reading cannot be lower than preivous.";
        return false;
    }

}