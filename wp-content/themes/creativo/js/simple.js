window.InlineShortcodeView_social_icons = window.InlineShortcodeView.extend( {
	render: function() {
		var model_id = this.model.get('id');
		window.InlineShortcodeView_social_icons.__super__.render.call(this);
		vc.frame_window.vc_iframe.addActivity(function(){
			nTip=function(){ jQuery('.ntip').tipsy({gravity: 's', fade:true}); }; nTip();			
		});
		return this;
	}
} );

var $ = jQuery.noConflict();

window.InlineShortcodeView_vc_counter = window.InlineShortcodeView.extend({
  render: function() {
    var model_id = this.model.get('id');
    var $counterElement = this.$el.find('.counter');
    window.InlineShortcodeView_vc_counter.__super__.render.call(this);
    
    vc.frame_window.vc_iframe.addActivity(function(){             
		
		if( $counterElement.length > 0 ){			
			$counterElement.appear( function(){
				$counterElement.find('span').countTo();
			},{accX: 0, accY: -120},'easeInCubic');			
		}
    });
    return this;
  }
});
