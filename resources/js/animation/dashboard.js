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