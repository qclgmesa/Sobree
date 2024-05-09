function loadCartItemsForReceipt() {
    const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    let subtotal = 0;

    cartItems.forEach(item => {
        const row = document.createElement('div');
        row.className = 'row';
        row.innerHTML = `
            <div class="col">${item.name}</div>
            <div class="col">${item.quantity}</div>
            <div class="col">${(parseFloat(item.price) * parseInt(item.quantity)).toFixed(2)}</div>
        `;
        cartItemsContainer.appendChild(row);
        subtotal += parseFloat(item.price) * parseInt(item.quantity||0);
    });

    const subtotalElement = document.getElementById('subtotal');
    const taxes = subtotal * 0.12; // Assuming 12% tax
    const total = subtotal + taxes;

    subtotalElement.textContent = subtotal.toFixed(2);
    document.getElementById('taxes').textContent = taxes.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);
}

document.addEventListener('DOMContentLoaded', loadCartItemsForReceipt);
