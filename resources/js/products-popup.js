const modal = document.getElementById('product-modal');
const nameEl = document.getElementById('modal-name');
const descEl = document.getElementById('modal-desc');
const priceEl = document.getElementById('modal-price');
const imgEl = document.querySelectorAll('.modal-thumb');
const overlay = document.querySelector('.modal-overlay');

document.querySelectorAll('.product-card').forEach(card => {
  card.addEventListener('click', () => {
    nameEl.textContent = card.dataset.name;
    descEl.textContent = card.dataset.desc;
    priceEl.textContent = card.dataset.price;
    overlay.classList.remove('hidden');
    imgEl.forEach((item) => {
      item.src = card.dataset.img;
    });

    modal.classList.remove('hidden');
    modal.setAttribute('aria-hidden', 'false');
  });
});

modal.addEventListener('click', (e) => {
  if (e.target.dataset.close === 'true') {
    modal.classList.add('hidden');  
    modal.setAttribute('aria-hidden', 'true');
    overlay.classList.add('hidden');
  }
});