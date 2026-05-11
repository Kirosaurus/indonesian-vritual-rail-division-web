document.addEventListener("DOMContentLoaded", () => {
    const searchBox = document.getElementById('search-box');
    const sortButton = document.querySelector('.sort-button');
    const ascDescButton = document.querySelector('.ascend-descend-button');
    const sortOptions = document.querySelectorAll('.sort');
    const sortMenu = document.querySelector('.sortir');

    let currentSort = 'name'; // Default sort
    let currentOrder = 'ASC';

    // Search functionality
    searchBox.addEventListener('input', (e) => {
        const searchTerm = e.target.value;
        fetchProducts({ search: searchTerm, sort_by: currentSort, order: currentOrder });
    });

    // Sort menu toggle
    sortButton.addEventListener('click', () => {
        sortMenu.style.display = sortMenu.style.display === 'none' ? 'block' : 'none';
    });

    // Sort option selection
    sortOptions.forEach(option => {
        option.addEventListener('click', () => {
            currentSort = option.textContent.toLowerCase();
            sortMenu.style.display = 'none';
            fetchProducts({ sort_by: currentSort, order: currentOrder, search: searchBox.value });
        });
    });

    // Ascending/Descending toggle
    ascDescButton.addEventListener('click', () => {
        currentOrder = currentOrder === 'ASC' ? 'DESC' : 'ASC';
        const arrow = document.querySelector('.arrow-sort');
        const text = ascDescButton.querySelector('span');

        arrow.style.transform = currentOrder === 'DESC' ? 'rotate(180deg)' : 'rotate(0deg)';
        text.textContent = currentOrder === 'ASC' ? 'Ascending' : 'Descending';

        fetchProducts({ sort_by: currentSort, order: currentOrder, search: searchBox.value });
    });

    // Fetch products from backend
    function fetchProducts(filters) {
        const params = new URLSearchParams(filters);

        fetch(`/payware?${params.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                updateProductList(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Update product list di DOM
    function updateProductList(products) {
        console.log(products)
        const productList = document.getElementById('list-product-pay-free');
        productList.innerHTML = '';

        products.forEach(product => {
            const imagePath = product.images && product.images.length > 0
                ? `/storage/${product.images[0].path}`
                : '/storage/image-products/unknownThumbnail.png';

            const imagePaths = product.images
                ? product.images.map(img => `/storage/${img.path}`)
                : [];

            const tags = product.tags ? product.tags.map(tag => tag.name) : [];

            const text = `Halo minn, saya tertarik untuk melakukan pembelian dari katalog dengan nama item '${product.name}' Mau tanya-tanya dulu dong minn 🙌🙌`;

            const formatedPrice = formatPrice(product.price)

            const productCard = document.createElement('div');
            productCard.className = 'product-card';
            productCard.id = 'product';
            productCard.setAttribute('data-name', product.name);
            productCard.setAttribute('data-desc', product.description);
            productCard.setAttribute('data-price', product.price);
            productCard.setAttribute('data-img', JSON.stringify(imagePaths));
            productCard.setAttribute('data-tags', JSON.stringify(tags));
            productCard.setAttribute('data-text', text);

            productCard.innerHTML = `
            <div class="thumbnail-product">
                <img src="${imagePath}" class="thumbnail-img" alt="">
            </div>
            <p class="nama-produk">${product.name}</p>
            <p class="deskripsi-singkat-produk">${product.description}</p>
            <div class="container-harga">
                <span>Rp ${formatedPrice}</span>
            </div>
        `;

            productList.appendChild(productCard);
        });
    }

});

function formatPrice(price) {
    if (!price || price === 'FREE' || price === 0) return 'FREE';
    price = parseInt(price);
    price = price.toLocaleString('id-ID', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    })
    return price;
}