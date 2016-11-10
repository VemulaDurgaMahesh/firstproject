function getAge(){
    var dob = document.getElementById('date').value;
    dob = new Date(dob);
    var today = new Date();
    var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    document.getElementById('age').value=age;

}