document.addEventListener("DOMContentLoaded", () => {
    const textTitle = document.querySelector(".title > h1");
    const imgTitle = document.querySelector(".title > img");
    if (document.getElementById("top-container").offsetWidth <= 400) {
        textTitle.style.display = 'none';
        imgTitle.style.display = 'flex';
    }
    else {
        imgTitle.style.display = 'none';
        textTitle.style.display = 'flex';
    }
})

window.addEventListener("resize", () => {
    const textTitle = document.querySelector(".title > h1");
    const imgTitle = document.querySelector(".title > img");
    if (document.getElementById("top-container").offsetWidth <= 600) {
        textTitle.style.display = 'none';
        imgTitle.style.display = 'flex';
    }
    else {
        imgTitle.style.display = 'none';
        textTitle.style.display = 'flex';
    }
})

//Top Container - Dengarkan scroll pada .page-content
const top_container = document.getElementById("top-container");
const pageContent = document.querySelectorAll(".main-page");

if (pageContent) {
    pageContent.forEach((item, i) => {
        pageContent[i].addEventListener("scroll", () => {
            console.log("Masuk")    
            if (pageContent[i].scrollTop > 0) {
                console.log("Scrolled");
                top_container.classList.add("scrolled");
            } else {
                console.log("Not scrolled");
                top_container.classList.remove("scrolled");
            }
        });
    })
}