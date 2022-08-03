<html>


<nav>
  <ul>
    <li><a href="/" class="logo">
        <img src="/images/logo.png">
        <span class="nav-item">Site Inspection</span>
      </a></li>
    <li><a href="/dashboard">
        <i class="fas fa-chart-line"></i>
        <span class="nav-item">Dashboard</span>
      </a></li>
    <li><a href="/inspection-form">
        <i class="fas fa-pager"></i>
        <span class="nav-item">Inspection Form</span>
      </a></li>
    <li><a href="/all-inspection">
        <i class="fas fa-table"></i>
        <span class="nav-item">All inspections</span>
      </a></li>

    <li><a href="/auth/logout" class="logout">
        <i class="fas fa-sign-out-alt"></i>
        <span class="nav-item">Log out</span>
      </a></li>
  </ul>
</nav>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
  $(function() {
    $('a').each(function() {
      if ($(this).prop('href') == window.location.href) {
        $(this).addClass('active');
        $(this).parents('li').addClass('active');
      }
    });
  });
</script>

</html>