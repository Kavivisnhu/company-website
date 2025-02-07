const logoutlinks = document.querySelectorAll('a[href*="logout.php"]');
logoutlinks.forEach(link=>{
    link.addEventListener('click', (e) =>{
       const confirmlogout = confirm("Are you sure you want to log out?");
       if(!confirmlogout){
        e.preventDefault();
       }
     });
    });
const forms = document.querySelectorAll('form');
forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        const inputs = form.querySelectorAll('input[required],textarea[required]');
        let valid = true;
        inputs.forEach(input => {
            if(!input.value.trim()) {
                alert(please fill out the ${input.name} field.);
                input.focus();
                valid = false;
                return;
            }
        });
        if(!valid) e.preventDefault();    
    });
});
