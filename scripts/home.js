// ПРОКРУЧИВАНИЕ СТРАНИЦЫ К ИНФОРМАЦИИ "ЧТО ЭТО?"
document.getElementById('StartExButton').addEventListener('click', function() {
    const element = document.getElementById('MainBlock-1');
    const elementPosition = element.getBoundingClientRect().top + window.scrollY; // Позиция блока относительно верхней части страницы
    const elementHeight = element.offsetHeight; // Высота блока
    const centerPosition = elementPosition + elementHeight / 2; // Центр блока
    const startPosition = window.scrollY; // Текущая позиция прокрутки
    const distance = centerPosition - startPosition - window.innerHeight / 2; // Расстояние до центра блока с учетом высоты окна
    const duration = 1000; // Длительность анимации
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const progress = Math.min(timeElapsed / duration, 1);

        const easeInOutQuad = (t) => t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;

        const scrollY = startPosition + distance * easeInOutQuad(progress);

        window.scrollTo(0, scrollY);

        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        }
    }
    requestAnimationFrame(animation);
});

document.getElementById('down-button').addEventListener('click', function() {
    const element = document.getElementById('MainBlock-2');
    const elementPosition = element.getBoundingClientRect().top + window.scrollY; // Позиция блока относительно верхней части страницы
    const elementHeight = element.offsetHeight; // Высота блока
    const centerPosition = elementPosition + elementHeight / 2; // Центр блока
    const startPosition = window.scrollY; // Текущая позиция прокрутки
    const distance = centerPosition - startPosition - window.innerHeight / 2; // Расстояние до центра блока с учетом высоты окна
    const duration = 1000; // Длительность анимации
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const progress = Math.min(timeElapsed / duration, 1);

        const easeInOutQuad = (t) => t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;

        const scrollY = startPosition + distance * easeInOutQuad(progress);

        window.scrollTo(0, scrollY);

        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        }
    }
    requestAnimationFrame(animation);
});

// ПОЯВЛЕНИЕ ТЕКСТА И КНОПКИ НА MAIN-1

document.addEventListener('DOMContentLoaded', () => {
    const objects = document.querySelectorAll('.StartPageAnimation-1');

    objects.forEach((obj, index) => {
        setTimeout(() => {
            obj.style.opacity = '1';
            obj.style.transform = 'translateY(0)';
        }, index * 500);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const objects = document.querySelectorAll('.startEx-button');

    objects.forEach((obj, index) => {
        setTimeout(() => {
            obj.style.opacity = '1';
            obj.style.transform = 'translateY(0)';
        }, index * 500);
    });
});

// ПОЯВЛЕНИЕ КАРТИНКИ И ТЕКСТА ПРИМЕРА

document.addEventListener("DOMContentLoaded", function() {
    const imageBox = document.querySelector('.mb2-image-box');

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const callback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                imageBox.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(callback, options);
    observer.observe(imageBox);
});

document.addEventListener("DOMContentLoaded", function() {
    const imageBox = document.querySelector('.mb2-desc-box');

    const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const callback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                imageBox.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(callback, options);
    observer.observe(imageBox);
});


function goToExPage() {
    window.location.href = '/excursions.php';
}

function goToAdminP() {
    window.location.href = '/adminPage.php';
}