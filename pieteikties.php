<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Konsultacijas</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="pieteikties.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 5.6.13, nicepage.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link rel="stylesheet" href="css/overwrite.css" media="screen">
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="Home">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body class="u-body u-xl-mode" data-lang="en">

<?php
  include('header.php');
  ?>

<form>
  <label for="input1">Vārds:</label>
  <input type="text" id="input1" name="input1"><br><br>
  
  <label for="input2">Uzvārds:</label>
  <input type="text" id="input2" name="input2"><br><br>
  
  <label for="dropdown1">Izvēlies ielu:</label>
  <select id="dropdown1" name="dropdown1">
    <option selected>Izvēlies ielu</option>
    <option value="option2">Ventspils iela</option>
    <option value="option3">Vānes iela</option>
  </select><br><br>
  
  <label for="dropdown2">Ko tu darīsi:</label>
  <select id="dropdown2" name="dropdown2">
  <option selected>Izvēlies ko tu darīsi</option>
    <option value="optionB">Labošu vērtējumu</option>
    <option value="optionC">Mācīties</option>
  </select><br><br>
  
  <button type="button" class="decline" onclick="confirmDecline()">Atcelt</button>
  <button type="submit" class="submit" onclick="confirmSubmit()">Pieteikties</button>

  <div class="calendar">
  <div class="month">
    <div class="prev">&#10094;</div>
    <div class="next">&#10095;</div>
    <div class="month-name"></div>
  </div>
  <div class="days"></div>
</div>
</form>


<script>
    function confirmSubmit() {
      if (confirm("Vai tiešām informācija ir ievadīta pareizi?")) {
        // Submit the form
        document.querySelector('form').submit();
      }
    }

    function confirmDecline() {
      if (confirm("Vai tiešām vēlies atcelt?")) {
        // Handle decline
      }
    }
  </script>

  <script>const months = ['Janvāris', 'Februāris', 'Marts', 'Aprīlis', 'Maijs', 'Jūnijs', 'Jūlijs', 'Augusts', 'Septembris', 'Octobris', 'Novembris', 'Decembris'];

const calendar = document.querySelector('.calendar');
const monthName = calendar.querySelector('.month-name');
const daysContainer = calendar.querySelector('.days');

let currentDate = new Date();

function updateCalendar() {
  // Clear the old days
  daysContainer.innerHTML = '';

  // Get the year and month
  const year = currentDate.getFullYear();
  const month = currentDate.getMonth();

  // Set the month name
  monthName.textContent = months[month] + ' ' + year;

  // Get the number of days in the month
  const numDays = new Date(year, month + 1, 0).getDate();

  // Get the first day of the month
  const firstDay = new Date(year, month, 1).getDay();

  // Create the empty cells for the days before the 1st of the month
  for (let i = 0; i < firstDay; i++) {
    const cell = document.createElement('div');
    daysContainer.appendChild(cell);
  }

  // Create the cells for the days of the month
  for (let i = 1; i <= numDays; i++) {
    const cell = document.createElement('div');
    cell.textContent = i;
    if (i === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear()) {
      cell.classList.add('today');
    }
    daysContainer.appendChild(cell);
  }
}

updateCalendar();

calendar.querySelector('.prev').addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  updateCalendar();
});

calendar.querySelector('.next').addEventListener('click', () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  updateCalendar();
});

daysContainer.addEventListener('click', (event) => {
  const cell = event.target;
  if (!cell.textContent) {
    return;
  }
  alert(`You clicked on ${cell.textContent} ${months[currentDate.getMonth()]} ${currentDate.getFullYear()}`);
});</script>

<?php
  include('footer.php');
  ?>

  </body>
</html>