<?php
require('db_connect.php');

// Function to calculate age
function calculateAge($dob)
{
  $dob = new DateTime($dob);
  $now = new DateTime();
  $age = $now->diff($dob);
  return $age->y;
}

$query_patients = 'SELECT * FROM patients ORDER BY id';
$patient_statement = $db->prepare($query_patients);
$patient_statement->execute();
$patients = $patient_statement->fetchAll();
$patient_statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Health Information System</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="shortcut icon" href="assets/images/hospital-logo.png" type="image/x-icon" />
  <script defer src="assets/js/script.js"></script>
</head>

<body>
  <section class="upper-section">
    <header class="header">
      <img src="assets/images/hospital-logo.png" alt="Hospital Logo" class="nav-logo" />
    </header>
    <nav class="nav">
      <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="/registration.html">Registration</a></li>
        <li><a href="/records.php">Records</a></li>
        <li><a href="/about-us.html">About Us</a></li>
        <li><a href="/contacts.html">Contacts</a></li>
      </ul>
    </nav>
  </section>
  <main class="main">
    <aside class="sidebar">
      <ul class="sidebar-links">
        <li><a href="/registration.html">Registration</a></li>
        <li><a href="/records.php">Records</a></li>
      </ul>
    </aside>
    <section class="main-content">
      <h1>Patient Records</h1>
      <table>
        <thead>
          <tr>
            <th>Patient ID</th>
            <th>First Name</th>
            <!-- <th>Middle Name</th> -->
            <th>Last Name</th>
            <th>Gender</th>
            <th>County</th>
            <th>Age</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($patients as $patient) : ?>
            <tr>
              <td><?php echo $patient['id']; ?></td>
              <td><?php echo $patient['firstname']; ?></td>
              <!-- <td><?php echo $patient['middlename']; ?></td> -->
              <td><?php echo $patient['surname']; ?></td>
              <td><?php echo $patient['gender']; ?></td>
              <td><?php echo $patient['county']; ?></td>
              <td><?php echo calculateAge($patient['dob']) . ' ' . 'years'; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>
  <footer class="footer">&copy; Kambale Enoch Nyambu | P15/1921/2022</footer>
</body>

</html>