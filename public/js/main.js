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