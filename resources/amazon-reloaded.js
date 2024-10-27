jQuery(document).ready(function() {
    jQuery("#arfw-search").click(sendSearchRequest);
    jQuery("#arfw-terms").keypress(onInputKeyPress);
    jQuery('.arfw-product-insert-link').live('click', addLinkToEditor);
    jQuery('.arfw-add-image-insert').live('click', addImageToEditor);
});

var enterKeyCode = 13;

function onInputKeyPress(event) {
    if (event.which == enterKeyCode) {
        sendSearchRequest(event);
    }
    return true;
}

var sendingAmazonRequest = false;

function sendSearchRequest(event) {
    if (!sendingAmazonRequest) {
        sendingAmazonRequest = true;
        jQuery('#arfw-status').removeClass('ajax-feedback');
        jQuery.post('admin-ajax.php', {
            terms: jQuery("#arfw-terms").val(),
            index: jQuery('#arfw-index').val(),
            action: 'arfw'
        }, fillSearchResultTable, 'json');
    }
    event.preventDefault();
}

function fillSearchResultTable(response, status) {
    sendingAmazonRequest = false;
    jQuery('.arfw-result').remove();
    jQuery('#arfw-status').addClass('ajax-feedback');
    if (response["success"] == false) {
        jQuery('#arfw-results').hide();
        jQuery('#arfw-error').show();
    } else {
        jQuery('#arfw-error').hide();
        jQuery('#arfw-results').show();
        jQuery.each(response['items'], createNewResultRow);
    }
}

function createNewResultRow() {
    var $newRow = jQuery('#arfw-result-template').clone().attr('id', 'arfw-result-' + this['asin']).addClass('arfw-result');
    $newRow.html($newRow.html().replace(/%ASIN%/g, this['asin']).replace(/%NAME%/g, this['name']).replace(/%DETAIL_PAGE_URL%/g, this['detailPageURL']).replace(/%IMG_SRC%/g, this['imageURLs'][0]).replace(/%IMG_SRC_MED%/g, this['imageURLs'][1]).replace(/%IMG_SRC_LRG%/g, this['imageURLs'][2]));
    jQuery('#arfw-results table tbody').append($newRow);
}

function addLinkToEditor(event) {
    event.preventDefault();
    var $link = jQuery(this).siblings('.arfw-product-link');
    send_to_editor('<a href="' + $link.attr('href') + '">' + $link.text() + '</a>');
}

function addImageToEditor(event) {
    event.preventDefault();
    var imageHtml = '<img src="' + jQuery(this).siblings('.arfw-add-image').val() + '" alt="" />';
    if (jQuery(this).parent().find('label .add-link:checked').size() > 0) {
        imageHtml = '<a href="' + jQuery(this).attr('href') + '">' + imageHtml + '</a>';
    }
    send_to_editor(imageHtml);
}