// Dummy product data, replace this with actual product data fetched from the server
const products = [
    { id: 1, name: 'Product A', price: 10.00 },
    { id: 2, name: 'Product B', price: 15.00 },
    // Add more products as needed
];

// Initialize product table
const productTable = document.getElementById('product-table');
populateProductTable();

function populateProductTable() {
    // Add table header
    const headerRow = productTable.insertRow();
    headerRow.insertCell().textContent = 'ID';
    headerRow.insertCell().textContent = 'Product Name';
    headerRow.insertCell().textContent = 'Price';

    // Add products to the table
    products.forEach(product => {
        const row = productTable.insertRow();
        row.insertCell().textContent = product.id;
        row.insertCell().textContent = product.name;
        row.insertCell().textContent = product.price.toFixed(2);
        row.onclick = function () {
            showProductDetails(product);
        };
    });
}

// Initialize order summary table
const orderSummaryTable = document.getElementById('order-summary');
let orderItems = [];

function showProductDetails(product) {
    const qty = prompt(`Enter quantity for ${product.name}:`);
    if (qty !== null) {
        const orderItem = {
            id: product.id,
            name: product.name,
            qty: parseInt(qty, 10),
            price: product.price,
        };
        orderItems.push(orderItem);
        updateOrderSummaryTable();
    }
}

function updateOrderSummaryTable() {
    // Clear the table
    orderSummaryTable.innerHTML = '';

    // Add table header
    const headerRow = orderSummaryTable.insertRow();
    headerRow.insertCell().textContent = 'ID';
    headerRow.insertCell().textContent = 'Product Name';
    headerRow.insertCell().textContent = 'Quantity';
    headerRow.insertCell().textContent = 'Price';
    headerRow.insertCell().textContent = 'Total';
    headerRow.insertCell(); // Empty cell for delete button

    // Add order items to the table
    let totalAmount = 0;
    orderItems.forEach(item => {
        const row = orderSummaryTable.insertRow();
        row.insertCell().textContent = item.id;
        row.insertCell().textContent = item.name;
        row.insertCell().textContent = item.qty;
        row.insertCell().textContent = item.price.toFixed(2);
        const total = item.qty * item.price;
        row.insertCell().textContent = total.toFixed(2);
        totalAmount += total;
        const deleteCell = row.insertCell();
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = function () {
            deleteOrderItem(item);
        };
        deleteCell.appendChild(deleteButton);
    });

    // Update total amount
    document.getElementById('total-amount').textContent = totalAmount.toFixed(2);
}

function deleteOrderItem(item) {
    const index = orderItems.indexOf(item);
    if (index !== -1) {
        orderItems.splice(index, 1);
        updateOrderSummaryTable();
    }
}

function calculateChange() {
    const amountPaid = parseFloat(document.getElementById('amount-paid').value) || 0;
    const change = amountPaid - parseFloat(document.getElementById('total-amount').textContent);
    document.getElementById('change').textContent = change.toFixed(2);
}
