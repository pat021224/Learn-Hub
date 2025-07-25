//reusable fetch code for DRYness
async function PostData(url, formData = null){
  try {
      const option = {
      method: 'POST',
      headers: {'X-Requested-With': 'XMLHttpRequest'},
    };
  if(formData){
      option.body = formData;
    }
    const response = await fetch(url, option);
    return response.text();
  } catch (error) {
    console.error('error:', error);
  }
}

//reusable fetch for json
async function PostJson(url, formData = null){
  try {
    const option = {
      method: 'POST',
      headers: {'X-Requested-With': 'XMLHttpRequest'},
    };
    if(formData){
      option.body = formData;
    }
    const response = await fetch(url, option);
    return response.json();
  } catch (error) {
    console.error('error:', error);
  }
}

//sidebar toggle
const hamburger = document.querySelector('#toggle-btn')
const toggler = document.querySelector('#icon')
hamburger.addEventListener('click', () => {
  document.querySelector('#sidebar').classList.toggle('shrink');
  toggler.classList.toggle('bi-chevron-double-left');
  toggler.classList.toggle('bi-chevron-double-right');
})

//modal confirmation for soft delete/ permanent delete / restore
let table = null;
let selectedId = null;
let action = null;
document.addEventListener('click', async (e) => {
    const softDeleteButton = e.target.closest('.delete');
    const restoreButton = e.target.closest('.restore');
    const permanentDeleteButton = e.target.closest('.permanent-delete');
    if(softDeleteButton){
      e.preventDefault();
      action = 'soft-delete'
      table = softDeleteButton.getAttribute('id');
      selectedId = softDeleteButton.getAttribute('data-id');
    }else if(restoreButton){
      e.preventDefault();
      action = 'restore'
      table = restoreButton.getAttribute('id');
      selectedId = restoreButton.getAttribute('data-id');
    }else if(permanentDeleteButton){
      e.preventDefault();
      action = 'permanent-delete'
      table = permanentDeleteButton.getAttribute('id');
      selectedId = permanentDeleteButton.getAttribute('data-id');
    }
    if(table && selectedId){
      formData = new FormData();
      formData.append('action', action)
      formData.append('table', table)
      formData.append('id', selectedId);
      const data = await PostData('modal/confirmation', formData);
      document.getElementById('modal-response').innerHTML = data;
    }
  })

  //archived or soft delete/ permanent delete/ restore data
const confirm = document.getElementById('confirm-action');
confirm.addEventListener('click', async (e) => {
  const formData = new FormData();
  formData.append('table', table)
  formData.append('id', selectedId);
  const modal = bootstrap.Modal.getInstance(document.getElementById('confirmation-modal'));
  if(action === 'soft-delete'){
    e.preventDefault();
    const data = await PostData('soft/delete', formData);
    document.getElementById('action-response').innerHTML = data;
    modal.hide();
    loadStudentList();
    loadTeacherList();
  }else if(action === 'restore'){
    e.preventDefault();
    const data = await PostData('restore', formData);
    document.getElementById('action-response').innerHTML = data;
    modal.hide();
    loadArchivedStudents();
    loadArchivedTeachers();
  }else if(action === 'permanent-delete'){
    e.preventDefault();
    const data = await PostData('permanent/delete', formData);
    document.getElementById('action-response').innerHTML = data;
    modal.hide();
    loadArchivedStudents();
    loadArchivedTeachers();
  }
})

//search
const searchBox = document.getElementById('search-box');
  searchBox.addEventListener('input', async (e) => {
    const table = searchBox.getAttribute('name');
    const keyword = e.target.value;
    const formData = new FormData();
    formData.append('table', table);
    formData.append('keyword', keyword)
    const data = await PostData('search', formData);
    document.getElementById('response').innerHTML = data;
  })
