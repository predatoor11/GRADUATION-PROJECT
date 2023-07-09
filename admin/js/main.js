/* Menü'nün açılmasını sağlayan kod parçası */
$(document).ready(function(){
    $('.sidebarBtn').click(function(){
        $('.sidebar').toggleClass('sidebarActive');
        $('.sidebarBtn').toggleClass('sidebarToggle');
    });
});
/* Menü içindeki Dropdown butonunun açılmasını sağlayan kod parçası */
$(document).ready(function(){
    $('.dropdown-btn').click(function(){
        $('.dropdown-container').toggleClass('dropdown-active');
    });
});