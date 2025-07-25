document.addEventListener('DOMContentLoaded', () => {
    userCount('get/count', 'student', 'registered-student');
    userCount('get/count', 'teacher', 'registered-teacher');
    userCount('get/count', 'user', 'registered-user');
    userCount('get/count', 'admin', 'registered-admin');

    userCount('get/user', 'user', 'response');
})

async function userCount(route, table, response){
    const adminDashboard = document.getElementById('admin-dashboard');
    if(adminDashboard){
        const formData = new FormData();
        const isDeleted = 0;
        formData.append('table', table);
        formData.append('isDeleted', isDeleted);
        const data = await PostData(route, formData);
        document.getElementById(response).innerHTML = data;
        console.log("Count returned from server:", data);
    }


}

