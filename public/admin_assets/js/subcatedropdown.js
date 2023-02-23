jQuery(document).ready(function () {
    jQuery('select[name="category_id"]').on('change', function () {
        var categoryID = jQuery(this).val();
        if (categoryID) {
            jQuery.ajax({
                url: "../imaam/getsubcategories/" + categoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="sub_category_id"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="sub_category_id"]').append(
                            '<option value="' + key + '">' + value +
                            '</option>');
                    });
                }
            });
        } else {
            $('select[name="sub_category_id"]').empty();    
        }
    });
});

jQuery(document).ready(function () {
    jQuery('select[name="sub_category_id"]').on('change', function () {
        var subCategoryID = jQuery(this).val();
        if (subCategoryID) {
            jQuery.ajax({
                url: "../getImaams/" + subCategoryID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="imaam_id"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="imaam_id"]').append(
                            '<option value="' + key + '">' + value +
                            '</option>');
                    });
                }
            });
        } else {
            $('select[name="imaam_id"]').empty();
        }
    });
});