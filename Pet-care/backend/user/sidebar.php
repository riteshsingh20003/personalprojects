<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-profile-text d-flex flex-column">
        <h2 class="font-weight-bold mb-2">
          <?php
          if (isset($_SESSION['username'])) {
            echo htmlspecialchars($_SESSION['name']);
          } else {
            echo "Guest";
          }
          ?>
        </h2>

      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="BookAppointment.php">
        <span class="menu-title">Book Appointment</span>
        <i class="fa fa-handshake-o menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ShowAppointment.php">
        <span class="menu-title">Show Appointment</span>
        <i class="fa fa-calendar menu-icon"></i>
      </a>
    </li>

  </ul>
</nav>