document.addEventListener("DOMContentLoaded", () => {
    const topBarItems = document.querySelectorAll('.top-bar-element');
    const toolbarItems = document.querySelectorAll('.sort-button, .search-bar, .ascend-descend-button');
    const productCards = document.querySelectorAll('#list-product-payware > div[id="product"]');

    topBarItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(-18px)';
        setTimeout(() => {
            item.style.transition = 'all 0.35s ease-out';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, index * 120);
    });

    toolbarItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(-18px)';
        setTimeout(() => {
            item.style.transition = 'all 0.35s ease-out';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, 180 + index * 110);
    });

    productCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(24px)';
        setTimeout(() => {
            card.style.transition = 'all 0.45s ease-out';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 340 + index * 70);
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.sort').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(12px)';
        setTimeout(() => {
            item.style.transition = 'all 0.3s ease-out';
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        }, 260 + index * 80);
    });
});

const productList = document.querySelector('#list-product-payware');
if (productList) {
    productList.addEventListener('mouseover', (event) => {
        const card = event.target.closest('#product');
        if (!card) return;
        card.style.transition = 'all 0.25s ease-out';
        card.style.transform = 'translateY(-4px)';
        card.style.boxShadow = '0 12px 25px rgba(0, 0, 0, 0.12)';
    });

    productList.addEventListener('mouseout', (event) => {
        const card = event.target.closest('#product');
        if (!card) return;
        card.style.transform = 'translateY(0)';
        card.style.boxShadow = 'none';
    });
}




