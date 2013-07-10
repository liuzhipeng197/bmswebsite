window.addEvent('domready',function(){

    $$('.tag').each(function( t,i ){
        $(t).getParent().setStyle( 'position' , 'relative' );
    });

});
