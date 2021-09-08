@extends('common.layout')
@section('title','后台首页')
@section('content')
<h2>后台首页</h2>
<div id="chart1" style="width: 400px;height: 400px;float: left"></div>
<div id="chart2" style="width: 800px;height: 400px;float: right"></div>
<script src="/assets/js/jquery-1.7.2.min.js"></script>
<script src="/assets/js/echarts.min.js"></script>
<script>


	var chartDom = document.getElementById('chart1');
	var chartDom1 = document.getElementById('chart2');
	var myChart = echarts.init(chartDom);
	var myChart1 = echarts.init(chartDom1);
	var option;
	var option1;

	option = {
		title: {
			text: '满意度调查',
			left: 'center'
		},
		tooltip: {
			trigger: 'item'
		},
		legend: {
			orient: 'vertical',
			left: 'left',
		},
		series: [
			{
				name: '文献满意度',
				type: 'pie',
				radius: '50%',
				data: [

				],
				emphasis: {
					itemStyle: {
						shadowBlur: 10,
						shadowOffsetX: 0,
						shadowColor: 'rgba(0, 0, 0, 0.5)'
					}
				}
			}
		]
	};

	option1 = {
		title: {
			text: '文明就餐情况调查',
			left: 'center'
		},
		xAxis: {
			type: 'category',
			axisLabel: {
				rotate:10
			},
			data: ['桌子上掉落剩菜剩饭 ', '餐具不放回指定地点回收', '打饭乱插队', '剩菜剩饭太多', '在食堂大吵大闹']
		},
		yAxis: {
			type: 'value'
		},
		series: [{
			data: [
				
			],
			type: 'bar',
			showBackground: true,
			backgroundStyle: {
				color: 'rgba(180, 180, 180, 0.2)'
			}
		}]
	};
	
	myChart.setOption(option);
	myChart1.setOption(option1);

	$.ajax({
		type:'get',
		url:'/adm/show-chart',
		dataType:'json',
		success:function (result){
			myChart.setOption(
				{
					series:{
						data:[
							{value: result['q11'], name: '满意'},
							{value: result['q12'], name: '不满意'}
						]
					}
				}
			)
		},
		error:function (){
			alert('图表请求失败');
			myChart.hideLoading();
		}
	});

	$.ajax({
		type:'get',
		url:'/adm/show-chart',
		dataType:'json',
		success:function (result){
			myChart1.setOption(
				{
					series:{
						data:[
							result['q21'],
							result['q22'],
							result['q23'],
							result['q24'],
							result['q25']
						]
					}
				}
			)
		},
		error:function (){
			alert('图表请求失败');
			myChart1.hideLoading();
		}
	});


</script>
@endsection
