const CarouselSlide = $("div.carousel-slide");
const CarouselImages = $("div.carousel-slide a");

//Buttons
const PrevBtn= $("button#prev");
const NextBtn= $("button#next");

//Counter
let counter =1;
const size= CarouselImages[0].clientWidth;

CarouselImages.style.transform = 'traslateX(' + (-size*counter) + 'px)';

PrevBtn.addActionListener('click',()=>{

});

