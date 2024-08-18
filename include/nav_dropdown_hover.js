document.addEventListener('DOMContentLoaded', function () {
    // Add event listener to all dropdown-toggle elements
    document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function (element) {
      element.addEventListener('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        
        // Toggle the display of the submenu
        let submenu = this.nextElementSibling;
        submenu.classList.toggle('show');
        
        // Hide other open submenus
        document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function (subMenuElement) {
          if (subMenuElement !== submenu) {
            subMenuElement.classList.remove('show');
          }
        });
      });
    });
    
    // Hide submenu when the main dropdown is closed
    document.querySelectorAll('.dropdown').forEach(function (dropdown) {
      dropdown.addEventListener('hide.bs.dropdown', function () {
        dropdown.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function (submenu) {
          submenu.classList.remove('show');
        });
      });
    });
  });
  