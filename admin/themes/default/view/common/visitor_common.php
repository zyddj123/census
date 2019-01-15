<!--其他页面引入该文件 都需要一个get_data()方法-->


<!--bootstrap-datepicker-->
<link type="text/css" href="<?php echo $this->getThemesUrl();?>/assets/js/timepicker/bootstrap-datepicker.min.css" rel="stylesheet"></link>
<div class="col-lg-12">
	<div class="form-group">
		<label class="control-label col-md-1" style="margin-top: 5px;">选择日期</label>
		<div class="col-md-4">
			<div class="input-group input-large custom-date-range" data-date-format="yyyy-mm-dd">
				<input type="text" class="form-control t_start" id="t_start">
				<span class="input-group-addon">-</span>
				<input type="text" class="form-control t_end" id="t_end">
			</div>
		</div>
		<div>
			<input type="button" class="btn btn-default" id="get_data_btn" value="搜索">
		</div>
	</div>
</div>
<br><br><br>
<!--bootstrap-datepicker-->
<script src="<?php echo $this->getThemesUrl();?>/assets/js/timepicker/bootstrap-datepicker2.js"></script>
<script>
	// if(_LANG=="zh-cn"){
		var mes = "无效日期范围，请再试一次";
	// }else if(_LANG=="en"){
		// var mes = "Invalid Date Range, Please Try Again";
	// }
	var d = formatDate(new Date());
	var thirty_d = get_pass_date(new Date(),22);//获取三十天前的日期 
	var lstime = localStorage.getItem('start_time');
	var letime = localStorage.getItem('end_time');
	if(lstime!=null&&letime!=null){
		$('#t_start').val(lstime);
		$('#t_end').val(letime);
	}else{
		$('#t_start').val(thirty_d);
		$('#t_end').val(d);
		localStorage.clear();
	}
	var checkin = $('.t_start').datepicker({
		format:"yyyy-mm-dd",
		onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 1);
			checkout.setValue(newDate);
		}
		checkin.hide();
		$('.t_end')[0].focus();
	}).data('datepicker');
	var checkout = $('.t_end').datepicker({
		format:"yyyy-mm-dd",
		onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		}
	}).on('changeDate', function(ev) {
		checkout.hide();
	}).data('datepicker');
	function check_time(){
		if($('#t_start').val().replace(/-/g,'')>$('#t_end').val().replace(/-/g,'')){
			alert(mes);
			return false;
		}else{
			return true;
		}
	}

	//获取num天前的日期 date: 当前日期即结束日期  num:为多少天之前
	//example get_pass_date(new Date(),30) 获取三十天前的日期
	function get_pass_date(date,num){
		var myDate = date;
		var lw = new Date(myDate - 1000 * 60 * 60 * 24 * num);//最后一个数字30可改，30天的意思
		var lastY = lw.getFullYear();
		var lastM = lw.getMonth()+1;
		var lastD = lw.getDate();
		var startdate=lastY+"-"+(lastM<10 ? "0" + lastM : lastM)+"-"+(lastD<10 ? "0"+ lastD : lastD);
		return startdate;
	}

	//格式化日期
	function formatDate(date) {
		var d = new Date(date),
		month = '' + (d.getMonth() + 1),
		day = '' + d.getDate(),
		year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [year, month, day].join('-');
	}

	//提交事件 执行get_data()方法
	$('#get_data_btn').click(function(){
		if(check_time()){
			localStorage.setItem('start_time',$('#t_start').val());
			localStorage.setItem('end_time',$('#t_end').val());
			get_data($('#t_start').val(),$('#t_end').val());
			// get_data('2018-06-20','2018-08-20');
		}
	});
	

</script>