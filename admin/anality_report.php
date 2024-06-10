<?php 
include('./adHeader.php') ?>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Sales by Month</div>
                <div class="card-body">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Top Selling Products</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Units Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Widget A</td>
                                <td>120</td>
                            </tr>
                            <tr>
                                <td>Widget B</td>
                                <td>80</td>
                            </tr>
                            <tr>
                                <td>Widget C</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>Widget D</td>
                                <td>30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Website Traffic</div>
                <div class="card-body">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com
        <!-- Chart.js CDN -->
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<script>
// Sales Chart
var ctx = document.getElementById("salesChart").getContext("2d");
var salesChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        datasets: [{
            label: "Sales ($)",
            data: [
                2500, 3200, 1800, 4200, 3100, 5100, 4100, 5500,
                6200, 7100, 4800, 6800,
            ],
            backgroundColor: "rgba(255, 99, 132, 0.2)",
            borderColor: "rgba(255, 99, 132, 1)",
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
            }, ],
        },
    },
});

// Traffic Chart
var ctx2 = document.getElementById("trafficChart").getContext("2d");
var trafficChart = new Chart(ctx2, {
    type: "bar",
    data: {
        labels: [
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
            "Sunday",
        ],
        datasets: [{
            label: "Visitors",
            data: [1200, 2000, 1800, 2400, 1800, 2800, 3200],
            backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
                "rgba(0, 255, 0, 0.2)",
            ],
            borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
                "rgba(0, 255, 0, 1)",
            ],
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                },
            }, ],
        },
    },
});
</script>
<?php
include('./adFooter.php'); ?>