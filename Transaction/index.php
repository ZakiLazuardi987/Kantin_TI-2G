<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cassier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <!-- Product Table -->
            <table id="product-table">
                <!-- Populate this table dynamically using JavaScript -->
            </table>
        </div>
        <div class="right-panel">
            <!-- Order Summary -->
            <h2>Order Summary</h2>
            <table id="order-summary">
                <!-- Populate this table dynamically using JavaScript -->
            </table>
            <!-- Payment Section -->
            <h3>Total Amount: <span id="total-amount">0.00</span></h3>
            <label for="amount-paid">Amount Paid:</label>
            <input type="number" id="amount-paid">
            <button onclick="calculateChange()">Calculate Change</button>
            <h3>Change: <span id="change">0.00</span></h3>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
