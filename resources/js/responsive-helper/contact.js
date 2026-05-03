const social_media_compact = () => {
    const social_media = document.querySelector(".social-media-section")

    if (social_media.offsetWidth <= 570) {
        console.log("Compact")
        social_media.classList.add("compact")
    }
    else {
        console.log("Remove")
        social_media.classList.remove("compact")
    }

}

window.addEventListener("DOMContentLoaded", social_media_compact);

window.addEventListener("resize", social_media_compact);