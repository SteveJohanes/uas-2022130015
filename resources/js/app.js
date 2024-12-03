import './bootstrap';
import * as bootstrap from 'bootstrap';


import 'bootstrap/dist/js/bootstrap.bundle.min.js';

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.country-card');

    function showCardsOnScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const windowHeight = window.innerHeight;

        cards.forEach((card, index) => {
            const cardTop = card.getBoundingClientRect().top + scrollTop;

            if (scrollTop + windowHeight > cardTop) {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 200);
            }
        });
    }

    window.addEventListener('scroll', showCardsOnScroll);
    showCardsOnScroll();
});
