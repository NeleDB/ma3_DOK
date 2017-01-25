/*
  Author: Jack Ducasse;
  Version: 0.1.0;
  (◠‿◠✿)
*/

const events = {};
let $articles;

const Calendar = function (model, options, date) {
  // Default Values
  this.Options = {
    Color: `black`,
    LinkColor: ``,
    NavShow: true,
    NavVertical: false,
    NavLocation: ``,
    DateTimeShow: true,
    DateTimeFormat: `mmm, yyyy`,
    DatetimeLocation: ``,
    EventClick: ``,
    EventTargetWholeDay: false,
    DisabledDays: [],
    ModelChange: model
  };
  // Overwriting default values
  for (const key in options) {
    this.Options[key] = typeof options[key] === `string` ? options[key].toLowerCase() : options[key];
  }

  model ? this.Model = model : this.Model = {};
  this.Today = new Date();

  this.Selected = this.Today;
  this.Today.Month = this.Today.getMonth();
  this.Today.Year = this.Today.getFullYear();
  if (date) {
    this.Selected = date;
  }
  this.Selected.Month = this.Selected.getMonth();
  this.Selected.Year = this.Selected.getFullYear();

  this.Selected.Days = new Date(this.Selected.Year, this.Selected.Month + 1, 0).getDate();
  this.Selected.FirstDay = new Date(this.Selected.Year, this.Selected.Month, 1).getDay();
  this.Selected.LastDay = new Date(this.Selected.Year, this.Selected.Month + 1, 0).getDay();

  this.Prev = new Date(this.Selected.Year, this.Selected.Month - 1, 1);
  if (this.Selected.Month === 0) {
    this.Prev = new Date(this.Selected.Year - 1, 11, 1);
  }
  this.Prev.Days = new Date(this.Prev.getFullYear(), this.Prev.getMonth() + 1, 0).getDate();
};

const createCalendar = (calendar, element, adjuster) => {
  if (typeof adjuster !== `undefined`) {
    const newDate = new Date(calendar.Selected.Year, calendar.Selected.Month + adjuster, 1);
    calendar = new Calendar(calendar.Model, calendar.Options, newDate);
    element.innerHTML = ``;
  } else {
    for (const key in calendar.Options) {
      typeof calendar.Options[key] != `function` && typeof calendar.Options[key] != `object` && calendar.Options[key] ? element.className += ` ${key}-${calendar.Options[key]}` : 0;
    }
  }
  const months = [`Januari`, `Februari`, `Maart`, `April`, `Mei`, `Juni`, `Juli`, `Augustus`, `September`, `Oktober`, `November`, `December`];

  function AddSidebar() {
    const sidebar = document.createElement(`div`);
    sidebar.className += `cld-sidebar`;

    const monthList = document.createElement(`ul`);
    monthList.className += `cld-monthList`;

    for (let i = 0;i < months.length - 3;i ++) {
      const x = document.createElement(`li`);
      x.className += `cld-month`;
      let n = i - (4 - calendar.Selected.Month);
      // Account for overflowing month values
      if (n < 0) {
        n += 12;
      } else if (n > 11) {
        n -= 12;
      }
      // Add Appropriate Class
      if (i === 0) {
        x.className += ` cld-rwd cld-nav`;
        x.addEventListener(`click`, function () {
          typeof calendar.Options.ModelChange === `function` ? calendar.Model = calendar.Options.ModelChange() : calendar.Model = calendar.Options.ModelChange;
          createCalendar(calendar, element, - 1);
        });
        x.innerHTML += `<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,75 100,75 50,0"></polyline></svg>`;
      } else if (i === months.length - 4) {
        x.className += ` cld-fwd cld-nav`;
        x.addEventListener(`click`, function () {
          typeof calendar.Options.ModelChange === `function` ? calendar.Model = calendar.Options.ModelChange() : calendar.Model = calendar.Options.ModelChange;
          createCalendar(calendar, element, 1);
        });
        x.innerHTML += `<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,0 100,0 50,75"></polyline></svg>`;
      } else {
        if (i < 4) {
          x.className += ` cld-pre`;
        } else if (i > 4) {
          x.className += ` cld-post`;
        } else {
          x.className += ` cld-curr`;
        }

        //prevent losing const adj value (for whatever reason that is happening)
        (function () {
          const adj = i - 4;
          //x.addEventListener('click', function(){createCalendar(calendar, element, adj);console.log('kk', adj);} );
          x.addEventListener(`click`, function () {
            typeof calendar.Options.ModelChange === `function` ? calendar.Model = calendar.Options.ModelChange() : calendar.Model = calendar.Options.ModelChange;
            createCalendar(calendar, element, adj);
          });
          x.setAttribute(`style`, `opacity:${1 - Math.abs(adj) / 4}`);
          x.innerHTML += months[n].substr(0, 3);
        })(); // immediate invocation

        if (n === 0) {
          const y = document.createElement(`li`);
          y.className += `cld-year`;
          if (i < 5) {
            y.innerHTML += calendar.Selected.Year;
          } else {
            y.innerHTML += calendar.Selected.Year + 1;
          }
          monthList.appendChild(y);
        }
      }
      monthList.appendChild(x);
    }
    sidebar.appendChild(monthList);
    if (calendar.Options.NavLocation) {
      document.getElementById(calendar.Options.NavLocation).innerHTML = ``;
      document.getElementById(calendar.Options.NavLocation).appendChild(sidebar);
    } else {
      element.appendChild(sidebar);
    }
  }

  const mainSection = document.createElement(`div`);
  mainSection.className += `cld-main`;

  const AddDateTime = () => {
    const datetime = document.createElement(`div`);
    datetime.className += `cld-datetime`;
    if (calendar.Options.NavShow && !calendar.Options.NavVertical) {
      const rwd = document.createElement(`div`);
      rwd.className += ` cld-rwd cld-nav`;
      rwd.addEventListener(`click`, function () {
        createCalendar(calendar, element, - 1);
      });
      rwd.innerHTML = `<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,50 75,0 75,100"></polyline></svg>`;
      datetime.appendChild(rwd);
    }
    const today = document.createElement(`div`);
    today.className += ` today`;
    today.innerHTML = `${months[calendar.Selected.Month]}, ${calendar.Selected.Year}`;
    datetime.appendChild(today);
    if (calendar.Options.NavShow && !calendar.Options.NavVertical) {
      const fwd = document.createElement(`div`);
      fwd.className += ` cld-fwd cld-nav`;
      fwd.addEventListener(`click`, function () {
        createCalendar(calendar, element, 1);
      });
      fwd.innerHTML = `<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,0 75,50 0,100"></polyline></svg>`;
      datetime.appendChild(fwd);
    }
    if (calendar.Options.DatetimeLocation) {
      document.getElementById(calendar.Options.DatetimeLocation).innerHTML = ``;
      document.getElementById(calendar.Options.DatetimeLocation).appendChild(datetime);
    } else {
      mainSection.appendChild(datetime);
    }
  };

  const AddLabels = () => {
    const labels = document.createElement(`ul`);
    labels.className = `cld-labels`;
    const labelsList = [`Zon`, `Ma`, `Di`, `Woe`, `Do`, `Vrij`, `Sat`];
    for (let i = 0;i < labelsList.length;i ++) {
      const label = document.createElement(`li`);
      label.className += `cld-label`;
      label.innerHTML = labelsList[i];
      labels.appendChild(label);
    }
    mainSection.appendChild(labels);
  };
  const AddDays = () => {
    // Create Number Element
    function DayNumber(n) {
      const number = document.createElement(`p`);
      number.className += `cld-number`;
      number.innerHTML += n;
      return number;
    }
    const days = document.createElement(`ul`);
    days.className += `cld-days`;
    // Previous Month's Days
    for (let i = 0;i < calendar.Selected.FirstDay;i ++) {
      const day = document.createElement(`li`);
      day.className += `cld-day prevMonth`;
      //Disabled Days
      const d = i % 7;
      for (let q = 0;q < calendar.Options.DisabledDays.length;q ++) {
        if (d === calendar.Options.DisabledDays[q]) {
          day.className += ` disableDay`;
        }
      }

      const number = DayNumber(calendar.Prev.Days - calendar.Selected.FirstDay + (i + 1));
      day.appendChild(number);

      days.appendChild(day);
    }
    // Current Month's Days
    for (let i = 0;i < calendar.Selected.Days;i ++) {
      const day = document.createElement(`li`);
      day.className += `cld-day currMonth`;
      //Disabled Days
      const d = (i + calendar.Selected.FirstDay) % 7;
      for (let q = 0;q < calendar.Options.DisabledDays.length;q ++) {
        if (d === calendar.Options.DisabledDays[q]) {
          day.className += ` disableDay`;
        }
      }
      const number = DayNumber(i + 1);
      const dataArr = [];
      // Check Date against Event Dates
      for (let n = 0;n < calendar.Model.length;n ++) {
        const evDate = calendar.Model[n].Date;
        const toDate = new Date(calendar.Selected.Year, calendar.Selected.Month, i + 1);
        if (evDate.getTime() === toDate.getTime()) {
          number.className += ` eventday`;

          dataArr.push(`${calendar.Model[n].Id}`);
          number.addEventListener(`click`, onDateClick);
          //console.log(dataArr);

        } else {
          //title.innerHTML += `<a href="index.php?page=detail&id=${calendar.Model[n].Id}">${calendar.Model[n].Title}</a>`;
        }

        number.dataset.id = dataArr;


      }
      day.appendChild(number);
      // If Today..
      if (i + 1 === calendar.Today.getDate() && calendar.Selected.Month === calendar.Today.Month && calendar.Selected.Year === calendar.Today.Year) {
        day.className += ` today`;
      }
      days.appendChild(day);
    }
    // Next Month's Days
    // Always same amount of days in calander
    let extraDays = 13;
    if (days.children.length > 35) {
      extraDays = 6;
    } else if (days.children.length < 29) {
      extraDays = 20;
    }

    for (let i = 0;i < extraDays - calendar.Selected.LastDay;i ++) {
      const day = document.createElement(`li`);
      day.className += `cld-day nextMonth`;
      //Disabled Days
      const d = (i + calendar.Selected.LastDay + 1) % 7;
      for (let q = 0;q < calendar.Options.DisabledDays.length;q ++) {
        if (d === calendar.Options.DisabledDays[q]) {
          day.className += ` disableDay`;
        }
      }

      const number = DayNumber(i + 1);
      day.appendChild(number);

      days.appendChild(day);
    }
    mainSection.appendChild(days);
  };
  if (calendar.Options.Color) {
    mainSection.innerHTML += `<style>.cld-main{color:${calendar.Options.Color};}</style>`;
  }
  if (calendar.Options.LinkColor) {
    mainSection.innerHTML += `<style>.cld-title a{color:${calendar.Options.LinkColor};}</style>`;
  }
  element.appendChild(mainSection);

  if (calendar.Options.NavShow && calendar.Options.NavVertical) {
    AddSidebar();
  }
  if (calendar.Options.DateTimeShow) {
    AddDateTime();
  }
  AddLabels();
  AddDays();
};

const showInfo = event => {
  console.log(event);
  const $calendarDetail = document.querySelector(`.calendar-detail`);
  const $article = document.createElement(`div`);
  $article.classList.add(`calendar-article`);
  const $header = document.createElement(`header`);
  $header.classList.add(`calendar-title`);
  const $title = document.createElement(`h1`);
  const $datum = document.createElement(`p`);

  const dateTime = (event.start).split(` `);
  const date = dateTime[0].split(`-`);
  const time = dateTime[1].split(`:`);

  $title.innerHTML = event.title;
  $datum.innerHTML = (`${`${date[2]  }/${  date[1]}` + ` `}${  time[0]  }:${  time[1]}`);

  $header.appendChild($title);
  $article.appendChild($header);
  $article.appendChild($datum);

  $calendarDetail.appendChild($article);

  $articles = document.querySelectorAll(`.calendar-article`).length;
};

const deleteElements = () => {
  console.log(`hello`);
  const $calendarDetail = document.querySelector(`.calendar-detail`);
  //const $article = document.querySelector(`.calendar-article`);
  console.log($articles);
  //console.log($calendarDetail.childNode[1]);
  while ($calendarDetail.hasChildNodes()) {
    $calendarDetail.removeChild($calendarDetail.lastChild);
  }

};

const onDateClick = e => {
  if ($articles > 0) {
    deleteElements();
  }
  const date = e.currentTarget;
  const dataIds = date.dataset.id;
  const arr = dataIds.split(`,`);
  console.log(arr);
  arr.forEach(dataId =>  {
    const data = parseInt(dataId);
    showInfo(events[data]);
  });
  //const selectedDate = parseInt(date.dataset.id);
  //console.log(selectedDate);
  //showInfo(events[selectedDate]);
};

const caleandar = (el, data, settings) => {
  const obj = new Calendar(data, settings);
  createCalendar(obj, el);
};


const init = () => {
  fetch(`index.php?page=program&t=${Date.now()}`, {
    headers: new Headers({
      Accept: `application/json`
    })
  })
 .then(r => r.json())
 .then(d => parse(d));
};

const eventsArray = [];

const parse = data => {
  data.forEach(createData);

  const settings = {};
  const element = document.getElementById(`caleandar`);
  caleandar(element, eventsArray, settings);
};

const createData = dataElement => {
  events[dataElement.id] = dataElement;
  const dateTime = (dataElement.start).split(` `);//dateTime[0] = date, dateTime[1] = time
  const date = dateTime[0].split(`-`);
  //const time = dateTime[1].split(`:`);
  eventsArray.push(
    {Date: new Date(date[0], date[1], date[2]), Title: dataElement.title, Id: dataElement.id}
  );
  return eventsArray;
};

init();
