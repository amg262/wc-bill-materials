/*
 * Copyright (c) 2017  |  Netraa, LLC
 * netraa414@gmail.com  |  https://netraa.us
 *
 * Andrew Gunn  |  Owner
 * https://andrewgunn.org
 */

/**
 * Created by andy on 2/24/17.
 */
/**
 * Created by andy on 2/9/17.
 */

var product = null;
var data = null;
var val = null;
var id = null;
//var validate = require("validate.js");

var prod_bom = 0;

jQuery(document).ready(function($) {

  $('.chosen-select').chosen();

  prod_bom = $('#prod_bom').val();

  $('select.wc_bom_select.chosen-select').on('change', function(event, params) {

    console.log(event);
    console.log(params);

    $('#prod_bom').attr('value', params['selected']);

    prod_bom = params['selected'];
    swal(prod_bom);

  });

  $('form#wc_bom_form').on('change', function() {

    console.log(this);

  });

  $('#button_hit').click(function() {

    swal(prod_bom);

    var b, c, d, e;

    b = $('#related_text').val();
    d = $('#copy_product_data').val();
    // c = $('#related_total').val();
    e = $('#prod_bom').val();

    var a = '';
    a = $('#related_total').val();

    var arr = {
      'related_total': a,
      'related_text': b,
      'copy_product_data': d,
      'prod_bom': e,
    };

    var data = {
      'url': ajax_object.ajax_url,
      'action': 'wco_ajax',
      'security': ajax_object.nonce,
      'data': ajax_object.ajax_data,
      'product': prod_bom,
      'settings': ajax_object.settings,
      'input': arr,

    };
    // console.log($('#prod_bom'));

    console.log(data);

    console.log(a);

    sweetAlert({
          title: 'Export Product\'s BOM? ' + prod_bom,
          text: 'Submit to run ajax request',
          type: 'info',
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
        },
        function() {

          // We can also pass the url value separately from ajaxurl for front end AJAX implementations
          jQuery.post(ajax_object.ajax_url, data, function(response) {

            $('#prod_output').html(response);
            setTimeout(function() {
              swal('Finished');
            });
            //alert('seRespon ' + response);
          });
        });

  });
});

jQuery(function($) {
  $('#wcrp-nav-all').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'block');
    $('#wcrp-upsells').css('display', 'block');
    $('#wcrp-crosssells').css('display', 'block');
    $('#wcrp-settings').css('display', 'block');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-upsells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-crosssells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
  });
  $('#wcrp-nav-related').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'block');
    $('#wcrp-upsells').css('display', 'none');
    $('#wcrp-crosssells').css('display', 'none');
    $('#wcrp-settings').css('display', 'none');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-upsells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-crosssells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

  });

  $('#wcrp-nav-upsells').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'none');
    $('#wcrp-upsells').css('display', 'block');
    $('#wcrp-crosssells').css('display', 'none');
    $('#wcrp-settings').css('display', 'none');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    // $('#wcrp-nav-upsells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-crosssells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

  });

  $('#wcrp-nav-crosssells').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'none');
    $('#wcrp-upsells').css('display', 'none');
    $('#wcrp-crosssells').css('display', 'block');
    $('#wcrp-settings').css('display', 'none');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-upsells').attr('class', 'nav-tab', 'nav-tab');
    // $('#wcrp-nav-crosssells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

  });

  $('#wcrp-nav-settings').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'none');
    $('#wcrp-upsells').css('display', 'none');
    $('#wcrp-crosssells').css('display', 'none');
    $('#wcrp-settings').css('display', 'block');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-upsells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-crosssells').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

    //$('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
  });
});

/*
 * Plugins that insert posts via Ajax, such as infinite scroll plugins, should trigger the
 * post-load event on document.body after posts are inserted. Other scripts that depend on
 * a JavaScript interaction after posts are loaded
 *
 * JavaScript triggering the post-load event after posts have been inserted via Ajax:
 */
//jQuery(document.body).trigger('post-load');

/*
 *JavaScript listening to the post-load event:
 */
jQuery(document.body).trigger('post-load');
jQuery(document.body).on('post-load', function() {
  // New posts have been added to the page.
  console.log('posts');
});