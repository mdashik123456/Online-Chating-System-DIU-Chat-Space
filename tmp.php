<script>
        function fetchData() {
            $.ajax({
                url: 'get_user_from_db.php',
                type: 'POST',
                success: function (data) {
                    // Clear existing data
                    $('#user_list_table').empty();
                    $('#user_list_table').html(data);
            
                },
                complete: function () {
                    // Schedule the next data fetch after a delay (e.g., every 5 seconds)
                    setTimeout(fetchData, 5000);
                }
            });
        }

        // Initial data fetch
        fetchData();
    </script>