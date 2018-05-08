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
var inven, ven, bom_post, rel_text, copy_prod_data, copy_part_data;
var copy_assem_data;
var prod_bom = 0;

jQuery(document).ready(function($) {

  $('.chosen-select').chosen();

  prod_bom = $('#prod_bom').val();

  $('.wcb_cb').on('change', function(event, params) {

    /*console.log(event);
    console.log(params);

    // $('#prod_bom').attr('value', params['selected']);
    //$('#wcb_prod_bom').attr('value', params['selected']);

    //prod_bom = params['selected'];
//

    console.log(params);

    console.log(this);*/
    // alert(this);
  });

  $('select.wc_bom_select.chosen-select').on('change', function(event, params) {

    console.log(event);
    console.log(params);

    $('#prod_bom').attr('value', params['selected']);
    $('#wcb_prod_bom').attr('value', params['selected']);

    prod_bom = params['selected'];
    // swal(prod_bom);

  });

  $('#button_hit').click(function(e) {

    // swal(prod_bom);

    console.log(e);
    inven = $('#inventory').prop('checked');
    ven = $('#vendor').prop('checked');
    bom_post = $('#bom_post').prop('checked');
    rel_text = $('#related_text').val();
    copy_part_data = $('#copy_part_data').val();
    copy_assem_data = $('#copy_assembly_data').val();
    copy_prod_data = $('#copy_product_data').val();
    prod_bom = $('#prod_bom').val();

    //console.log($('#ventory').isChecked());

    var arr = {
      'inventory': inven,
      'vendor': ven,
      'bom_posts': bom_post,
      'related_text': rel_text,
      'copy_product_data': copy_prod_data,
      'copy_part_data': copy_part_data,
      'copy_assembly_data': copy_assem_data,
      'prod_bom': prod_bom,
    };

    var data = {
      'url': ajax_object.ajax_url,
      'action': 'wco_ajax',
      'security': ajax_object.nonce,
      'data': ajax_object.ajax_data,
      'product': prod_bom,
      'settings': ajax_object.settings,
      'options': ajax_object.options,
      'input': arr,

    };

    console.log(data);

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

            $('#wcb_prod_bom').html(response);
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
    $('#wcrp-options').css('display', 'block');
    $('#wcrp-settings').css('display', 'block');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-options').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
  });
  $('#wcrp-nav-related').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'block');
    $('#wcrp-options').css('display', 'none');
    $('#wcrp-settings').css('display', 'none');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-options').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

  });

  $('#wcrp-nav-options').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'none');
    $('#wcrp-options').css('display', 'block');
    $('#wcrp-settings').css('display', 'none');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    //$('#wcrp-nav-options').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-all').attr('class', 'nav-tab', 'nav-tab');

  });

  $('#wcrp-nav-settings').click(function() {
    //alert('hi');
    $('#wcrp-related').css('display', 'none');
    $('#wcrp-options').css('display', 'none');
    $('#wcrp-settings').css('display', 'block');

    $(this).attr('class', 'nav-tab nav-tab-active', 'nav-tab nav-tab-active');
    $('#wcrp-nav-related').attr('class', 'nav-tab', 'nav-tab');
    $('#wcrp-nav-options').attr('class', 'nav-tab', 'nav-tab');
    //$('#wcrp-nav-settings').attr('class', 'nav-tab', 'nav-tab');
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