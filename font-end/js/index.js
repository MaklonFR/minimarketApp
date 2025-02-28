// Active menu Responsive
document.querySelector('.nav-toggle').addEventListener('click', function () {
    document.querySelector('.menu').classList.toggle('active');
});

// Fetch dashboard data from API
async function fetchDashboardData() {
    try {
        const response = await fetch('http://localhost/minimarket/dashboard_api.php');
        const data = await response.json();

        document.getElementById('totalProducts').textContent = data.total_products;
        document.getElementById('totalTransactions').textContent = data.total_transactions;
        document.getElementById('totalCustomers').textContent = data.total_customers;
        document.getElementById('totalRevenue').textContent = '$' + data.total_revenue;
    } catch (error) {
        console.error('Error fetching dashboard data:', error);
    }
}

// Load dashboard data when page loads
document.addEventListener('DOMContentLoaded', function () {
fetchDashboardData();
});