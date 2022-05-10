function toggleRegister() {
    document.getElementById('register').classList.toggle('hidden');
}

function toggleLogin() {
    document.getElementById('login').classList.toggle('hidden');
}

// masonry

let grid = document.querySelector('.grid');

let masonry = new masonry(grid, {
    itemSelector:'.grid-item',
    gutter:10
})