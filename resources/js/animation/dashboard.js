document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelectorAll(".top-bar-element").forEach((item, i) =>{
        setTimeout(()=>{
            item.classList.add("show");
        }, i*150)
    }) 
})

document.addEventListener("DOMContentLoaded", ()=>{
    document.querySelectorAll(".body-element").forEach((item, i) =>{
        setTimeout(()=>{
            item.classList.add("show");
        }, i*200)
    }) 
})

document.addEventListener("DOMContentLoaded", () => {
    const productCards = document.querySelectorAll('#list-product-pay-free > div[id="product"]');

    productCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(48px)';
        card.style.filter = 'blur(20px)'
        card.style.scale = '0.8'
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
            card.style.filter = 'blur(0px)';
            card.style.scale = '1';
        },  800 + index * 70);
    });
});

