document.addEventListener('DOMContentLoaded', function(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    
    if (dd < 10)
       dd = '0' + dd;
    if (mm < 10)
       mm = '0' + mm;
        
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        let valid = true;

        const startTime = form.querySelector('input[name="startTime"]');
        const endTime = form.querySelector('input[name="endTime"]');

        if (startTime.value > endTime.value) {
            alert('Start time must be before end time!');
            endTime.focus();
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});

