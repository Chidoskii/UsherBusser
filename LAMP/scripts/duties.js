let duties = JSON.parse(localStorage.getItem('duties')) || [];
let statuslocker = [];

if (duties[0] == null || duties.length < 27) {
  for (let i = 0; i < 27; i++) {
    duties[i] = 'open';
  }

  localStorage.setItem('duties', JSON.stringify(duties));
}

function statusToggle(id) {
  let clist = document.getElementById(id);
  if (clist.classList.contains('open')) {
    clist.classList.remove('open');
    clist.classList.add('done');
    clist.innerHTML = 'done';
  } else {
    clist.classList.remove('done');
    clist.classList.add('open');
    clist.innerHTML = 'open';
  }
  statusLogger();
}

function statusLogger() {
  let dutiesList = JSON.parse(localStorage.getItem('duties'));
  let listSize = duties.length;
  for (let i = 0; i < listSize; i++) {
    let compare = document.getElementById(`duties-status-${i}`);
    statuslocker[i] = compare.innerText;
  }
  for (let i = 0; i < listSize; i++) {
    dutiesList[i] = statuslocker[i];
  }

  localStorage.setItem('duties', JSON.stringify(dutiesList));
}

function iRember() {
  let dutiesList = JSON.parse(localStorage.getItem('duties'));

  for (let i = 0; i < dutiesList.length; i++) {
    let compare = document.getElementById(`duties-status-${i}`);
    compare.innerText = dutiesList[i];
    if (compare.innerText == 'open') {
      if (compare.classList.contains('done')) {
        compare.classList.remove('done');
        compare.classList.add('open');
      }
    }
    if (compare.innerText == 'done') {
      if (compare.classList.contains('open')) {
        compare.classList.remove('open');
        compare.classList.add('done');
      }
    }
  }
}

function Refresh() {
  let dutiesList = JSON.parse(localStorage.getItem('duties'));

  for (let i = 0; i < dutiesList.length; i++) {
    let refresh = document.getElementById(`duties-status-${i}`);
    dutiesList[i] = 'open';

    if (
      refresh.classList.contains('done') ||
      !refresh.classList.contains('open')
    ) {
      refresh.classList.remove('done');
      refresh.classList.add('open');
    }
  }

  localStorage.setItem('duties', JSON.stringify(dutiesList));
}

function resetEntry() {
  document.getElementById('reset-form').style.display = 'block';
}

function cancelReset() {
  document.getElementById('reset-form').style.display = 'none';
}

// WAIT FOR THE PAGE TO LOAD BEFORE ADDING LISTENERS
window.addEventListener('load', function () {
  iRember();
});
