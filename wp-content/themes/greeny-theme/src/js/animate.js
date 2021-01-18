
// Animate in
function animateInViewport() {
    let windowHeight = window.innerHeight;
    let elements = document.querySelectorAll('.animate:not(.activated):not(.animating)');
    let array = [];
    for (let i = 0; i < elements.length; i++) {
        let element = elements[i];
        let positionFromTop = elements[i].getBoundingClientRect().top;

        
        if (positionFromTop - windowHeight <= -150 || element.classList.contains('run')) {
            if(element.classList.contains('sequence')){
                element.classList.add('animating');
                array.push(element)
            } else{
                element.classList.add('activated');
            }
        }

    }
    if(array.length){
        array.forEach((elm,i)=>{
         setTimeout(()=>{
             elm.classList.add('activated');
         }, i*100)
        })  
    }
   
}

document.addEventListener('scroll', animateInViewport);
window.addEventListener('resize', animateInViewport);

animateInViewport();