const modal = document.getElementById('product-modal');
const nameEl = document.getElementById('modal-name');
const descEl = document.getElementById('modal-desc');
const priceEl = document.getElementById('modal-price');
const imgEl = document.querySelectorAll('.modal-thumb');
const overlay = document.querySelector('.modal-overlay');

const whatsappList = document.querySelectorAll(".whatsapp-contact > a");

const waLink = ['https://wa.me/+6281366950138', 'https://wa.me/+6289601056281']

document.querySelectorAll('.product-card').forEach(card => {
  card.addEventListener('click', function () {
    const name = this.dataset.name;
    const desc = this.dataset.desc;
    const price = this.dataset.price;
    const text = this.dataset.text;

    whatsappList.forEach((item, i) => {
      item.href = waLink[i] + '?text=' + text;
    })
    // Ambil semua images dari data attribute (JSON)
    const images = JSON.parse(this.dataset.img || '[]');
    const tags = JSON.parse(this.dataset.tags || '[]');

    // Update modal info
    document.querySelector('#modal-name').textContent = name;
    document.querySelector('#modal-price').textContent = 'Rp ' + price;
    document.querySelector('#modal-desc').textContent = desc;
    overlay.classList.remove("hidden");
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
        // Optional: highlight active thumbnail
        listThumbnail.querySelectorAll('img').forEach(t => t.style.opacity = '0.6');
        this.style.opacity = '1';
      });
    });

    // Show modal
    document.getElementById('product-modal').classList.remove('hidden');
  });
});

modal.addEventListener('click', (e) => {
  if (e.target.dataset.close === 'true') {
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
    overlay.classList.add('hidden');
  }
});