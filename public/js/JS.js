$('#searchBar').submit(function(e) {
    if ($.trim($("input[name=search]").val()) === "") {
        alert('you did not fill search fields');
        return false;
    }
});
