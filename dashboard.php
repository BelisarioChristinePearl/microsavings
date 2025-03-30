<?php
session_start();
require_once 'include/head.php'; 
require_once 'database/db_connection.php';
?>

<body>

  <?php require_once 'include/navbar.php'; ?>
  <?php require_once 'include/sidebar.php'; ?>

  <!-- Main content -->
  <section class="content my-4 w-100">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php
          $sql = "SELECT count(*) AS total FROM customers_type";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          ?>
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $data['total']; ?></h3>
              <p>Customers type</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-cog"></i>
            </div>
            <a href="manage_customer_type.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php
          $sql = "SELECT count(*) AS total_account FROM account_type";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          ?>
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $data['total_account'];?></h3>
              <p>Accounts types</p>
            </div>
            <div class="icon">
              <i class="fas fa-money-bill"></i>
            </div>
            <a href="manageaccount_type.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php
          $sql = "SELECT count(*) AS total_customer FROM customers";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          ?>
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $data['total_customer'];?></h3>
              <p>Total Customers</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="managecustomer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <?php
          $sql = "SELECT count(*) AS total_accounts FROM accounts";
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          ?>
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $data['total_accounts'];?></h3>
              <p>Accounts</p>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- Chart Section -->
      <div class="row">
        <div class="col-12">
          <canvas id="statsChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  </section>
</body>

<?php require_once 'include/footer.php'; ?>

<script>
// Fetch data from PHP (via AJAX or embedded directly)
<?php
// Fetch data for chart
$customer_types = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) AS total FROM customers_type"))['total'];
$account_types = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) AS total_account FROM account_type"))['total_account'];
$total_customers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) AS total_customer FROM customers"))['total_customer'];
$total_accounts = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(*) AS total_accounts FROM accounts"))['total_accounts'];
?>

// Create the chart using Chart.js
var ctx = document.getElementById('statsChart').getContext('2d');
var statsChart = new Chart(ctx, {
    type: 'bar', // The type of chart (bar chart)
    data: {
        labels: ['Customer Types', 'Account Types', 'Total Customers', 'Total Accounts'], // The categories
        datasets: [{
            label: 'Number of Entries',
            data: [<?php echo $customer_types; ?>, <?php echo $account_types; ?>, <?php echo $total_customers; ?>, <?php echo $total_accounts; ?>], // Data from the PHP query
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(153, 102, 255, 0.2)'], // Colors for the bars
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 159, 64, 1)', 'rgba(153, 102, 255, 1)'], // Border colors for the bars
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
