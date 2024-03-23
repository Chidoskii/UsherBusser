let queryString = window.location.search;
let index = 0;
let time = '-';
let movie = '-';
let aud = '-';
let rows = 'A↑';
let status = 'dirty';
let schedule = JSON.parse(localStorage.getItem('schedule')) || [];
let statuslocker = [];

queryString = window.location.search;
if (queryString !== '') {
  let urlParams = new URLSearchParams(queryString);
  if (urlParams.has('rows')) {
    rows = urlParams.get('rows');
  }
  if (urlParams.has('status')) {
    status = urlParams.get('status');
  }
  aud = urlParams.get('aud');
  movie = urlParams.get('movie');
  time = urlParams.get('time');

  const entry = {
    time: time,
    movie: movie,
    aud: aud,
    rows: rows,
    status: status,
  };

  let listSize = schedule.length;
  if (listSize < 1) {
    schedule.push(entry);
  } else {
    if (listSize >= 1 && entry.time !== null && listSize < 15) {
      schedule.push(entry);
    } else {
      window.alert('The schudule is currently full.');
    }
  }

  let sortedSched = schedule;

  sortedSched.sort((a, b) => (a.time < b.time ? -1 : a.time > b.time ? 1 : 0));

  console.log('Schedule: ', sortedSched);

  localStorage.setItem('schedule', JSON.stringify(sortedSched));
  window.location.search = '';

  showSchedule();
  localStorage.setItem('schedule', JSON.stringify(schedule));
}

function showSchedule() {
  let ushList = JSON.parse(localStorage.getItem('schedule'));

  for (let i = 0; i < ushList.length; i++) {
    if (i % 2 == 0) {
      document.getElementById(`new-entry-${i}`).classList.add('even-entry');
    } else {
      document.getElementById(`new-entry-${i}`).classList.add('odd-entry');
    }

    let trash = document.createElement('button');
    trash.setAttribute('type', 'button');
    trash.setAttribute('id', `trash-bin-${i}`);
    trash.setAttribute('onclick', 'deleteMePlease(this.id)');
    trash.classList.add('btn');
    trash.classList.add('btn-secondary');
    trash.classList.add('deleter');
    trash.innerHTML = i;

    let entry_number = document.createElement('li');
    entry_number.classList.add('list-group-item');
    entry_number.classList.add('entry-number');
    entry_number.appendChild(trash);

    let end_time = document.createElement('li');
    end_time.classList.add('list-group-item');
    end_time.classList.add('entry-time');
    end_time.innerHTML += ushList[i].time;

    let film = document.createElement('li');
    film.classList.add('list-group-item');
    film.classList.add('flex-fill');
    film.classList.add('entry-movie');
    film.innerHTML += ushList[i].movie;

    let room = document.createElement('li');
    room.classList.add('list-group-item');
    room.classList.add('entry-aud');
    room.innerHTML += ushList[i].aud;

    let seats = document.createElement('li');
    seats.classList.add('list-group-item');
    seats.classList.add('entry-rows');
    seats.innerHTML += ushList[i].rows;

    let prog = document.createElement('button');
    prog.setAttribute('type', 'button');
    prog.setAttribute('id', `status-bar-${i}`);
    prog.setAttribute('onclick', 'statusToggle(this.id)');
    prog.classList.add('btn');
    prog.classList.add('btn-secondary');
    prog.innerHTML = ushList[i].status;
    if (prog.innerHTML == 'dirty') {
      prog.classList.add('dirty');
    } else {
      prog.classList.add('clean');
    }

    let report = document.createElement('li');
    report.classList.add('list-group-item');
    report.classList.add('entry-status');
    report.appendChild(prog);

    let result = document.getElementById(`new-entry-${i}`);
    result.appendChild(entry_number);
    result.appendChild(end_time);
    result.appendChild(film);
    result.appendChild(room);
    result.appendChild(seats);
    result.appendChild(report);
  }
}

function statusLogger() {
  let ushList = JSON.parse(localStorage.getItem('schedule'));
  let listSize = schedule.length;
  for (let i = 0; i < listSize; i++) {
    let compare = document.getElementById(`status-bar-${i}`);
    statuslocker[i] = compare.innerHTML;
  }
  for (let i = 0; i < listSize; i++) {
    ushList[i].status = statuslocker[i];
  }

  localStorage.setItem('schedule', JSON.stringify(ushList));
}

function resetSchedule() {
  localStorage.clear();

  window.location.search = '';
}

function openForm() {
  document.getElementById('sched-form').style.display = 'block';
}

function closeForm() {
  document.getElementById('sched-form').style.display = 'none';
}

function editForm() {
  document.getElementById('edit-form').style.display = 'block';
}

function closeEdit() {
  document.getElementById('edit-form').style.display = 'none';
}

function resetEntry() {
  document.getElementById('reset-form').style.display = 'block';
}

function cancelReset() {
  document.getElementById('reset-form').style.display = 'none';
}

function editEntry() {
  if (queryString !== '') {
    let urlParams = new URLSearchParams(queryString);
    if (urlParams.has('rows')) {
      rows = urlParams.get('rows');
    }
    if (urlParams.has('status')) {
      status = urlParams.get('status');
    }
    aud = urlParams.get('aud');
    movie = urlParams.get('movie');
    time = urlParams.get('time');
    index = Number(urlParams.get('order'));
  }

  const entry = {
    time: time,
    movie: movie,
    aud: aud,
    rows: rows,
    status: status,
  };

  schedule[index - 1] = entry;
  localStorage.setItem('schedule', JSON.stringify(schedule));
  console.log(entry);
}

function deleteValue() {
  let queryString = window.location.search;

  if (queryString !== '') {
    let urlParams = new URLSearchParams(queryString);
    if (urlParams.has('order')) {
      index = Number(urlParams.get('order'));
    }
    console.log(index);
  }

  schedule = JSON.parse(localStorage.getItem('schedule'));

  // Removing the specified element by value from the array
  let newlist = schedule.splice(index - 1, 1);

  localStorage.setItem('schedule', JSON.stringify(schedule));
  queryString = '';
}

function statusToggle(id) {
  let clist = document.getElementById(id);
  console.log(clist);
  if (clist.classList.contains('dirty')) {
    clist.classList.remove('dirty');
    clist.classList.add('clean');
    clist.innerHTML = 'clean';
  } else {
    clist.classList.remove('clean');
    clist.classList.add('dirty');
    clist.innerHTML = 'dirty';
  }
  statusLogger();
}

function deleteMePlease(id) {
  let clist = document.getElementById(id);
  let index = parseInt(clist.innerText);
  let ushSched = JSON.parse(localStorage.getItem('schedule'));

  // Removing the specified element by value from the array
  ushSched.splice(index, 1);

  localStorage.setItem('schedule', JSON.stringify(ushSched));
  window.location.reload();
}

window.onload = function () {
  let listSize = schedule.length;
  if (listSize > 0) {
    showSchedule();
  }
};
