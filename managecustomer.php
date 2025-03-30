<?php
session_start();
require_once 'database/db_connection.php';
require_once 'include/head.php';

// Retrieve data from database
$retrieve = mysqli_query($conn, "SELECT * FROM customers ORDER BY registration_date DESC");

?>
<?php require_once 'include/head.php';?>

<body>
   <?php require_once 'include/navbar.php'; ?>

   <?php if (mysqli_num_rows($retrieve) > 0): ?>

   <div class="ms-4 mr-4">
      <div class="topnav mt-5" id="myTopnav">
         <a href="addcustomer.php" class="active"><i class="fas fa-user-plus"></i> Add new customer</a>
         <a href="pdfcustomer.php" target="_blank"><i class="fas fa-print"></i> Print all customers</a>
      </div>

      <!-- DataTable -->
      <table id="customers" class="mt-3 table table-striped table-bordered">
         <thead class="bg-success">
            <tr>
               <th>SN</th>
               <th>Customer number</th>
               <th>Customer type</th>
               <th>First name</th>
               <th>Middle name</th>
               <th>Surname</th>
               <th>Gender</th>
               <th>DOB</th>
               <th>Nationality</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $num = 1;
            while ($result = mysqli_fetch_assoc($retrieve)) {
            ?>
            <tr>
               <td><?php echo $num++; ?></td>
               <td><?php echo $result["customer_number"]; ?></td>
               <td><?php echo $result["customer_type"]; ?></td>
               <td><?php echo $result["first_name"]; ?></td>
               <td><?php echo $result["middle_name"]; ?></td>
               <td><?php echo $result["surname"]; ?></td>
               <td><?php echo $result["gender"]; ?></td>
               <td><?php echo $result["date_of_birth"]; ?></td>
               <td><?php echo $result["nationality"]; ?></td>
               <td>
                  <a href="updatecustomer.php?customer_number=<?php echo $result["customer_number"]; ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</a>
                  <a href="app/deletecustomer.php?customer_number=<?php echo $result["customer_number"]; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                  <a href="pdf_singlecustomer.php?customer_number=<?php echo $result['customer_number']; ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print</a>
               </td>
            </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>

   <?php else: ?>
       <p>No result found</p>
   <?php endif; ?>

   <!-- Include DataTables JS and CSS -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   
   <script>
      $(document).ready(function() {
         $('#customers').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search box
            "ordering": true, // Enable column sorting
            "lengthMenu": [10, 25, 50, 100], // Page length options
            "pageLength": 10, // Default number of records per page
            "order": [[1, 'asc']], // Default order by customer number
            "columnDefs": [
                { "targets": [0, 9], "orderable": false } // Disable sorting for the first and last columns (SN, Actions)
            ]
         });
      });
   </script>

</body>

<?php require_once 'include/footer.php'; ?>
