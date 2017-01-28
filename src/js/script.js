import caleandar from './lib/caleandar.js';

const $filterMore = document.querySelector(`.filter-more`);
const $tags = document.querySelector(`.filter-form-tags`);
const $tagTitle = document.querySelector(`.filter-tags`);
const $openCalendar = document.querySelector(`.open-calendar`);
const $calendar = document.querySelector(`.calendar-part`);
const $prakEl = document.querySelector(`.mobile-item-praktisch`);
const $prakLink = document.querySelector(`.mobile-link-praktisch`);
const $zonesEl = document.querySelector(`.mobile-item-zones`);
const $zonesLink = document.querySelector(`.mobile-link-zones`);
const prakArr = [`Bereikbaarheid`, `DOKBewoner`, `DOKKeuken`];
const zoneArr = [`Kantine`, `Park`, `Markt`, `Box`, `Arena`];

const init = () => {
  caleandar();
  const $url = window.location.href;
  console.log($url);
  if ($url.includes(`program`)) {
    hideShow();
    addEventListener(`resize`, () => hideShow());
  }

  footerNavigation();
  addEventListener(`resize`, () => footerNavigation());
};

const hideShow = () => {
  console.log(`Hello, DOK`);
  const $innerwidth = window.innerWidth;
  $openCalendar.classList.remove(`hidden`);
  $calendar.setAttribute(`style`, `display: none`);
  $calendar.classList.add(`hidden`);

  if ($innerwidth < 500) {
    $filterMore.classList.remove(`hidden`);
    $tagTitle.classList.add(`hidden`);
    $tags.setAttribute(`style`, `display: none`);
  } else {
    $filterMore.classList.add(`hidden`);
    $tagTitle.classList.remove(`hidden`);
    $tags.setAttribute(`style`, `display: flex`);
  }

  $filterMore.addEventListener(`click`, clickMoreFilters);
  $openCalendar.addEventListener(`click`, clickOpenCalendar);
};

const clickMoreFilters = () => {
  if ($tagTitle.classList.contains(`hidden`)) {
    $tagTitle.classList.remove(`hidden`);
    $tags.setAttribute(`style`, `display: flex`);
    $filterMore.innerHTML = ` `;
    $filterMore.innerHTML = `Minder filters &#9651`;
  } else {
    $tagTitle.classList.add(`hidden`);
    $tags.setAttribute(`style`, `display: none`);
    $filterMore.innerHTML = ` `;
    $filterMore.innerHTML = `Meer filters &#9661`;
  }
};

const clickOpenCalendar = () => {
  if ($calendar.classList.contains(`hidden`)) {
    $calendar.classList.remove(`hidden`);
    $calendar.setAttribute(`style`, `display: flex`);
    $openCalendar.innerHTML = ` `;
    $openCalendar.innerHTML = `Sluit agenda &#9651`;
  } else {
    $calendar.classList.add(`hidden`);
    $calendar.setAttribute(`style`, `display: none`);
    $openCalendar.innerHTML = ` `;
    $openCalendar.innerHTML = `Open agenda &#9661`;
  }
};

const footerNavigation = () => {

  const $ulZone = document.createElement(`ul`);
  const $ulPrak = document.createElement(`ul`);


  prakArr.forEach(element => {
    const $liPrak = document.createElement(`li`);
    $liPrak.classList.add(`listItemPrak`);
    $liPrak.classList.add(`hidden`);
    $liPrak.innerHTML = element;
    $ulPrak.appendChild($liPrak);
  });

  zoneArr.forEach(element => {
    const $liZone = document.createElement(`li`);
    $liZone.classList.add(`listItemZones`);
    $liZone.classList.add(`hidden`);
    $liZone.innerHTML = element;
    $ulZone.appendChild($liZone);
  });

  $prakEl.appendChild($ulPrak);
  $zonesEl.appendChild($ulZone);

  const $innerwidth = window.innerWidth;
  if ($innerwidth < 500) {
    $prakLink.innerHTML = `Praktisch &#9661`;
    $zonesLink.innerHTML = `Zones &#9661`;
    $prakLink.classList.add(`closed`);
    $zonesLink.classList.add(`closed`);
  } else {
    $prakLink.innerHTML = `Praktisch`;
    $zonesLink.innerHTML = `Zones`;
  }

  $prakLink.addEventListener(`click`, openPraktisch);
  $zonesLink.addEventListener(`click`, openZones);

};

const openPraktisch = () => {
  if ($prakLink.classList.contains(`closed`)) {
    $prakLink.classList.remove(`closed`);
  } else {
    $prakLink.classList.add(`closed`);
  }

  if ($prakLink.classList.contains(`closed`)) {
    document.querySelectorAll(`.listItemPrak`).forEach(el => el.classList.add(`hidden`));
    $prakLink.innerHTML = `Praktisch &#9661`;
  } else {
    document.querySelectorAll(`.listItemPrak`).forEach(el => el.classList.remove(`hidden`));
    $prakLink.innerHTML = `Praktisch &#9651`;
  }

};

const openZones = () => {
  if ($zonesLink.classList.contains(`closed`)) {
    $zonesLink.classList.remove(`closed`);
    $zonesLink.innerHTML = `Zones &#9651`;
  } else {
    $zonesLink.classList.add(`closed`);
    $zonesLink.innerHTML = `Zones &#9661`;
  }

  if ($zonesLink.classList.contains(`closed`)) {
    document.querySelectorAll(`.listItemZones`).forEach(el => el.classList.add(`hidden`));
  } else {
    document.querySelectorAll(`.listItemZones`).forEach(el => el.classList.remove(`hidden`));
  }
};

init();
