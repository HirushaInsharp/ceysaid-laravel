(function ($) {
    $.fn.ceysaidTableInt = function (options) {
        var $table, $tableId, url, data, columns, length, stateSave= true, paging = false, processing = false, serverSide = false;

        if (options === null) {
            options = {}
        }

        $table = $(this);
        $tableId = $(this).attr('id');

        url = options.url;
        data = options.url;
        columns = options.columns;
        processing = options.processing;
        serverSide = options.serverSide;
        paging = options.paging;
        length = typeof options.length != 'undefined' ? options.length : 10;

        $table.DataTable({
            "paging": paging,
            "pageLength": length,
            "aLengthMenu": [[10, 15, 20], [10, 15, 20]],
            "ajax": {
                url: url,
                "data": function () {
                    var info = $table.DataTable().page.info();
                    $table.DataTable().ajax.url(
                        url + '?page=' + (info.page + 1) + '&' + $.param(data)
                    );
                },
                dataFilter: function(data) {
                    var json = jQuery.parseJSON(data);
                    var meta = json.meta;
                    json.recordsTotal = meta.total;
                    json.recordsFiltered = meta.total;
                    json.data = json.data;

                    return JSON.stringify(json);
                }
            },
            "columns": columns,
            "processing": processing,
            "serverSide": length,
        });
    }

    return $.fn.ceysaidTable = function (options) {
        if (options === null || typeof options === 'undefined') {
            options = {};
        }

        return $(this).ceysaidTableInt(options)
    }

})(jQuery);
