"use strict";
const dailyBtn = document.querySelector("#dailyRad");
const specialBtn = document.querySelector("#specialRad");
const special = document.querySelector(".special");
const daily = document.querySelectorAll(".daily");

// Special and daily trip selection
specialBtn.addEventListener("click", function () {
  console.log("Special was selected");
  special.classList.remove("hidden");

  for (let i = 0; i < daily.length; i++) {
    daily[i].classList.add("hidden");
  }
});
dailyBtn.addEventListener("click", function () {
  console.log("Daily was selected");
  special.classList.add("hidden");

  for (let i = 0; i < daily.length; i++) {
    daily[i].classList.remove("hidden");
  }
});
