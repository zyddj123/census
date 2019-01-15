<!-- jQuery  -->
<script src="<?php echo $this->getThemesUrl();?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/waves.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/wow.min.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-detectmobile/detect.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/fastclick/fastclick.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery-blockui/jquery.blockUI.js"></script>
<!-- CUSTOM JS -->
<script src="<?php echo $this->getThemesUrl();?>/assets/js/jquery.app.js"></script>
<script>
    var resizefunc = [];
</script>
<script type="text/javascript">
$(function(){
	//计算当前左侧导航栏位置
	var _menu_action="<?php echo $this->session->get('left_menu_action')?>";
	if(!_menu_action) return false;
	$(".list-unstyled li").each(function(i,e){//遍历
		if(e.id==_menu_action){
			$(e).parent().prev().addClass("active subdrop");
			$(e).parent().prev().find('i:eq(1)').removeClass('md-add').addClass("md-remove");
			$(e).parent().show();
			$(e).addClass("active");// 新增css样式
			return false;
		}
	});
	//如果点击别的导航，显示的导航要隐藏
	$(".has_sub").each(function(){
		if($(this).find(".list-unstyled li").length==0) $(this).hide();
	});
});
</script>