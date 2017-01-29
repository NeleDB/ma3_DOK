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
  const $url = window.location.href;
  //console.log($url);
  if ($url.includes(`program`)) {
    caleandar();
    hideShowFilter();
    addEventListener(`resize`, () => hideShowFilter());
  } else if ($url.includes(`detail`)) {
    console.log(`detail`);
  } else {
    console.log(`index`);
    validateEmail();
  }

  footerNavigation();
  addEventListener(`resize`, () => footerNavigation());

  const $innerwidth = window.innerWidth;
  if ($innerwidth < 500) {
    $prakLink.classList.add(`closed`);
    $prakLink.innerHTML = `Praktisch &#9661`;
    $zonesLink.classList.add(`closed`);
    $zonesLink.innerHTML = `Zones &#9661`;
  }
};

const hideShowFilter = () => {
  //console.log(`Hello, DOK`);
  const $innerwidth = window.innerWidth;
  $openCalendar.classList.remove(`hidden`);
  $calendar.setAttribute(`style`, `display: none`);
  $calendar.classList.add(`hidden`);
  $openCalendar.innerHTML = `Open agenda &#9661`;

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

  const $innerwidth = window.innerWidth;

  if ($innerwidth < 500) {
    $prakLink.classList.add(`closed`);
    $zonesLink.classList.add(`closed`);
    if ($prakLink.classList.contains(`closed`)) {
      $prakLink.innerHTML = `Praktisch &#9661`;
    }
    if ($zonesLink.classList.contains(`closed`)) {
      $zonesLink.innerHTML = `Zones &#9661`;
    }
    console.log(`500`);
    $prakLink.addEventListener(`click`, openPraktisch);
    $zonesLink.addEventListener(`click`, openZones);
  } else if ($innerwidth > 500) {
    $prakLink.innerHTML = `Praktisch`;
    $zonesLink.innerHTML = `Zones`;
  }
};

const openPraktisch = () => {
  const $ulPrak = document.createElement(`ul`);

  if ($prakLink.classList.contains(`closed`)) {
    $prakLink.classList.remove(`closed`);
  } else {
    $prakLink.classList.add(`closed`);
  }

  if ($prakLink.classList.contains(`closed`)) {
    document.querySelectorAll(`.listItemPrak`).forEach(el => el.remove(el));
    $prakLink.innerHTML = `Praktisch &#9661`;
  } else {
    prakArr.forEach(element => {
      const $liPrak = document.createElement(`li`);
      $liPrak.classList.add(`listItemPrak`);
      $liPrak.innerHTML = element;
      $ulPrak.appendChild($liPrak);
    });
    $prakEl.appendChild($ulPrak);
    $prakLink.innerHTML = `Praktisch &#9651`;
  }

};

const openZones = () => {
  const $ulZones = document.createElement(`ul`);

  if ($zonesLink.classList.contains(`closed`)) {
    $zonesLink.classList.remove(`closed`);
  } else {
    $zonesLink.classList.add(`closed`);
  }

  if ($zonesLink.classList.contains(`closed`)) {
    document.querySelectorAll(`.listItemZones`).forEach(el => el.remove(el));
    $zonesLink.innerHTML = `Zones &#9661`;
  } else {
    $zonesLink.innerHTML = `Zones &#9651`;
    zoneArr.forEach(element => {
      const $liZone = document.createElement(`li`);
      $liZone.classList.add(`listItemZones`);
      $liZone.innerHTML = element;
      $ulZones.appendChild($liZone);
    });
    $zonesEl.appendChild($ulZones);
  }
};

const validateEmail = () => {
  const $submitButton = document.querySelector(`.nieuwsbrief-button`);
  $submitButton.addEventListener(`click`, checkEmail);
};

const checkEmail = e => {
  console.log(e);
  const $email = document.querySelector(`.nieuwsbrief-input`);
  const $error = document.querySelector(`.error`);
  if (valueMissing($email) !== ``) {
    $error.innerHTML = valueMissing($email);
  } else {
    $error.innerHTML = typeMismatch($email);
  }
};

const valueMissing = $veld => {
  if ($veld.validity.valueMissing) {
    return `U heeft niets ingevuld`;
  }
  return ``;
};

const typeMismatch = $veld => {
  if ($veld.validity.typeMismatch) {
    return `Geen geldig e-mail adres`;
  }
  return ``;
};

init();
