function clearValue() {
  const list = document.getElementById('output');

  while (list.hasChildNodes()) {
    list.removeChild(list.firstChild);
  }
  list.classList.add('empty');
  if (document.getElementById('output-text')) {
    document.getElementById('output-text').classList.add('empty');
    document.getElementById('output-text').innerHTML = '';
  }

  window.location.search = '';
}

window.onload = function () {
  let queryString = window.location.search;
  let hours = null;
  let rate = null;

  if (queryString !== '') {
    let urlParams = new URLSearchParams(queryString);
    if (urlParams.has('hours')) {
      hours = urlParams.get('hours');
    }
    if (urlParams.has('rate')) {
      rate = urlParams.get('rate');
    }

    let payday = hours * rate;
    console.log(payday);

    let title = document.createElement('h3');
    title.setAttribute('id', 'output-text');
    title.classList.add('output-title');
    title.innerHTML = 'Output';

    let pay = document.createElement('p');
    pay.classList.add('form-text');
    pay.innerHTML = 'Your expected pay is:  <br> $' + payday;

    let form = document.getElementById('contents');
    form.appendChild(title);

    let result = document.getElementById('output');
    result.removeAttribute('class', 'empty');
    result.appendChild(pay);
  }
};
