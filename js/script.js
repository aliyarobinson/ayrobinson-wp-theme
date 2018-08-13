// "use strict"; 

var AYR = AYR || {};

(function($){

  var contentDisplayWrapper = document.querySelector('.content-display-wrapper');

  AYR = {
    currPageName:"",
    homeState: false,
    clickHandler: ('ontouchstart' in document.documentElement ? "touchstart" : "click"),

    isHome: function( page ){
      if(page === '' || page === null || page === 'index'){
        return true;
      }
    },

    isMobile: function(){
        var maxWidth = 768
          , iPadDevice = null != navigator.userAgent.match(/iPad/i);
        return $(window).width() < maxWidth || iPadDevice ? !0 : !1
    },

    scrollTop: function(e){
      $('html,body').animate({                                                             
        scrollTop: $('html,body').offset().top
      }, 500);
    },

    init: function () {
      console.log('init');

      AYR.pageLocation.registerObserver(AYR.pageState);

      var $loading = $('.loader');
      $(document)
        .ajaxStart(function () {
          $loading.removeClass('collapsed');
        })
        .ajaxStop(function () {
          $loading.addClass('collapsed');
        });
          


      /**************************************/
      /*   Window Scroll
      /***************************************************/
      $(window).scroll(function() {
        
        var yPos = -($(window).scrollTop()); 

        if(AYR.isMobile() === false) {
          if(yPos <= -100 ){
          $('.site-header').addClass('small');
          }else{
            $('.site-header').removeClass('small');
          }
        }
        
      });



      /**************************************/
      /*   Window Load
      /***************************************************/
      window.onload = window.onpopstate = function (e) {
        AYR.scrollTop();
        AYR.updateCurrPage();
        if(AYR.currPageName === "resume"){
          AYR.growSkills();
        }
      }


      /**************************************/
      /*   Window Resize
      /***************************************************/
      $( window ).resize(function() {
        if(AYR.isMobile()) {
          $('.site-header').removeClass('small');
        }
      });



      /**************************************/
      /*   History.popstate
      /***************************************************/
      window.onpopstate = function (e) {
        console.log('*****************onpopstate/onload triggered*********************');
        AYR.updateCurrPage();
        console.log('thisPageName: ', AYR.currPageName); 
        AYR.pageLocation.notifyObservers(AYR.currPageName);
      }


      /**************************************/
      /*   Navigation link click
      /***************************************************/
      $(document).on( AYR.clickHandler , '.site-nav a, .logo-wrapper a, .project .cta-btn, .btn.back', function(e) { 
        e.preventDefault();
        console.log('*****************nav click*********************');

        if( History ) {
          console.log('history!');

          // var href = ($(this).attr('href')) ? $(this).attr('href') : $(this).attr('xlink:href');
          var href = $(this).attr('href');
          // var thisPage = href.replace('.html','');
          var thisPage = href.split('/').pop();
          // if (thisPage === ''){
          //   thisPage = 'index';
          // }
          console.log('nav click - thisPage: ', thisPage); 
          console.log('nav click - thisPage: ', thisPage); 
          history.pushState(null, null, href);
          AYR.pageState.innerPage(thisPage);

        }
      });



      /**************************************/
      /*   Mobile Navigation Trigger
      /***************************************************/
      $(document).on( AYR.clickHandler , '.menu-btn', function(e) { 
        $(this).toggleClass('active');
        $('.site-nav').toggleClass('active');
        $('.site-header').toggleClass('mobile-active');
      });
    },

    homeAnim: function() {
    },

    pageLocation: {
      observers: [],
      registerObserver: function(observer){
        this.observers.push(observer);
      },
      notifyObservers: function(page){
        var thisPage = page;
        for(var i = 0; i < this.observers.length; i++) {
          this.observers[i].notify(thisPage);
        }
      }
    },

    pageState: {
      notify: function(page) {
        var pageName = page.split('/').pop();
        console.log('page nofify - ishome: ', AYR.isHome(page));
        console.log('pageContent notified - page: ', page);
        console.log('pageContent notified - pageName: ', pageName);
          AYR.pageState.innerPage(page);
      },
      innerPage: function(pName){
        AYR.transitionContent(pName);
       
        var bodyClass = document.querySelector('body').className;
        var bodyClassList = bodyClass.split(' ');

        for (cName in bodyClassList){
          if (bodyClassList[cName].indexOf('-page') !== -1){
            $('body').removeClass(bodyClassList[cName]);
          }
        }
        $('body').addClass(pName + '-page');

        console.log('pName: ', pName);
        // console.log('has class index-page: ', hasClass(document.querySelector('body'), pName + '-page'));

        // function hasClass(element, cls) {
        //   return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
        // }
      }
    },

    growSkills: function() {
      var skillsArr = [];
      $( ".skill" ).each(function( index ) {
        console.log( index + ": " + $( this ).data('rating') );
        skillsArr.push($( this ).data('rating'));
      });
      d3.selectAll(".skill")
      .data(skillsArr)
      .style("font-size", "0px")
      .transition(5000)
      .delay(function(d, i) {
          return i * 100;
      })
      .style("font-size", function(d) { return d * 2.5  + "px"; });
    },

    updateCurrPage: function() {
      var thisPage = location.href.split('/')[location.href.split('/').length -1 ];
      AYR.currPageName = thisPageName = thisPage.replace('.html','');
    },

    transitionContent: function(page){
      console.log('*****************transitionContent*********************');
      AYR.updateCurrPage();
      AYR.currPageName = page;
      console.log('transitionContent - name: ', AYR.currPageName);
      $('.content-container').addClass('collapsed');
      $('.content-wrapper').hide();
      $('#content-holder').innerHTML = "";

      if($('.site-nav').hasClass('active')){
        $('.site-nav').removeClass('active');
        $('.menu-btn').removeClass('active');
      }
      if($('.site-header').hasClass('mobile-active')){
        $('.site-header').removeClass('mobile-active');
      }

      // if (page === 'index') {
      //   page === '';
      // }
      
      // $( "#content-holder" ).load( page + " .content-wrapper", function(){
      //   console.log('page name after content load: ', AYR.currPageName);
      //   if(AYR.currPageName === "resume"){
      //     AYR.growSkills();
      //   }
      //   AYR.scrollTop();
      // });

      // Clone new page contents
      // var newPage =  document.querySelector('.content-pages > .' + AYR.currPageName + '-page').cloneNode(true);
      var newPage =  $( "#content-holder" ).load( page + " .content-wrapper");
      
      // Add class content-display to new page 
      newPage.addClass('content-display');

      // Update container hieght
      contentDisplayWrapper.style.height = document.querySelector('.content-pages > .' + AYR.currPageName + '-page').offsetHeight + 'px';
      
      // Add cloned page content to container
      contentDisplayWrapper.appendChild(newPage);
      
      // Move any active containers to the left of the screen, out of the view of the user.
      document.querySelector('.active').style.left = -document.body.offsetWidth + 'px';

      // Make cloned page active. The active class adds transition animation
      newPage.classList.add('active');

      // Remove the old active container
      document.querySelectorAll('.active')[0].parentNode.removeChild(document.querySelectorAll('.active')[0]);
      
      if(AYR.currPageName === "resume"){
        AYR.growSkills();
      }
      AYR.scrollTop();

    }
  };
})(jQuery); // end SEF

AYR.init();