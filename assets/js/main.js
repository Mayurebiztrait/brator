jQuery( document ).ready(function() {

  
    //ttInputCounter
    var inputCounter = $('.tt-input-counter');
    if (inputCounter.length){
      inputCounter.find('.minus-btn, .plus-btn').on('click',function(e) {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val(), 10) + parseInt(e.currentTarget.className === 'plus-btn' ? 1 : -1, 10);
        $input.val(count).change();
      });
      inputCounter.find("input").change(function() {
        var _ = $(this);
        var min = 1;
        var val = parseInt(_.val(), 10);
        var max = parseInt(_.attr('size'), 10);
        val = Math.min(val, max);
        val = Math.max(val, min);
        _.val(val);
      })
      .on("keypress", function( e ) {
        if (e.keyCode === 13) {
          e.preventDefault();
        }
      });
    }


  // if ($('.brator-cart-link').length) {
  //     $('.brator-header-area.header-one .brator-info-right a.cart_tag').on('click', function(e) {
  //         $('.brator-cart-item-list').toggleClass('mini-cart-open');
  //     });
  // }


  // download pdf code
  
  jQuery('.find-dealer-page .map-image').after('<p class="map_description">Need help finding a Aodes dealer near you? Find a dealer nearest to you with our locator map. Simply enter your address and select the type of equipment you\' are looking for.</p>');
  jQuery("body").on("click", ".review_form_submit", function () {
    var name = jQuery('#review_form_submit_form #name_id').val().length;
    var email = jQuery('#review_form_submit_form #Email4').val().length;
    var states = jQuery('#review_form_submit_form #States').val().length;
    var model = jQuery('#review_form_submit_form #Model').val().length;
    var review = jQuery('#review_form_submit_form #Review').val().length;
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if(name == 0){
      jQuery('#name_id').after('<p class="error">Required field.</p>');
      return false;
    }else{
      jQuery('#name_id').siblings('.error').remove();
    }
    if(email == 0){
      jQuery('#review_form_submit_form #Email4').after('<p class="error">Required field.</p>');
      return false;
    }else{
      jQuery('#review_form_submit_form #Email4').siblings('.error').remove();
    }
    if(states == 0){
      jQuery('#review_form_submit_form #States').after('<p class="error">Required field.</p>');
      return false;
    }else{
      jQuery('#review_form_submit_form #States').siblings('.error').remove();
    }
    if(model == 0){
      jQuery('#review_form_submit_form #Model').after('<p class="error">Required field.</p>');
      return false;
    }else{
      jQuery('#review_form_submit_form #Model').siblings('.error').remove();
    }
    if(review == 0){
      jQuery('#review_form_submit_form #Review').after('<p class="error">Required field.</p>');
      return false;
    }else{
      jQuery('#review_form_submit_form #Review').siblings('.error').remove();
    }
  
    
    jQuery('#review_form_submit_form').trigger('submit');
  });
  jQuery("body").on("click", ".upload_btn", function () {
    jQuery('#upload_files').trigger('click');
  });
  /*jQuery("body").on("click", ".print_specifications", function () {
    html2canvas(jQuery('#view_all_specification')[0], {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 500
                }]
            };
            pdfMake.createPdf(docDefinition).download("specification.pdf");
        }
    });
});*/
  // end download
 
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);

jQuery(".custom-card-main .custom-learn-svg").click(function(){
  
  var content = jQuery(this).siblings('.card-description').html();
  var title = jQuery(this).siblings('.custom-card-text').clone();
  var img_tag  = jQuery(this).parents('.custom-card-text-wrapper').siblings('.custom-card-img').find('img').clone();
  // alert(content);
  // alert(title);
  jQuery('#view_feature .mcontent').html(content);
  jQuery(this).siblings('.custom-card-text').clone().prependTo('#view_feature .mcontent');
  jQuery('#view_feature .mimage').html(img_tag);
  
});

jQuery("body").on("change", "#review_form_submit_form #image_uploads", function () { 
  var filename = jQuery('#review_form_submit_form #image_uploads').val().split('\\').pop();
  jQuery('#review_form_submit_form .upload_btn').siblings('.filename').remove();
  jQuery('#review_form_submit_form .upload_btn').after('<span class="filename">'+filename+'</span>');
});
jQuery("body").on("click", ".product-detail .change_slide", function () {
  var slide = jQuery(this).data('slide');
  imgId = slide;
        slideImage();

});

jQuery("body").on("click", ".brator-manuals .accordion", function () {
  jQuery('.brator-manuals .accordion').removeClass('active');
  jQuery(".brator-manuals .panel").slideUp();

  if(jQuery(this).hasClass('active')){
    
    jQuery(this).removeClass('active');
    jQuery(this).siblings('.panel').slideUp();
  }else{
    jQuery(this).addClass('active');
    
    jQuery(this).siblings('.panel').slideDown();

  }
  
  
 

});
jQuery("body").on("click", ".terms_wrap", function () {
  jQuery(this).find('.form-check-input').toggleClass('checked');
  
});
jQuery("body").on("click", ".stay-connected .wpcf7-submit", function (e) { 
  
  jQuery('.terms_wrap .error').remove();
  if(jQuery('.terms_wrap #flexCheckDefault').is(':checked')){
    jQuery('.stay-connected form').submit();
  }else{
    if(jQuery('.stay-connected input[name=your-name]').val() != '' && jQuery('.stay-connected input[name=your-lastname]').val() != '' && jQuery('.stay-connected input[name=your-email]').val() != '' && jQuery('.stay-connected input[name=your-zip]').val() != ''){
      jQuery('.stay-connected .wpcf7-form-control-wrap .wpcf7-not-valid-tip').remove();
      jQuery('.terms_wrap label').append('<p class="error">Please check term and condition checkbox.</p>');
      e.preventDefault();
    }
    
  }
});

jQuery("body").on("click", ".brator-manuals .panel .sub_categories .c_title", function () {
  jQuery('.brator-manuals .panel .sub_categories .c_title').removeClass('active');

  jQuery(".brator-manuals .panel .sub_categories .c_ul").slideUp();

 
  if(jQuery(this).hasClass('active')){
    jQuery(this).removeClass('active');
    jQuery(this).siblings('.c_ul').slideUp();
  }else{
    jQuery(this).addClass('active');
    
    jQuery(this).siblings('.c_ul').slideDown();

  }

});


  jQuery(".menu-icon").click(function(){
    jQuery(".header-nav").slideToggle();
    
  });
	jQuery(".shop-cat-list  > .sub-cat > svg , .shop-cat-list  > .sub-cat:before").click(function(e){
		
	if(jQuery(this).parents(".sub-cat").hasClass('current')){
				jQuery(this).parents(".sub-cat").removeClass('current');	
				jQuery(this+' > *').parents(".sub-cat").removeClass('current');
		}else{
			jQuery(".sub-cat").removeClass('current');
		   jQuery(this).parents(".sub-cat").addClass('current');
	   }
    
    
  });
	jQuery(".shop-cat-list  .sub-cat .children .sub-cat").click(function(e){
		
	if(jQuery(this).hasClass('current')){

	   	jQuery(this).removeClass('current');
		
	   }else{
		   
		   jQuery(".shop-cat-list  .sub-cat .children .sub-cat").removeClass('current');
		   jQuery(this).addClass('current');
	   }
    
    
  });
// 	jQuery(".shop-cat-list > .sub-cat.current .children .sub-cat").click(function(e){
// 	jQuery(this).addClass('current');
//     jQuery(this).parents('.cat-parent').addClass('current');
    
//   });
	
	
  jQuery(document).on('change','.woocommerce div.product .brator-product-layout-header-content form.cart .variations td select',function(){

    var s_width = jQuery(this).siblings('.select2-container').css('width');

    jQuery(this).siblings('.select2-container').css('width',s_width);
    
  });

  jQuery(".cat-item").hover(
	  function () {
		jQuery(this).find("a").first().css('color', '#ed3333');
	  },
	  function () {
		jQuery(this).find("a").first().css('color', '#666666');
	  }
	);
  
  var temp_title_height = 0;
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-title").each(function(){
    if(jQuery(this).height() > temp_title_height ){
      temp_title_height = jQuery(this).height();
    }
  })
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-title").height(temp_title_height+"px");
   jQuery("a").each(function(){
		if(jQuery(this).attr('href') == window.location.href){
			jQuery(this).parents("li").addClass("current");
		}
	})
  var temp_price_height = 0;
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-price").each(function(){
    if(jQuery(this).height() > temp_price_height ){
      temp_price_height = jQuery(this).height();
    }
  })
	
	jQuery(".quantity-spinner").each(function(){
		if(jQuery(this).attr("max") != ""){
			jQuery(this).attr("size",jQuery(this).attr("max"));
		}
	})
	
  jQuery(".brator-product-single-item-mini").find(".brator-product-single-item-price").height(temp_price_height+"px");

  jQuery(".brator-inline-product-filter-left").appendTo(".brator-inline-product-filter-right");
  var count_html = jQuery(".brator-inline-product-filter-right").find(".woocommerce-result-count").html();
  jQuery(".brator-inline-product-filter-right").find(".woocommerce-result-count").html("Showing " + count_html);
  jQuery(".brator-pagination-box").appendTo(".brator-inline-product-filter-right");
  var brator_custome_html = jQuery('.brator-inline-product-filter-area').clone();
  jQuery(".brator-breadcrumb-area ").prependTo(".brator-inline-product-filter-area");
  jQuery(brator_custome_html).insertAfter(".products");
  jQuery("#advanced-searchform").insertBefore(".brator-sidebar-area");
  jQuery(".brator-breadcrumb-area ").prependTo(".product-detail-page-right");
  jQuery(".woocommerce-ordering").find("select").addClass("select2");
  jQuery(".product-detail-page-right").find(".container-xxxl").removeClass("container-xxxl");
  jQuery(".product-detail-page-right").find(".container-xxl").removeClass("container-xxl");
  jQuery(".product-detail-page-right").find(".variations").find("select").addClass("select2");
  jQuery(".product-detail-page-right").find(".container").removeClass("container");
  jQuery(".brator-product-single-tab-area").find(".col-xxl-8").addClass("col-xxl-12");
  jQuery(".brator-product-single-tab-area").find(".col-xxl-8").removeClass("col-xxl-8");
  jQuery("<h5>VEHICLE PARTS FILTER</h5>").prependTo("#advanced-searchform");
  jQuery(".cart_group").find(".details").prepend("<div class='bundle-side-cart'></div>");
  jQuery(".details").each(function(){
    jQuery(this).find(".bundled_product_title").appendTo(jQuery(this).find(".bundle-side-cart"));
    jQuery(this).find(".cart").appendTo(jQuery(this).find(".bundle-side-cart"));
  })

	jQuery( ".product-categories" ).click(function( event ) {
	  event.stopPropagation();
	  // Do something
	});

	
  jQuery(".recently-view").find(".brator-section-header-title").html("<h2>Related Products</h2>");
  jQuery('.select2').select2();
	
	jQuery(".page-id-2296").find(".brator-blog-post-area").find(".container-xxxl").first().attr("class","");
	jQuery(".page-id-2282").find(".brator-blog-post-area").find(".container-xxxl").first().attr("class","");
	
  // jQuery("#makeyear").change(function(){
    jQuery("#makebrand").prop("disabled", false);
  // })
  // jQuery("#makebrand").change(function(){
    jQuery("#makemodel").prop("disabled", false);
  // })
  // jQuery("#makemodel").change(function(){
    jQuery("#makeengine").prop("disabled", false);
  // })
  // jQuery("#makeengine").change(function(){
    jQuery("#makefueltype").prop("disabled", false);
  // })

  if(getUrlParameter('makeyear') != ""){
    jQuery("#makeyear").val(getUrlParameter('makeyear'));
  }
  if(getUrlParameter('brand') != ""){
    jQuery("#makebrand").val(getUrlParameter('brand'));
  }
  if(getUrlParameter('model') != ""){
    jQuery("#makemodel").val(getUrlParameter('model'));
  }
  if(getUrlParameter('engine') != ""){
    jQuery("#makeengine").val(getUrlParameter('engine'));
  }
  if(getUrlParameter('fueltype') != ""){
    jQuery("#makefueltype").val(getUrlParameter('fueltype'));
  }
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;

  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
  }
  return false;
};


const input = document.querySelector("input");
const preview = document.querySelector(".preview");
const para = document.querySelector(".no-pic");
const image = document.querySelector(".profile-img");
input.addEventListener("change", updateImageDisplay);
function updateImageDisplay() {
  para.style.display = "none";
  const curFiles = input.files;
  image.src = URL.createObjectURL(curFiles[0]);
  image.style.opacity = 1;
}