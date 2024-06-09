import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value;

        if (query.length < 3) {
            searchResults.style.display = 'none';
            return;
        }

        fetch(`/search?q=${query}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(data => {
                searchResults.innerHTML = data;
                searchResults.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.style.display = 'none';
            });
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('.search-container')) {
            searchResults.style.display = 'none';
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    let page = 1;
    const container = document.getElementById('items-container');
    const loading = document.getElementById('loading');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function bindShowMoreButtons() {
        document.querySelectorAll('.mostrar-mas').forEach((button) => {
            button.addEventListener('click', () => {
                button.previousElementSibling.textContent += button.nextElementSibling.textContent;
                button.nextElementSibling.remove();
                button.remove();
            });
        });
    }

    bindShowMoreButtons();

    window.onscroll = function () {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
            loadMoreData(++page);
        }
    };

    function loadMoreData(page) {
        loading.style.display = 'block';

        fetch(`?page=${page}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(data => {
                if (data.trim().length == 0) {
                    loading.innerText = 'No hay más elementos para cargar.';
                    return;
                }
                container.insertAdjacentHTML('beforeend', data);
                loading.style.display = 'none';
                bindShowMoreButtons();
            })
            .catch(error => {
                console.log(error);
                loading.style.display = 'none';
            });
    }

    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value;

        if (query.length < 3) {
            searchResults.style.display = 'none';
            return;
        }

        fetch(`/search?q=${query}`, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(data => {
                searchResults.innerHTML = data;
                searchResults.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                searchResults.style.display = 'none';
            });
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('.search-container')) {
            searchResults.style.display = 'none';
        }
    });
});

$(document).ready(function(){

    $('#featured-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1
    });
});
