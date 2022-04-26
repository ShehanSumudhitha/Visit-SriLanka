/*==================== SRCOLL DOWN MENU HOVER ====================*/
window.addEventListener("scroll", function(){
    var nav = document.querySelector("nav");
    nav.classList.toggle("sticky", window.scrollY > 0); 
})



        function Slider() {
            let back = document.querySelector('.prev')
            let go   = document.querySelector('.next')
            let items= document.querySelectorAll('.slides')
            let i = 0;
            go.addEventListener('click', () => {
                i++
                if (items.length -1 < i) {
                    i = 0
                }
                items.forEach(item => {
                    item.classList.remove('active')
                })
                items[i].classList.add('active') 
            }) 
            back.addEventListener('click', () => {
                i--;
                if (0 >= i) {
                    i = 0
                }
                items.forEach(item => {
                    item.classList.remove('active')
                })
                items[i].classList.add('active')
                console.log(i)
            })  
        }
        Slider()