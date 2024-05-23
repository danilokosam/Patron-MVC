var app = document.getElementById('app');

var typewriter = new Typewriter(app, {
    loop: true
});

typewriter.typeString('Web Developer')
    .pauseFor(2500)
    .deleteAll()
    .typeString('Daniel Duarte')
    .pauseFor(2500)
    .deleteAll()
    .typeString('<strong>Blog Brawlers</strong>')
    .pauseFor(2500)
    .start();