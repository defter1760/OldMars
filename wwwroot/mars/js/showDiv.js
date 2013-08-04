	  function ClearForm(){
	  document.getElementById("20599278470161").reset();
	}
	function showDiv1(){		
		document.getElementById('session1').style.display="block";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
		document.getElementById('session11').style.display="none";
		document.getElementById('session12').style.display="none";
	 }

	function showDiv2(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="block";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	function showDiv3(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="block";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv4(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="block";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv5(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="block";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv6(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="block";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv7(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="block";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv8(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="block";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="none";
	 }
	 function showDiv9(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="block";
		document.getElementById('session10').style.display="none";	
	 }
	 function showDiv10(){		
		document.getElementById('session1').style.display="none";
		document.getElementById('session2').style.display="none";
		document.getElementById('session3').style.display="none";
		document.getElementById('session4').style.display="none";
		document.getElementById('session5').style.display="none";
		document.getElementById('session6').style.display="none";
		document.getElementById('session7').style.display="none";
		document.getElementById('session8').style.display="none";
		document.getElementById('session9').style.display="none";
		document.getElementById('session10').style.display="block";
	 }
	 function showPositionExplain(){		
		if (document.getElementById('input_97_6').checked){
			document.getElementById('id_98').style.display="block";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="none";
			}
		else if(document.getElementById('input_97_12').checked){
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="block";
			document.getElementById('id_106').style.display="none";			
			}
		else if(document.getElementById('input_97_11').checked){
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="block";	
			}
		else{
			document.getElementById('id_98').style.display="none";
			document.getElementById('id_99').style.display="none";
			document.getElementById('id_106').style.display="none";
			}
	}
	function whatCity(){	
		if (document.getElementById('input_12').value == "*Other"){
			document.getElementById('id_13').style.display="block";
		}
		else{
			document.getElementById('id_13').style.display="none";
			}
	}
	function waitToLeave(){	
		if (document.getElementById('input_52_3').checked){
			document.getElementById('id_109').style.display="none";
		}
		else{
			document.getElementById('id_109').style.display="block";
			}
	}
	function waitCoWorkers(){
		if (document.getElementById('input_46_1').checked || document.getElementById('input_46_2').checked){
			document.getElementById('id_47').style.display="none";
		}
		else{
			document.getElementById('id_47').style.display="block";
			}
		}
	function showHowPayExplain(){		
		if (document.getElementById('input_15_0').checked){
			document.getElementById('id_110').style.display="block";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";
		}
		else if (document.getElementById('input_15_1').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="block";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";			
		}
		else if (document.getElementById('input_15_2').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="block";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";	
		}
		else if (document.getElementById('input_15_3').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="block";
			document.getElementById('id_114').style.display="none";			
		}
		else if (document.getElementById('input_15_4').checked){
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="block";			
		}
		else{
			document.getElementById('id_110').style.display="none";
			document.getElementById('id_111').style.display="none";
			document.getElementById('id_112').style.display="none";
			document.getElementById('id_113').style.display="none";
			document.getElementById('id_114').style.display="none";
			}
	}
	
	function employed(){
		if (document.getElementById('input_22_1').checked){
			document.getElementById('id_21').style.display="block";
		}
		else{
			document.getElementById('id_21').style.display="none";
			}
		}
	function whyMealBreakExplain(){		
		if (document.getElementById('input_31_0').checked){
			document.getElementById('id_115').style.display="block";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="none";
		}
		else if (document.getElementById('input_31_1').checked){
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="block";
			document.getElementById('id_117').style.display="none";			
		}
		else if (document.getElementById('input_31_2').checked){
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="block";	
		}
		else{
			document.getElementById('id_115').style.display="none";
			document.getElementById('id_116').style.display="none";
			document.getElementById('id_117').style.display="none";
			}
	}
	function whyRestBreakExplain(){		
		if (document.getElementById('input_41_0').checked){
			document.getElementById('id_118').style.display="block";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="none";
		}
		else if (document.getElementById('input_41_1').checked){
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="block";
			document.getElementById('id_120').style.display="none";			
		}
		else if (document.getElementById('input_41_2').checked){
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="block";	
		}
		else{
			document.getElementById('id_118').style.display="none";
			document.getElementById('id_119').style.display="none";
			document.getElementById('id_120').style.display="none";
			}
	}
	function outClockExplain(){		
		if (document.getElementById('input_93_1').checked){
			document.getElementById('id_121').style.display="none";
			document.getElementById('id_57').style.display="none";
		}
		else{
			document.getElementById('id_121').style.display="block";
			document.getElementById('id_57').style.display="block";
			}
	}

	function dutySeatedExplain(){	
		if (document.getElementById('input_76_0').checked){
			document.getElementById('id_122').style.display="block";
			document.getElementById('id_57').style.display="block";
		}
		else{
			document.getElementById('id_122').style.display="none";
			document.getElementById('id_57').style.display="none";
			}
	}
	function seatConseq(){
			if (document.getElementById('input_75_0').checked){
			document.getElementById('id_107').style.display="block";
		}
		else{
			document.getElementById('id_107').style.display="none";
			}
		
		}
	function commisionOwn(){	
		if (document.getElementById('input_95_0').checked || document.getElementById('input_95_2').checked){
			document.getElementById('id_96').style.display="none";
		}
		else{
			document.getElementById('id_96').style.display="block";
			}
	}
	
	
	

