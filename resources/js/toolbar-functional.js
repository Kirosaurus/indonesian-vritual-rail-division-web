let sort_button_state = 0

let sort_by = [{
    by: 'price',
    active: 1
},
{
    by: 'name',
    active: 0
},
{
    by: 'rating',
    active: 0
}]

let is_ascending = 1


document.querySelectorAll(".sort").forEach((item, i) => {
    item.addEventListener("click", () => {
        // 1. Matikan (reset) nilai aktif di seluruh array sort_by dan hapus kelas CSS "active"
        document.querySelectorAll(".sort").forEach((btn, j) => {
            sort_by[j].active = 0;
            btn.classList.remove("active");
        });

        // 2. Tandai item yang baru saja diklik sebagai aktif (nilai 1) 
        sort_by[i].active = 1;

        // 3. Tambahkan class "active" secara visual ke dom tombol yang ditekan 
        item.classList.add("active");

        // (Opsional) Langsung sembunyikan dropdown kembali paska user memilih sortir:
        // document.querySelector(".sort-button").click(); 
    });
});

const sortirDropdown = document.querySelector(".sortir");
document.querySelector(".sort-button").addEventListener("click", () => {
    sort_button_state = !sort_button_state
    if (sort_button_state) {
        console.log("Hidup")
        document.querySelector(".sort-button").classList.add("active")
        if (sortirDropdown) {
            sortirDropdown.classList.add("show");
            document.querySelectorAll(".sort").forEach((item, i) => {
                setTimeout(() => {
                    item.classList.add("show");
                }, i * 100)
            })
        }
    }
    else {
        console.log("Mati")
        document.querySelector(".sort-button").classList.remove("active")
        if (sortirDropdown) {
            sortirDropdown.classList.remove("show");
            document.querySelectorAll(".sort").forEach((item, i) => {
                item.classList.remove("show");
            })
        }
    }
})

const ascdscButton = document.querySelector(".ascend-descend-button");
const ascdscImg = document.querySelector(".arrow-sort");

ascdscButton.addEventListener("click", () => {
    const ascdscText = ascdscButton.querySelector("span");
    is_ascending = !is_ascending;
    ascdscText.textContent = is_ascending ? "Ascending" : "Descending";
    if (is_ascending) {
        ascdscImg.classList.add("ascending")
        ascdscImg.classList.remove("descending")
    }
    else {
        ascdscImg.classList.add("descending")
        ascdscImg.classList.remove("ascending")
    }
});


//SEARCH BARRR
let search_active = 0;
const searchBox = document.querySelector(".search-input")
const searchIcon = document.querySelector(".search-icon")
const searchBar = document.querySelector(".search-bar")
const listSortir = document.querySelector(".list-sortir")
// const toolbar = document.querySelectorAll(".toolbar")
const leftTopContainer = document.querySelector(".left-top-container")

document.addEventListener("DOMContentLoaded", () => {
//     toolbar.forEach((item, i) => {
//         if (toolbar[i].offsetWidth <= 500) {
//             searchBox[i].classList.add("compact");
//             const ascdscText = ascdscButton[i].querySelectorAll("span");
//             if(toolbar[i].offsetWidth <= 300){
//                 ascdscText[i].style.display = 'none';
//             }
//             else{
//                 ascdscText[i].style.display = 'flex';
//             }
//         }
//         else {
//             searchBox[i].classList.remove("compact");
//         }
//     }
// )
})

window.addEventListener("resize", () => {
    // toolbar.forEach((item, i) => {
    //     if (toolbar[i].offsetWidth <= 500) {
    //         searchBox[i].classList.add("compact");
    //         const ascdscText = ascdscButton[i].querySelectorAll("span");
    //         if(toolbar[i].offsetWidth <= 300){
    //             ascdscText[i].style.display = 'none';
    //         }
    //         else{
    //             ascdscText[i].style.display = 'flex';
    //         }
    //     }
    //     else {
    //         searchBox[i].classList.remove("compact");
    //     }
    // })
})

searchIcon.addEventListener("mousedown", () => {
        event.preventDefault();
    })

searchBox.addEventListener("focus", () => {
        const topContainer = document.getElementById("top-container")
        if (!search_active) {
            if (topContainer.offsetWidth <= 600) {
                listSortir.classList.add("hide")
                sortirDropdown.classList.remove("show");
                document.querySelectorAll(".sort").forEach((item, i) => {
                    item.classList.remove("show");
                })
            }
            search_active = 1
            searchBox.classList.add("focus");
            searchBar.classList.add("focus");
            searchBox.focus();
        }
    })

searchIcon.addEventListener("click", () => {
        const topContainer = document.getElementById("top-container")
        if (!search_active) {
            if (topContainer.offsetWidth <= 600) {
                listSortir.classList.add("hide")
                sortirDropdown.classList.remove("show");
                document.querySelectorAll(".sort").forEach((item, i) => {
                    item.classList.remove("show");
                })
            }
            search_active = 1
            searchBox.classList.add("focus");
            searchBar.classList.add("focus");
            searchBox.focus();
        }
    })

searchBox.addEventListener("blur", () => {
        search_active = 0;
        searchBox.classList.remove("focus");
        searchBar.classList.remove("focus");
        setTimeout(() => {
            listSortir.classList.remove("hide");
        }, 1000);
    })

// document.addEventListener("DOMContentLoaded", () => {
//     ascdscText.textContent = is_ascending ? "Ascending" : "Descending";
//     document.querySelectorAll(".sort").forEach((item, i) => {
//         if (sort_by[i].active) {
//             item.classList.add("active")
//         }
//     })
// })


