
// Sidebar Toggle Logic
const sidebarToggle = document.getElementById('sidebarToggle');
const wrapper = document.body;

if (sidebarToggle) {
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        wrapper.classList.toggle('sb-sidenav-toggled');
    });
}

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function (event) {
    const isMobile = window.innerWidth <= 768;
    const isToggled = document.body.classList.contains('sb-sidenav-toggled');
    const clickedInsideSidebar = event.target.closest('#sidebar-wrapper');
    const clickedToggle = event.target.closest('#sidebarToggle');

    if (isMobile && isToggled && !clickedInsideSidebar && !clickedToggle) {
        document.body.classList.remove('sb-sidenav-toggled');
    }
});

// Top Menu Search / Filter Logic
const searchInput = document.getElementById('topMenuSearch');
const menuItems = document.querySelectorAll('#sidebarMenu .list-group-item');

if (searchInput) {
    searchInput.addEventListener('keyup', function () {
        const query = this.value.toLowerCase().trim();

        menuItems.forEach(item => {
            // We want to filter based on text content
            // Note: We need to handle Parent "Accordion" items and Child "Link" items
            const text = item.textContent.toLowerCase();

            if (text.includes(query)) {
                item.classList.remove('d-none');

                // Logic: If this item is a child link inside a submenu, we must open the parent
                const parentSubmenu = item.closest('.sidebar-submenu');
                if (parentSubmenu) {
                    // The submenu container (the .collapse div)
                    const collapseDiv = parentSubmenu.closest('.collapse');
                    if (collapseDiv) {
                        collapseDiv.classList.add('show');
                        // Also ensure the parent trigger (the link that toggles the collapse) is visible
                        const triggerId = collapseDiv.id;
                        const parentTrigger = document.querySelector(`[data-bs-target="#${triggerId}"]`);
                        if (parentTrigger) {
                            parentTrigger.classList.remove('d-none');
                        }
                    }
                }
            } else {
                item.classList.add('d-none');
            }
        });
    });
}
