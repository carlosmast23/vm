  <!-- Main container -->
    <div class="flipbook-viewport">
        <div class="container">
            <div class="flipbook">
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
        </div>
    </div>

<script type="text/javascript" src="<?=base_url()?>js/jquery.min.1.7.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/modernizr.2.5.3.min.js"></script>
    
<script type="text/javascript">

function loadApp() {

    // Create the flipbook

    $('.flipbook').turn({
            // Width

            width:922,
            
            // Height

            height:600,

            // Elevation

            elevation: 50,
            
            // Enable gradients

            gradients: true,
            
            // Auto center this flipbook

            autoCenter: true

    });
}

// Load the HTML4 version if there's not CSS transform

yepnope({
    test : Modernizr.csstransforms,
    yep: ['<?=base_url()?>js/turn.js'],
    nope: ['<?=base_url()?>js/turn.html4.min.js'],
    both: ['<?=base_url()?>css/basic.css'],
    complete: loadApp
});

</script>

    <!-- end Main container -->
