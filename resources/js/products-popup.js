const modal = document.getElementById('product-modal');
const nameEl = document.getElementById('modal-name');
const descEl = document.getElementById('modal-desc');
const priceEl = document.getElementById('modal-price');
const imgEl = document.querySelectorAll('.modal-thumb');
const overlay = document.querySelector('.modal-overlay');

const whatsappList = document.querySelectorAll(".whatsapp-contact > a");

const waLink = ['https://wa.me/+6281366950138', 'https://wa.me/+6289601056281']
const productListContainer = document.getElementById('list-product-pay-free');

// Utility function untuk format harga dengan separator

productListContainer.addEventListener('click', function(e) {
    // Cari product card terdekat yang diklik
    const card = e.target.closest('.product-card');
    if (!card) return;
    
    const name = card.dataset.name;
    const desc = card.dataset.desc;
    let price = card.dataset.price;
    const text = card.dataset.text;

    price = parseInt(price)
        price = price.toLocaleString('id-ID',{
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    // Update WhatsApp links
    whatsappList.forEach((item, i) => {
        item.href = waLink[i] + '?text=' + encodeURIComponent(text);
    });

    // Ambil images dan tags dari data attribute
    const images = JSON.parse(card.dataset.img || '[]');
    const tags = JSON.parse(card.dataset.tags || '[]');

    // Update modal info
    document.querySelector('#modal-name').textContent = name;

    const formattedPrice = price ? 'Rp ' + price : 'FREE';
    document.querySelector('#modal-price').textContent = formattedPrice;
    
    document.querySelector('#modal-desc').textContent = desc;
    
    // Update thumbnail utama
    const mainThumb = document.querySelector('#modal-thumb-viewer img');
    mainThumb.src = images.length > 0 ? images[0] : 'storage/image-products/unknownThumbnail.png';

    // Generate thumbnail list
    const listThumbnail = document.querySelector('#list-thumbnail');
    const listTags = document.querySelector('#tag-products');

    listThumbnail.innerHTML = images.map((img, index) => `
        <div class="additional-thumbnails">
            <img class="modal-thumb" src="${img}" alt="Product image" data-index="${index}" />
        </div>
    `).join('');

    listTags.innerHTML = tags.map((tag, index) => `
        <div class="tag">
            <span>${tag}</span>
        </div>
    `).join('');

    // Click handler untuk thumbnail kecil
    listThumbnail.querySelectorAll('img').forEach(thumb => {
        thumb.addEventListener('click', function () {
            mainThumb.src = this.src;
            listThumbnail.querySelectorAll('img').forEach(t => t.style.opacity = '0.6');
            this.style.opacity = '1';
        });
    });

    // Show modal
    modal.classList.remove('hidden');
    overlay.classList.remove("hidden");
});

// Function untuk menutup modal
const closeModal = () => {
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
    overlay.classList.add('hidden');
};

// Modal close handler - gunakan event delegation
modal.addEventListener('click', (e) => {
    const closeBtn = e.target.closest('[data-close="true"]');
    if (closeBtn) {
        closeModal();
    }
});

// Handle overlay click juga
document.addEventListener('click', (e) => {
    if (e.target.dataset.close === 'true') {
        closeModal();
    }
});