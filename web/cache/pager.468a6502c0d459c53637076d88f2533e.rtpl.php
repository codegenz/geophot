<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <link rel="stylesheet" type="text/css" href="css/style.css?3" />
    <title>GeoPhot</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="/js/fancybox/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="/css/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="http://maps.api.2gis.ru/2.0/loader.js?pkg=full" data-id="dgLoader"></script>
</head>
<body>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fancybox")
            .attr('rel', 'gallery')
            .fancybox({
                beforeLoad: function() {
                    var el, id = $(this.element).data('title-id');
                        if (id) {
                            el = $('#' + id);
                            if (el.length) {
                                this.title = el.html();
                            }
                        }
                }
            });
    });
</script>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
</div>

<div class="container container2" style="margin-top:60px;padding-bottom:20px;">
    <div class="page-header"><h1><a href="/">Search photos on map</a></h1></div>
    <?php require $this->checkTemplate(''.$tmp);?>
</div>
</div>

</body>
</html>