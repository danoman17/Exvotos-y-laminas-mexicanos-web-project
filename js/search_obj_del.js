const button = document.querySelectorAll('.btn_img');
const overlay = document.querySelector('.overlay');
const overlayImage = document.querySelector('.overlay-inner img');

function open(a){
    overlay.classList.add('open');
    const src = a.target.parentNode.parentNode.querySelector('img').src;
    console.log(src);

    overlayImage.src = src;
}

function close(){
    overlay.classList.remove('open');
}
button.forEach(button => button.addEventListener('click', open));
overlay.addEventListener('click',close);