<?php include('./adHeader.php'); ?>
<div class="container my-5 py-5">
    <h1>Welcome to Admin</h1>
    <hr />
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">
                        View and manage customer orders.
                    </p>
                    <a href="#" class="btn btn-primary">Go to Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text">
                        View and manage customer accounts.
                    </p>
                    <a href="#" class="btn btn-primary">Go to Customers</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">
                        View and manage product inventory.
                    </p>
                    <a href="#" class="btn btn-primary">Go to Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">
                        View sales and revenue reports.
                    </p>
                    <a href="#" class="btn btn-primary">Go to Reports</a>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <h2>Recent Orders</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>Jane Doe</td>
                        <td>05/12/2023</td>
                        <td>$245.99</td>
                    </tr>
                    <tr>
                        <td>12344</td>
                        <td>John Smith</td>
                        <td>05/11/2023</td>
                        <td>$180.00</td>
                    </tr>
                    <tr>
                        <td>12343</td>
                        <td>Alice Johnson</td>
                        <td>05/10/2023</td>
                        <td>$72.50</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>Top Products</h2>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Widget A
                    <span class="badge badge-primary badge-pill">12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Widget B
                    <span class="badge badge-primary badge-pill">8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Widget C
                    <span class="badge badge-primary badge-pill">5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Widget D
                    <span class="badge badge-primary badge-pill">3</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
include('./adFooter.php'); ?>