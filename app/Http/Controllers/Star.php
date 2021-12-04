<?php
	function make_star_location($i, $area, $x1, $y1, $shape)
	// 별의 위치 i값, 직전 값 x1과 y1
	// 별의 모양 shape 값, area당 하나씩 지정된다.
	// $area의 값이 바뀌면 별자리 구역이 바뀐다. 450*450 정도가 하나의 구역이다.
	// 구역을 나누는 기준은 줄이며, 1 2 3 4 <br> 4 5 6 8 형식이다.
	{
		$x0 = 100 + ($area % 4) * 450; 
		$y0 = 100 + (($area - ($area % 4)) / 4) * 450;
		// 각 영역의 첫번째 별 위치 설정 
		$degree = 0; 
		$radian = deg2rad($degree);
		$length = 100;
		if($i == 0)
		{
			$shape = mt_rand(1, 9);
			// 첫번째 별일 경우 9가지 종류의 별자리 모양 중 하나를 정한다.
			$x = $x0;
			$y = $y0;
			return array($x, $y, $shape);
			// 첫번재 별일 경우 shape을 지정하기 때문에 이도 출력하여 저장한다.
		}
		// 첫번째 별은 각 구역 당 (100, 100)으로 초기 위치가 고정된다.
		if($i == 1)
		{
			$degree = 10*$shape - mt_rand(3, 7);
			//두번째 별의 위치를 정할 각도를 만든다.
			$radian = deg2rad($degree);
			//degree를 radian으로 변환하여 보기편하게 만든다.
			$x = $x0 + 100*cos($radian);
			$y = $y0 + 100*sin($radian);
			return array($x, $y);
		}
		else
		{
			if($shape == 1)
			//천징자리
			{
				if($i == 2)
				{
					$degree = 145 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 85 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 345 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 30 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 66 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
					
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}
			if($shape == 2)
			//쌍둥이 자리
			{
				if($i == 2)
				{
					$degree = 30 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 150 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 15 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 115 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 80 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 50 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 20 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 7)
				{
					$degree = 20 + mt_rand(-2, 2);
					//여덟번째 별의 위치를 정할 각도를 만든다.
					$length = 200 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 8)
				{
					$degree = 115 + mt_rand(-2, 2);
					//아홉번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}	
			}
			if($shape == 3)
			//처녀 자리
			{
				if($i == 2)
				{
					$degree = 55 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 125 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 325 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 200 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 355 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 66 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 55 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}	
			}
			if($shape == 4)
			//북두칠성
			{
				if($i == 2)
				{
					$degree = 45 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 66 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 40 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 66 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 95 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 35 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 133 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 310 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}
			if($shape == 5)
			//전갈 자리
			{
				if($i == 2)
				{
					$degree = 115 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 200 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 270 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 5 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 160 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 35 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 7)
				{
					$degree = 255 + mt_rand(-2, 2);
					//여덟번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 8)
				{
					$degree = 95 + mt_rand(-2, 2);
					//아홉번째 별의 위치를 정할 각도를 만든다.
					$length = 133 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}		
			}
			if($shape == 6)
			//물고기 자리
			{
				if($i == 2)
				{
					$degree = 35 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 190 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 200 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 66 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 160 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}
			if($shape ==7)
			//사수 자리
			{
				if($i == 2)
				{
					$degree = 350 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 320 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 40 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 80 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 300 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 150 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 7)
				{
					$degree = 105 + mt_rand(-2, 2);
					//여덟번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}		
			if($shape ==8)
			//염소 자리
			{
				if($i == 2)
				{
					$degree = 5 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x0 + $length*cos($radian);
					$y = $y0 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 35 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 330 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 200 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 5)
				{
					$degree = 135 + mt_rand(-2, 2);
					//여섯번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 6)
				{
					$degree = 150 + mt_rand(-2, 2);
					//일곱번째 별의 위치를 정할 각도를 만든다.
					$length = 200 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}
			if($shape ==9)
			//카시오페이아 자리
			{
				if($i == 2)
				{
					$degree = 10 + mt_rand(-2, 2);
					//세번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 3)
				{
					$degree = 85 + mt_rand(-2, 2);
					//네번째 별의 위치를 정할 각도를 만든다.
					$length = 100 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				if($i == 4)
				{
					$degree = 330 + mt_rand(-2, 2);
					//다섯번째 별의 위치를 정할 각도를 만든다.
					$length = 150 + mt_rand(-5, 5);
					//별 사이 거리에 약간의 무작위성을 추가한다.
					$radian = deg2rad($degree);
					$x = $x1 + $length*cos($radian);
					$y = $y1 + $length*sin($radian);
					return array($x, $y);
				}
				else
				{
					$x = mt_rand($x0-50,$x0+300);
					$y = mt_rand($y0-50,$y0+300);
					return array($x, $y);
					//임의의 규칙에 따라 별들의 위치를 설정한다.
				}			
			}	
		}
	}										
?>