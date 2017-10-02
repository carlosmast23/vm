// USAGE:
// $('#some_input_id').chosen();
// chosen_ajaxify('some_input_id', 'http://some_url.com/contain/');

// REQUEST WILL BE SENT TO THIS URL: http://some_url.com/contain/some_term

// AND THE EXPECTED RESULT (WHICH IS GOING TO BE POPULATED IN CHOSEN) IS IN JSON FORMAT
// CONTAINING AN ARRAY WHICH EACH ELEMENT HAS "value" AND "caption" KEY. EX:
// [{"value":"1", "caption":"Go Frendi Gunawan"}, {"value":"2", "caption":"Kira Yamato"}]

// bindWithDelay was taken from: https://github.com/bgrins/bindWithDelay
(function($) {

    $.fn.bindWithDelay = function( type, data, fn, timeout, throttle ) {

        if ( $.isFunction( data ) ) {
            throttle = timeout;
            timeout = fn;
            fn = data;
            data = undefined;
        }

        // Allow delayed function to be removed with fn in unbind function
        fn.guid = fn.guid || ($.guid && $.guid++);

        // Bind each separately so that each element has its own delay
        return this.each(function() {

            var wait = null;

            function cb() {
                var e = $.extend(true, { }, arguments[0]);
                var ctx = this;
                var throttler = function() {
                    wait = null;
                    fn.apply(ctx, [e]);
                };

                if (!throttle) { clearTimeout(wait); wait = null; }
                if (!wait) { wait = setTimeout(throttler, timeout); }
            }

            cb.guid = fn.guid;

            $(this).bind(type, data, cb);
        });
    };

})(jQuery);

var REQUEST = new Object();
function chosen_ajaxify(id, ajax_url){
    // if single
    if($('div#' + id + '_chosen').hasClass('chosen-container-single')){
        $('div#' + id + '_chosen' + ' .chosen-search input').bindWithDelay('keyup', function(event){
            // ignore arrow key
            if(event.keyCode >= 37 && event.keyCode <= 40){
                return null;
            }
            // ignore enter
            if(event.keyCode == 13){
                return null;
            }
            // abort previous ajax
            if(REQUEST[id] != null){
                REQUEST[id].abort();
            }
            // get keyword and build regex pattern (use to emphasis search result)
            var keyword = $('div#' + id + '_chosen' + ' .chosen-search input').val();
            var keyword_pattern = new RegExp(keyword, 'gi');
            // remove all options of chosen
          $('div#' + id + '_chosen ul.chosen-results').empty();
            // remove all options of original select
            $("#"+id).empty();
            REQUEST[id] = $.ajax({
                url: ajax_url + keyword,
                dataType: "json",
                success: function(response){
                    // map, just as in functional programming :). Other way to say "foreach"
                    // add new options to original select
                    $('#'+id).append('<option value=""></option>');
                    $.map(response, function(item){
                        $('#'+id).append('<option value="' + item.value + '">' + item.caption + '</option>');
                    });
                },
                complete: function(){
                    keyword = $('div#' + id + '_chosen' + ' .chosen-search input').val();
                    // update chosen
                    $("#"+id).trigger("chosen:updated");
                    // some trivial UI adjustment
                    $('div#' + id + '_chosen').removeClass('chosen-container-single-nosearch');

                    $('div#' + id + '_chosen' + ' .chosen-search input').val(keyword);
                    $('div#' + id + '_chosen' + ' .chosen-search input').removeAttr('readonly');
                    $('div#' + id + '_chosen' + ' .chosen-search input').focus();
                    // emphasis keywords
                    $('div#' + id + '_chosen' + ' .active-result').each(function(){
                        var html = $(this).html();
                        $(this).html(html.replace(keyword_pattern, function(matched){
                            return '<em>' + matched + '</em>';
                        }));
                    });
                }
            }, 500);
        });
    } else if($('div#' + id + '_chosen').hasClass('chosen-container-multi')){ // if multi
        $('div#' + id + '_chosen' + ' input').bindWithDelay('keyup', function(event){
            // ignore arrow key
            if(event.keyCode >= 37 && event.keyCode <= 40){
                return null;
            }
            // ignore enter
            if(event.keyCode == 13){
                return null;
            }
            if(REQUEST[id] != null){
                REQUEST[id].abort();
            }
            var old_input_width = $('div#' + id + '_chosen' + ' input').css('width');
            // get keyword and build regex pattern (use to emphasis search result)
            var keyword = $(this).val();
            var keyword_pattern = new RegExp(keyword, 'gi');
            // old values and captions
            var old_values = new Array();
            var old_captions = new Array();
            $('div#' + id + '_chosen'+ ' li.search-choice').each(function(){
                old_value = $(this).children('a.search-choice-close').attr('data-option-array-index');
                old_caption = $(this).children('span').html();
                old_values.push(old_value);
                old_captions.push(old_caption);
            });
            // remove all options of chosen
            $('div#' + id + '_chosen ul.chosen-results').empty();
            $("#"+id).empty();
            REQUEST[id] = $.ajax({
                url: ajax_url + keyword,
                dataType: "json",
                success: function(response){
                    // add the old selected options
                    for(i=0; i<old_values.length; i++){
                        value = old_values[i];
                        caption = old_captions[i];
                        $('#'+id).append('<option selected value="' + value + '">' + caption + '</option>')
                    }
                    // map, just as in functional programming :). Other way to say "foreach"
                    $.map(response, function(item){
                        // this is ineffective, is there any "in" syntax in javascript?
                        var found = false;
                        for(i=0; i<old_values[i]; i++){
                            if(old_values[i] == item.value){
                                found = true;
                                break;
                            }
                        }
                        if(!found){
                            $('#'+id).append('<option value="' + item.value + '">' + item.caption + '</option>');
                        }
                    });
                },
                complete: function(response){
                    keyword = $('div#' + id + '_chosen' + ' input').val();
                    $("#"+id).trigger("chosen:updated");
                    $('div#' + id + '_chosen').removeClass('chosen-container-single-nosearch');
                    $('div#' + id + '_chosen' + ' input').val(keyword);
                    $('div#' + id + '_chosen' + ' input').removeAttr('readonly');
                    $('div#' + id + '_chosen' + ' input').css('width', old_input_width);
                    $('div#' + id + '_chosen' + ' input').focus();
                    // put that underscores
                    $('div#' + id + '_chosen' + ' .active-result').each(function(){
                        var html = $(this).html();
                        $(this).html(html.replace(keyword_pattern, function(matched){
                            return '<em>' + matched + '</em>';
                        }));
                    });
                }
            });
        }, 500);
    }
}
