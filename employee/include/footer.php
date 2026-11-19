<script>
  // Sidebar collapse toggle (only JS in this file)
  var sidebar = document.getElementById('sidebar');
  if (window.innerWidth < 760) sidebar.classList.add('collapsed');
  document.getElementById('sb-collapse').addEventListener('click', function () {
    sidebar.classList.toggle('collapsed');
  });
</script>
</body>
</html>
