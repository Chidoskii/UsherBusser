// WAIT FOR THE PAGE TO LOAD BEFORE ADDING LISTENERS
window.addEventListener('load', function () {
  const container = document.getElementById('container-can');
  const registerBtn = document.getElementById('register');
  const loginBtn = document.getElementById('login');

  registerBtn.addEventListener('click', () => {
    container.classList.add('active');
  });

  loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
  });
});
