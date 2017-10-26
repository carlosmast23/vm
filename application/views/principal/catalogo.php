  <style type="text/css">
    body{
        background:#ccc;
    }
    #magazine{
        width:1152px;
        height:752px;
    }
    #magazine .turn-page{
        background-color:#ccc;
        background-size:90% 90%;
    }
    #magazine div{
        background-size: 100%;
    }
</style>
<script type="text/javascript" src="<?=base_url()?>js/turn.js"></script>

<!-- Main container -->
<div id="magazine">

    <div style="background-image:url(<?=base_url()?>/img/pages/pagina0.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina1.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina2.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina3.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina4.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina5.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina6.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina7.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina.jpg)"></div>
    <div style="background-image:url(<?=base_url()?>/img/pages/pagina8.jpg)"></div>


</div>


<script type="text/javascript">

    $(window).ready(function() {
        $('#magazine').turn({
            display: 'double',
            autoCenter: true,
            acceleration: true,
            gradients: !$.isTouch,
            elevation:1
       
        });
    });
    
    
    $(window).bind('keydown', function(e){

        if (e.keyCode==37)
            $('#magazine').turn('previous');
        else if (e.keyCode==39)
            $('#magazine').turn('next');

    });

</script>

<!-- end Main container -->
