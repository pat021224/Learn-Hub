
const loginForm = document.getElementById('login_form');
if(loginForm){
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(loginForm);
        const data = await PostData('login/user', formData);
        if(data.trim() === "admin"){
            window.location.href = "dashboard";
            return;
        }
        if(data.trim() === "student"){
            window.location.href = "student-dashboard";
            return;
        }
        if(data.trim() === "teacher"){
            window.location.href = "dashboard";
            return;
        }
        document.getElementById('response').innerHTML = data;
        
    })
}

const registrationForm = document.getElementById('registration_form');
if(registrationForm){
    registrationForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(registrationForm);
        const data = await PostData('register/user', formData);
        document.getElementById('response').innerHTML = data;
    })
}