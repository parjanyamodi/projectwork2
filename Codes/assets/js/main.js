let nameS;
function advmark(nameS = 'stud1') {
    let students = document.getElementsByClassName(nameS);
        let total = students.length;
        let i = 0;
        let sum = 0;
        let percent = 0;
        //alert(total);

        while( i <= total - 2) {
            if(i == 0 || i == 1 || i == 2) {
                if(+students[i].value >= 0 && +students[i].value <= 40) {
                    sum += +students[i].value;
                    i++;
                } else {
                    alert('Invalid number');
                    return false;
                }
            } else if(i == 3) {
                if(+students[i].value >= 0 && +students[i].value <= 10) {
                    sum += +students[i].value;
                    i++;
                } else {
                    alert('Invalid number');
                    return false;
                }
            } else if(i == 4) {
                if(+students[i].value >= 0 && +students[i].value <= 100) {
                    sum += +students[i].value;
                    i++;
                } else {
                    alert('Invalid number');
                    return false;
                }
            }  
        }
        percent = ( sum * 100 ) / 230;
        if(i == total - 1) {
            students[5].value = percent; 
        }    
}  


function marks() {
    let students = document.getElementsByClassName('s');
    let totalStudents = students.length;
    let no = 0;
    let j = 1;
    //alert(totalStudents);
    
    while( no < totalStudents) {
        let names = 'stud' + j;
        let tf;
        tf = advmark(names);
        if( tf == false) {
            return;
        }
        
        j++;
        no++;
    }
}



function validateHodEmail()
{
    // characters.cse@bmsce.ac.in
    var email = document.getElementById('hodEmail').value;
    var result = email.match('[a-z]+.cse@bmsce.ac.in');
    if(result==email)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function validateFacultyEmail()
{
    // characters.cse@bmsce.ac.in
    var email = document.getElementById('facultyEmail').value;
    var result = email.match('[a-z]+.cse@bmsce.ac.in');
    if(result==email)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function validateFacultyPassword()
{
    if(validateFacultyEmail() == true && document.getElementById('facultyPassword').value != '')
    {
        location.replace("https://projectwork1-bms-cse3b-team7.netlify.app/facdash.html");
    }
    else{
        alert('Email Format is invalid or Password is empty!');
    }
}
function validateHodPassword()
{
    if(validateHodEmail() == true && document.getElementById('hodPassword').value != '')
    {
        location.replace("https://projectwork1-bms-cse3b-team7.netlify.app/hoddash.html");

    }
    else{
        alert('Email Format is invalid or Password is empty!');
    }

}
