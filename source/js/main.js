import controller from "./conttroler";
import Flickity from "./flickity.pkgd";

const elem = document.querySelector('.main-gallery');
const flkty = new Flickity( elem, {
    // options
    cellAlign: 'left',
    contain: true,
    wrapAround: true,
    adaptiveHeight: true
});

/*const burger = document.querySelector('.toggle')
const burgerSpan = document.querySelector('.burger-menu')
const navElt = document.querySelector('nav')
const ulElt = document.querySelector('nav ul')
const bodyElt = document.querySelector('body')


burger.addEventListener('click', ()=>{
    if(ulElt.style.position !== 'relative'){
        burgerSpan.style.transform = "rotate(180deg)"
        ulElt.style.position = 'relative'
        ulElt.style.textIndent = '0px'
        ulElt.style.overflow = 'visible'
        ulElt.style.left = 0
        navElt.style.marginTop = '0'
        ulElt.classList.add('active')
        navElt.classList.add('active')

        //script for no scrolling when nav is visible
        window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
        window.addEventListener('touchmove', preventDefault, false); // mobile
        window.addEventListener('keydown', preventDefaultForScrollKeys, false);

    }else{
        burgerSpan.style.transform = "rotate(0deg)"
        ulElt.style.position = 'absolute'
        ulElt.style.textIndent = '-9999px'
        ulElt.style.overflow = 'none'
        ulElt.classList.remove('active')
        navElt.classList.remove('active')

        //script for scrolling when nav isn't visible
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.removeEventListener('touchmove', preventDefault, true);
        window.removeEventListener('keydown', preventDefaultForScrollKeys, false);


    }
})*/

const burger = document.querySelector('.toggle')
const navElt = document.querySelector('nav')
const burgerSpan = document.querySelector('.burger-menu')
// program for mobile
burger.addEventListener('touchstart', (e) => {
    e.preventDefault()
    if (navElt.className === 'no-active') {
        burgerSpan.style.transform = "rotate(180deg)"
        window.document.body.style.overflow = 'hidden'
        navElt.style.top = 0 + 'px'
        navElt.classList.add('active')
        navElt.classList.remove('no-active')

    } else {
        window.document.body.style.overflow = 'visible'
        burgerSpan.style.transform = "rotate(0deg)"

        navElt.classList.remove('active')
        navElt.classList.add('no-active')
    }
})
// program for laptop
burger.addEventListener('mousedown', (e) => {
    e.preventDefault()
    if (navElt.className === 'no-active') {
        burgerSpan.style.transform = "rotate(180deg)"
        window.document.body.style.overflow = 'hidden'
        navElt.style.top = 0 + 'px'
        navElt.classList.add('active')
        navElt.classList.remove('no-active')

    } else {
        window.document.body.style.overflow = 'visible'
        burgerSpan.style.transform = "rotate(0deg)"

        navElt.classList.remove('active')
        navElt.classList.add('no-active')
    }
})
window.ontouchmove = (e) => {
    e.preventDefault()
    let homeLink = document.querySelector('.home__link')
    let homeContainer = document.querySelector('.home__container')
    if (window.scrollY > 100) {

        homeLink.style.fontSize = '1.2rem';
        homeLink.style.lineHeight = '1.2';
        homeLink.querySelector('span').style.letterSpacing = '4.3px';
        homeLink.style.width = '150px';
        homeLink.style.marginTop = '15rem'

        homeContainer.style.height = '70px';
        //homeContainer.style.height= '80px'; box

    }
    if (window.scrollY < 100) {

        homeLink.style.fontSize = '1.8rem';
        homeLink.style.lineHeight = '1.2';
        homeLink.querySelector('span').style.letterSpacing = '6.3px';
        homeLink.style.width = '200px';

        homeContainer.style.height = '100px';
    }

}
window.onscroll = (e) => {
    e.preventDefault()
    let homeLink = document.querySelector('.home__link')
    let homeContainer = document.querySelector('.home__container')
    if (window.scrollY > 100) {
        homeLink.style.fontSize = '1.3rem';
        homeLink.style.lineHeight = '1.2';
        homeLink.querySelector('span').style.letterSpacing = '4.3px';
        homeLink.style.width = '150px';

        homeContainer.style.height = '70px';
        //homeContainer.style.height= '80px'; box

    }
    if (window.scrollY < 100) {

        homeLink.style.fontSize = '1.8rem';
        homeLink.style.lineHeight = '1.2';
        homeLink.querySelector('span').style.letterSpacing = '6.3px';
        homeLink.style.width = '200px';

        homeContainer.style.height = '100px';

    }

}

if (window.innerWidth >= 1020) {
    let home = document.querySelector('.header')
    let divContainer = document.createElement('div')
    divContainer.classList.add('moveImg-container')

    for (let i = 1; i < 6; i++) {
        let image = document.createElement('img')
        image.classList.add('moveImg', `img-${i}`)
        image.src = `http://localhost/isn_wordpress/wp-content/themes/isn/assets/img/move/${i}.jpg`
        image.dataset.move = (Math.random()*2 - 2 );
        divContainer.insertAdjacentElement('beforeend', image)
    }

    home.insertAdjacentElement('afterbegin', divContainer);


    addEventListener('mousemove', (e) => {
        console.log(e.clientX, e.clientY)
    })

    const img = document.querySelectorAll(".moveImg");

    function moveThis(x, y) {

        img.forEach(e => {
            let test = e.dataset.move
            e.style.transform = `translate(${test * x}px, ${test * y}px)`;
        })
    }

    /*
        Calculer la distance que s'épare le cursor avec les images et les déplacer et pas les positionner d'un coup
     */

    let positionX = null;
    let positionY = null;
    document.onmousemove = ev => {
        positionX = (window.innerWidth / 2 - ev.x) / 4;
        positionY = -ev.y / 5;
        moveThis(positionX, positionY)
    }


}
/*
let keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
    e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

const bck = {
    canvas: null,
    ctx:null,
    img:[],
    spriteUrl:'http://nicolas-gilson.site/isn/dist/assets/img/spriteSheet.jpg',
    sprite: new Image(),
    x:50,
    y: 50,
    
    init(){
        this.header = document.querySelector('header.home')
        this.canvas = document.createElement('canvas')
        //this.canvas.width = '50%'
        //this.canvas.height = '100%'
        window.addEventListener('load', ()=>{
            this.resizeCanvas()
        })

        this.header.appendChild(this.canvas)
        this.ctx = this.canvas.getContext('2d')
        controller.init(this);

        window.addEventListener('resize', ()=>{
            this.resizeCanvas()
        })

        this.sprite.src = this.spriteUrl
        this.canvas.style.position = 'absolute'
        this.canvas.style.top = '0'
        this.canvas.style.left = '5%'
        this.canvas.style.zIndex = '-5'
        this.animate()
    },
    resizeCanvas(){
        this.canvas.width = window.innerWidth/0.5
        this.canvas.height = window.innerHeight
    },

    draw(){
        this.ctx.save()
        this.ctx.translate(0,0)
        this.ctx.drawImage(this.sprite, 0,0, 1456, 2186, this.x + 0 , this.y + 0, 350, 525)
        this.ctx.restore()

        this.ctx.save()
        this.ctx.translate(0,0)
        this.ctx.drawImage(this.sprite, 1518,0, 1453, 1093, 350 + (2*this.x), (this.y*0.5) +20, 350, 263)
        this.ctx.restore()

        this.ctx.save()
        this.ctx.translate(0,0)
        this.ctx.drawImage(this.sprite, 3040, 0, 1453, 1446, 800 + (1.5*this.x), this.y +100 , 350, 350)
        this.ctx.restore()


        this.ctx.save()
        this.ctx.translate(0,0)
        this.ctx.drawImage(this.sprite, 4553,0, 1456, 1446, 150 + (2.5*this.x), 400+ (1.5*this.y), 350, 350)
        this.ctx.restore()


        this.ctx.save()
        this.ctx.translate(0,0)
        this.ctx.drawImage(this.sprite, 6077,0, 1456, 960, 750 + (0.6*this.x), 400 + (this.y*1.5), 350, 333)
        this.ctx.restore()
    },

    animate(){
        this.ctx.clearRect(0,0, this.canvas.width, this.canvas.height)

        controller.update()
        this.draw()
        window.requestAnimationFrame(()=>{
            this.animate()
        })
    }
}
if(window.innerWidth >1000){
    bck.init()
}*/
