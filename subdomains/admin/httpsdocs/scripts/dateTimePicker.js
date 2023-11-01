document.addEventListener("DOMContentLoaded", function() {
    var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
    var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();

    flatpickr("#datetimepicker-dashboard", {
        inline: true,
        prevArrow: "<span title=\"Vorige maand\">&laquo;</span>",
        nextArrow: "<span title=\"Deze maand\">&raquo;</span>",
        defaultDate: "today",
        locale: {
            months: {
                shorthand: ['Jan', 'Feb', 'Mrt', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                longhand: ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December']
            }
        }
    });
});





