
function vali(){

    let fname = document.getElementById("fname").value.trim();
    let sname = document.getElementById("sname").value.trim();
    let dob = document.getElementById("dob").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    
    

    if(fname == '' || sname == '' || email == '' || phone == ''){
        window.alert("All values must be entered");
        return false;
    }
    else if(Number.isInteger(parseInt(fname)) == true || Number.isInteger(parseInt(sname)) == true ){
        window.alert("No numbers can be inputed for your name");
        return false;
    }
    else if(fname.length > 15 || sname.length > 15){
        window.alert("Your first name and second name cant be greater than 15 characters");
        return false;
    }
    else if(Number.isInteger(parseInt(phone)) == false){
        window.alert("Phone number must be digits");
        return false;
    }
    else if(phone.length > 15){
        window.alert("Phone number cannot be greater than 10 numbers");
        return false;
    }
    else if(phone.charAt(0) != 0){

        window.alert("Phone must start with 0");
        return false;
    }
    else{
        window.alert("Member Added");
        return true;
    }
}

let today = new Date().toISOString().split("T")[0]; 
