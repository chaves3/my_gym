$(function(){
	
	var open  = true;
	var windowSize = $(window)[0].innerWidth;

	var targetSizeMenu = (windowSize <= 400) ? 200 : 250;

	if(windowSize <= 768){
		$('.menu').css('width','0').css('padding','0');
		open = false;
	}

	$('.menu-btn').click(function(){
		if(open){
			//O menu está aberto, precisamos fechar e adaptar nosso conteudo geral do painel
			$('.menu').animate({'width':0,'padding':0},function(){
				open = false;
			});
			$('.content,header').css('width','100%');
			$('.content,header').animate({'left':0},function(){
				open = false;
			});
		}else{
			//O menu está fechado
			$('.menu').css('display','block');
			$('.menu').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
				open = true;
			});
			if(windowSize > 768)
				$('.content,header').css('width','calc(100% - 250px)');
				$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
				open = true;
			});
		}
	})

	$(window).resize(function(){
		windowSize = $(window)[0].innerWidth;
		targetSizeMenu = (windowSize <= 400) ? 200 : 250;
		if(windowSize <= 768){
			$('.menu').css('width','0').css('padding','0');
			$('.content,header').css('width','100%').css('left','0');
			open = false;
		}else{
			$('.menu').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
				open = true;
			});

			$('.content,header').css('width','calc(100% - 250px)');
			$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
			open = true;
			});
		}

	});

	$('[actionBtn=delete]').click(function(){
			var txt;
			var r = confirm("Deseja excluir o exercício ?");
			if (r == true) {
			    return true;
			} else {
			    return false;
			}
	});


	$('.btn-cad').click(function(){
		$('.cadastro').css('display', 'block');
		});

 	$('.icn').click(function(){
		$('.cadastro,.cadastro2').fadeOut();
	});
	
	$('.btn-edi').click(function(){
		$('.cadastro2').css('display', 'block');
	});

	$('.cores-btn').click(function(){
		$('.cores-exerc').css('display', 'block');
	});

	$('.icn2').click(function(){
		$('.cores-exerc').fadeOut();
	});

	$('.exercs-cliente').click(function(){
		$('.lista-exercicios-cliente').css('display', 'block');
	});

	$('.icn3').click(function(){
		$('.lista-exercicios-cliente').fadeOut();
	});



	});

