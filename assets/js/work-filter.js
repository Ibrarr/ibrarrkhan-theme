jQuery(document).ready(function($) {
    let offset = 0;
    let typeOfWorkGlobal = 'all';
    const itemsPerLoad = 5;
    let totalItems = 0;
    let isLoading = false;

    function fetchWork(typeOfWork, newOffset) {
        if (isLoading) return;
        isLoading = true;
        $('#loading-indicator').show();

        $.ajax({
            url: frontendajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_work',
                type_of_work: typeOfWork,
                offset: offset
            },
            success: function(response) {
                let data = JSON.parse(response);
                if(newOffset === 0) {
                    $('#all-work-container').html(data.html);
                } else {
                    $('#all-work-container').append(data.html);
                }

                totalItems = data.total;
                offset += itemsPerLoad;

                if (offset >= totalItems) {
                    $('#see-more-work').hide();
                } else {
                    $('#see-more-work').show();
                }
                $('#loading-indicator').hide();
                isLoading = false;
            },
            error: function() {
                $('#loading-indicator').hide();
                isLoading = false;
                console.log('Error fetching data');
            }
        });
    }

    fetchWork('all', 0);

    $('#filter-options').on('click', 'p', function() {
        $('#filter-options p').removeClass('active');

        $(this).addClass('active');

        typeOfWorkGlobal = $(this).data('value');
        offset = 0;
        fetchWork(typeOfWorkGlobal, offset);
    });

    $('#see-more-work').click(function() {
        fetchWork(typeOfWorkGlobal, offset);
    });
});