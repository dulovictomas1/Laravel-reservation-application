import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { registerSW } from 'virtual:pwa-register';

registerSW({ immediate: true });


//Slider HOME
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;
    const intervalTime = 3000; // Čas v milisekundách (3 sekundy)

    setInterval(() => {
        // Odstráni triedu 'active' z aktuálneho obrázka
        slides[currentIndex].classList.remove("active");

        // Posunie index na ďalší obrázok (ak je na konci, vráti sa na 0)
        currentIndex = (currentIndex + 1) % slides.length;

        // Pridá triedu 'active' novému obrázku
        slides[currentIndex].classList.add("active");
    }, intervalTime);
});




document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.querySelector(".menu-toggle");
    const nav = document.querySelector(".main-nav");

    // Otváranie / zatváranie menu
    toggle.addEventListener("click", function () {
        toggle.classList.toggle("active");
        nav.classList.toggle("active");
    });


    const closebtn = document.querySelector(".btn_close_secess");
    const wrap = document.querySelector(".wrap");

    closebtn.addEventListener('click', function () {
        wrap.classList.toggle('hidden');
        }, false);

});