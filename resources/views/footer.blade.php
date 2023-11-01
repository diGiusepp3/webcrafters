<!-- Footer.blade.php -->
<footer class="w-100 d-flex flex-row justify-content-between bg-primary text-white text-center">
    <div class="copyright text-center w-100">
        <small>&copy; Copyright {{Date('Y')}} Webcrafters<br> Made with Laravel</small>
    </div>
</footer>
<script>
    function toggleUserMenu() {
        var userMenu = $('.userMenu');
        var userMenuButton = $('.dropdown-toggle');
        if (userMenu.css('display') === 'none') {
            userMenu.css('display', 'flex');
            userMenu.addClass('d-flex flex-column');
            userMenuButton.css('display', 'none');
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.dropdown').length) {
                    userMenu.css('display', 'none');
                    userMenuButton.css('display', 'block');
                }
            });
        } else {
            userMenu.css('display', 'none');
            userMenuButton.css('display', 'block');
            $(document).off('click');
        }
    }

    $(document).ready(function() {
        $('#toggleUserMenuButton').click(function(event) {
            event.stopPropagation();
            toggleUserMenu();
        });
    });
</script>



