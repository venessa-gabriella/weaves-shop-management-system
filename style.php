* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f7f4fa;
    color: #30243c;
}

/* Sidebar */

.sidebar {
    width: 240px;
    height: 100vh;
    background: #30223f;
    position: fixed;
    padding: 25px 15px;
    color: white;
}

.sidebar h2 {
    margin-bottom: 45px;
    text-align: center;
    color: #e7c9f5;
}

.sidebar a {
    display: block;
    padding: 15px;
    margin: 10px 0;
    color: white;
    text-decoration: none;
    border-radius: 8px;
}

.sidebar a:hover,
.sidebar a.active {
    background: #8055a8;
}

/* Main content */

.main {
    margin-left: 240px;
    padding: 30px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

header p {
    color: #927fa2;
    font-size: 12px;
    margin-bottom: 8px;
}

header h1 {
    font-size: 28px;
}

.admin {
    background: #eadcf5;
    padding: 12px 20px;
    border-radius: 25px;
}

/* Welcome section */

.welcome {
    background: linear-gradient(120deg, #8055a8, #c28bc9);
    padding: 30px;
    color: white;
    border-radius: 15px;
    margin-bottom: 25px;
}

.welcome h2 {
    margin-bottom: 10px;
}

/* Dashboard cards */

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.card {
    background: white;
    padding: 22px;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    border: 1px solid #eee7f3;
}

.card h3 {
    font-size: 14px;
    color: #8a7b95;
}

.card h1 {
    margin: 18px 0 8px;
    color: #8055a8;
    font-size: 25px;
}

.card p {
    color: #999;
    font-size: 12px;
}

/* Products section */

.products {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    overflow-x: auto;
}

.product-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    gap: 12px;
}

.product-header p {
    color: #999;
    font-size: 13px;
    margin-top: 7px;
}

.add-btn, .save-btn {
    background: #8055a8;
    color: white;
    padding: 12px 18px;
    border: none;
    border-radius: 8px;
    text-decoration: none;
    cursor: pointer;
}

.add-btn:hover, .save-btn:hover {
    background: #603b87;
}

/* Search */

input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0 18px;
    border: 1px solid #ddd2e8;
    border-radius: 8px;
    outline: none;
}

input:focus, select:focus, textarea:focus {
    border-color: #8055a8;
}

form input[type="text"] {
    width: 250px;
}

form button {
    padding: 11px 18px;
    background: #8055a8;
    color: white;
    border: none;
    border-radius: 7px;
    cursor: pointer;
}

.reset-btn {
    color: #8055a8;
    text-decoration: none;
    margin-left: 10px;
}

/* Table */

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 650px;
    margin-top: 15px;
}

th {
    background: #f2eaf8;
    color: #63477e;
    padding: 15px;
    text-align: left;
}

td {
    padding: 15px;
    border-bottom: 1px solid #eee;
    font-size: 13px;
}

tr:hover {
    background: #fcf9ff;
}

/* Status */

.available {
    background: #e5f6ec;
    color: #24844a;
    padding: 6px 10px;
    border-radius: 15px;
}

.low {
    background: #fff0df;
    color: #c47a26;
    padding: 6px 10px;
    border-radius: 15px;
}

/* Action buttons */

.edit, .delete {
    padding: 7px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 12px;
}

.edit {
    background: #eee5fa;
    color: #704b9b;
}

.delete {
    background: #ffe6e6;
    color: #c03939;
}

/* Add product form */

.form-container {
    background: white;
    padding: 30px;
    border-radius: 15px;
    max-width: 750px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.04);
}

.form-container h2 {
    margin-bottom: 8px;
}

.form-container p {
    color: #999;
    margin-bottom: 20px;
}

.form-container label {
    font-weight: bold;
    font-size: 13px;
}

textarea {
    height: 100px;
    resize: vertical;
}

.save-btn {
    margin-right: 10px;
}

.cancel-btn {
    background: #eee;
    color: #444;
    padding: 12px 18px;
    border-radius: 8px;
    text-decoration: none;
}

@media(max-width: 900px) {
    .cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 600px) {
    .sidebar {
        width: 75px;
    }

    .sidebar h2 {
        font-size: 12px;
    }

    .sidebar a {
        font-size: 11px;
        padding: 12px 5px;
    }

    .main {
        margin-left: 75px;
        padding: 15px;
    }

    .cards {
        grid-template-columns: 1fr;
    }

    .product-header {
        flex-direction: column;
        align-items: flex-start;
    }
}