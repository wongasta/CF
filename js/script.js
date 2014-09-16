/**
 * Created by loldongs on 9/10/14.
 */

var main =  {
    update: function(){
        $.ajax({
            url: 'http://yixinxia.com/cf/cf.php?callback=callback',
            type: 'GET',
            dataType: 'jsonp',
            error: function(xhr, status, error) {
                console.log(error);
            },
            success: function(json) {
                $.each(json, function(i,v){
                    var gameAlias = 'game'+i;
                    $('#gamesCont').append('<div class="game'+i+'"></div>');
                    console.log(v);
                    $('.'+gameAlias).html('<div class="gameName">'+ v['name']+'</div>');
                    $('.'+gameAlias).append('<div class="gameMeta">'+ v['meta']+'</div>');
                });

                $('#gameInput').val(json.name);
                $('.gameMeta').html(json.meta);
            }
        });
    },
    buttonUpdate: $('#refresh').click(function(){
        $('#gamesCont').html('');
        main.update();
    })
}

$("input[type='text']").click(function () {
    $(this).select();
});

main.update();