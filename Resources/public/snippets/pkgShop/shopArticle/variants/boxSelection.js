      $(document).ready(function(){
        //preloading transparentloader.gif
        loader = new Image();
        loader.src = '/assets/images/loader_black.gif';

        $(".snippetShopArticleVariantsBoxSelection a").on('click', function(e){
          var iTotalHeight  = $(document).height();
          var iTotalWidth   = $(document).width();
          var iWindowHeight = $(window).height();
          var iWindowWidth  = $(window).width();
          var iHeight       = Math.floor(iWindowHeight / 2);
          var iWidth        = Math.floor(iWindowWidth / 2);
          var iTop          = $(window).scrollTop();
          var iLeft         = $(window).scrollLeft()

          iTop = Math.floor(iTop + iHeight - 32);
          iLeft = Math.floor(iLeft + iWidth - 32);

          $("#waiting").css({width:iTotalWidth+'px', height:iTotalHeight+'px'});
          $("#waiting").fadeIn('1000');
          $("#loadingGif").css({top:iTop+'px', left:iLeft+'px'});

        });
      });
