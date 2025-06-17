const toggle = document.getElementById('navbar-toggle');
const links = document.getElementById('navbar-links');
links.classList.add('transition-all', 'duration-400', 'ease-in-out', 'overflow-hidden');
links.style.maxHeight = "0";
links.classList.add('hidden');

let isTransitioning = false;

toggle.addEventListener('click', () => {
if (isTransitioning) return;
isTransitioning = true;
if (links.classList.contains('hidden')) {
    links.classList.remove('hidden');
    void links.offsetWidth;
    links.style.maxHeight = "125px";
} else {
    links.style.maxHeight = "0";
}
});

links.addEventListener('transitionend', () => {
if (links.style.maxHeight === "0px" || links.style.maxHeight === "0") {
    links.classList.add('hidden');
} else {
    links.style.maxHeight = "125px";
}
isTransitioning = false;
});