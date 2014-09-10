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
                $('#gameInput').val(json.name);
                $('.gameMeta').html(json.meta);
            }
        });
    },
    buttonUpdate: $('#refresh').click(function(){
        main.update();
    })
}

$("input[type='text']").click(function () {
    $(this).select();
});

main.update();