function changeImage(img) { document.getElementById('mainImage').src = img.src }
function qty(val) {
    let q = document.getElementById('quantity');
    let n = parseInt(q.value) + val;
    if (n < 1) n = 1;
    q.value = n;
}


//checkout page scripts

function updateQty(btn, change) {
    const input = btn.parentElement.querySelector('.qty-input');
    let qty = parseInt(input.value) + change;
    if (qty < 1) qty = 1;
    input.value = qty;
    updateTotals();
}
function removeItem(span) {
    span.closest('li').remove();
    updateTotals();
}
function updateTotals() {
    let subtotal = 0;
    document.querySelectorAll('#order-items li').forEach(li => {
        const price = parseInt(li.querySelector('.item-price').textContent.replace('$', ''));
        const qty = parseInt(li.querySelector('.qty-input').value);
        subtotal += price * qty;
    });
    document.getElementById('subtotal').textContent = `$${subtotal}`;
    const delivery = parseInt(document.getElementById('delivery-charge').textContent.replace('$', ''));
    document.getElementById('total').textContent = `$${subtotal + delivery}`;
}

// product details page scripts


function qty(val) {
    let q = document.getElementById('quantity');
    let v = parseInt(q.value);
    if (v + val >= 1) q.value = v + val;
}

function slideTo(index, el) {
    let slider = new bootstrap.Carousel(document.getElementById('productSlider'));
    slider.to(index);
    document.querySelectorAll('.thumb-img').forEach(i => i.classList.remove('active'));
    el.classList.add('active');
}

document.querySelectorAll('.size-btn').forEach(btn => {
    btn.onclick = () => {
        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }
});

document.querySelectorAll('.color-btn').forEach(btn => {
    btn.onclick = () => {
        document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    }
});

// view cart page scripts


function updateQty(btn, change) {
    const input = btn.parentElement.querySelector('.qty-input');
    let qty = parseInt(input.value) + change;
    if (qty < 1) qty = 1;
    input.value = qty;
    updateTotals();
}
function removeItem(span) {
    span.closest('li').remove();
    updateTotals();
}
function updateTotals() {
    let subtotal = 0;
    document.querySelectorAll('#cart-items li').forEach(li => {
        const price = parseInt(li.querySelector('.item-price').textContent.replace('$', ''));
        const qty = parseInt(li.querySelector('.qty-input').value);
        subtotal += price * qty;
    });
    document.getElementById('subtotal').textContent = `$${subtotal}`;
    const delivery = parseInt(document.getElementById('delivery-charge').textContent.replace('$', ''));
    document.getElementById('total').textContent = `$${subtotal + delivery}`;
}
function slideTo(index, el) {
        const slider = document.querySelector('#productSlider');
        const carousel = bootstrap.Carousel.getInstance(slider) || new bootstrap.Carousel(slider);
        carousel.to(index);

        document.querySelectorAll('.thumb-img').forEach(img => img.classList.remove('active'));
        el.classList.add('active');
    }

    function qty(change) {
        let input = document.getElementById('quantity');
        let val = parseInt(input.value) || 1;
        val += change;
        if (val < 1) val = 1;
        input.value = val;
    }

    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    document.querySelectorAll('.color-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

   