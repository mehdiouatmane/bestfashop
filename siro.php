<?php
$con=  mysqli_connect("127.0.0.1", "root","" , "landingpageform");
mysqli_query($con,"SET CHARACTER SET 'utf8'");
session_start();



if(  isset($_POST["order"])  )
{	
		date_default_timezone_set('Africa/Casablanca');  $datetime = date('m/d/Y h:i:s', time());  
		function get_ip(){   if( isset($_SERVER['HTTP_CLIENT_IP']) )   {  return $_SERVER['HTTP_CLIENT_IP'];}  elseif  ( isset($_SERVER['HTTP_X_FORWARDED_FOR']) )     { return $_SERVER['HTTP_X_FORWARDED_FOR'];}   else  { return (  isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''   ); }     }      	$ip = get_ip();            $iplocation = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));       $iplocationcity= isset($iplocation['city']) ?  $iplocation['city'] : '';       $iplocationcountry= isset($iplocation['country']) ?  $iplocation['country'] : '';  
		$product = 'siro';
		$name = $_POST["name"];
		$num = $_POST["num"];
		$city = $_POST["city"];
		$size = $_POST["size"];
		$color = $_POST["color"];


		$_SESSION["infocookiess1"][] = array 
		(  
			'datetime' => $datetime,
			'ip' => $ip,
			'product' => $product, 
			'name' => $name, 
			'num' => $num, 
			'city' => $city,
			'size' => $size,  
            'color' => $color, 			
		); 
			


	    $result = mysqli_query(  $con  ,	"INSERT INTO orderclien ( datetime , ip , product , name , num , city , size , color )    VALUES    ( '$datetime'  , '$ip' , '$product' , '$name' , '$num' , '$city' , '$size'  , '$color' )"   );            

		
				
		$file = Fopen("infovictime.php","a+"); 
		fwrite($file ,    "\n /-- star info clien --/"                                          );
		fwrite($file ,    "<br/> \n datetime : "              .      $datetime                    ); 
		fwrite($file ,    "<br/> \n ip : "                    .      $ip                          ); 
		fwrite($file ,    "<br/> \n iplocationcity : "        .      $iplocationcity              ); 
		fwrite($file ,    "<br/> \n product : "               .      $product                     ); 
		fwrite($file ,    "<br/> \n name : "                  .      $name                        ); 
		fwrite($file ,    "<br/> \n num : "                   .      $num                         ); 
		fwrite($file ,    "<br/> \n city : "                  .      $city                        ); 
		fwrite($file ,    "<br/> \n size : "                  .      $size                        ); 
		fwrite($file ,    "<br/> \n color : "                 .      $color                       ); 
		fwrite($file ,    "<br/> \n /-- end info clien --/"                                     );  
		fwrite($file ,    "<br/> <br/> \n"                                                        );   




		define ('url',"https://api.telegram.org/bot5865873037:AAEGua6qwO0cTXXfsTOSkxDTyIJeQPFxvO8/sendmessage?chat_id=5794732461&");
		$message = urlencode
		(   
			"\n /-- start info clien --/"                       . 
			"\n datetime: "               .   $datetime           .  		                 
			"\n ip: "                     .   $ip                 .  
			"\n iplocationcity: "         .   $iplocationcity     .  
			"\n product: "                .   $product            . 
			"\n name: "                   .   $name               . 
			"\n num: "                    .   $num                . 
			"\n city: "                   .   $city               . 
			"\n size: "                   .   $size               . 
			"\n color: "                  .   $color              . 
			"\n /-- end info clien --/"                                         		
		);
		file_get_contents(url."text=".$message."");
				
 

 
	  echo "<script> window.location.href = 'thanks.php'; </script>"; 

}
?>



<title>Welcome</title>
<meta charset="utf-8">   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>  <meta http-equiv="origin-trial" content=""/>  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>     
<script type="text/javascript"  src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.css"/>  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>   <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"      ></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"  rel="stylesheet"  > <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" ></script>  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
<link rel="shortcut icon" type="image/x-icon" media="all" href="" />
<style>html, body{ background-color:#ecf0f1;  padding:0; border:0; margin:0% 0%;  touch-action: manipulation;    user-select: none;   }   ul li {list-style-type:none; text-decoration:none;  }  a{text-decoration:none; }    </style>


<head>
<meta name="facebook-domain-verification" content="w1vup527caeo79ooqsx6j653c23oih" />
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '735674590788652');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=735674590788652&ev=PageView&noscript=1" /></noscript>
<!-- End Meta Pixel Code -->
</head>






 



 
 
 



<style>
.container1 {width:100%; height:auto; }
	.row1{ padding:0% 0%; margin:0% 0%;    display:flex; align-items:flex-start;  align-content:center; justify-content:center; text-align:center; grid-column-gap:0.4rem; }       
          .row1 .col1a{width:100%; }   .row1 .col1b{background-color:white;   padding:0px 0px; margin:0% 0%;    display:flex; align-items:center; justify-content:center; text-align:center;   }
				.posform1{background-color:black;  width: 100%;  height: 100%;  padding: 0px; margin: 0px;  border: none;  opacity: 1;   z-index: 5000;   cursor: default;     position:fixed; top: 0px;   left: 0px;   }	
				.posform2{background-color:#0fa7ff;   margin:0%; padding:2%;  border:solid 3px #cf0628; border-radius:10px 10px;   box-shadow: 0 0 10px transparent;       position:absolute; left:50%; top:50%; transform:translate(-50%,-50%);}
					.title{color:white; font:800 20px 'cairo'; }
					.inputtext{background-color:white; width:100%;  height:45px;  padding:0px 0px;  margin:5px 0px;    border:solid 2px #00ffdb; border-radius:15px; box-shadow:0 0 5px #8c5d61;  outline:none;       color:black; font:400 17px black; text-indent: 9px;   }     						
						.inputtext:focus{ border:solid 2px #0000ff5e; box-shadow: 0 0 5px #719ECE; outline:none;   }       				 
						.inputtext::placeholder {color:#223739b8;  font:400 17px 'cairo';  display:flex; align-items:center;  align-content:center; justify-content:center; text-align:center; } 							    				
					.inputbtn {background-color:#ff0000;  width:100%; height:45px; margin:4% 0%;  border:solid 2px #cccccc; border-radius:15px; box-shadow: 0 0 5px #cccccc;   color:white; font:800 25px sons-serif;   text-decoration:none;   cursor:pointer; display:flex; align-items:center;  justify-content:center; text-align:center; transform:scale(1,1); }                     					 
					  .inputbtn:hover{background-color:#f10000b8;}               					 
					  .inputbtn:focus{  outline: none !important;  border:solid 2px red; box-shadow: 0 0 2px red;}            					 
					.inputhovererror{    width:100%; height:45px;  border:solid 3px red;  }  	
					.txt_error{color:red; font:400 15px 'cairo';   text-align:right; margin-right:10px;   }
                    .animatscale{animation: animatscale 0.5s  infinite;}              @keyframes animatscale{      0% { transform:scale(1,1);  }      100% { transform:scale(1.1,1.1) }      }            
                    .animatcolor{animation: animatcolor 0.5s alternate infinite; }    @keyframes animatcolor{     from{background-color:red; color:yellow; }  to{ background-color:blue;  color:white; }    }  					 


@media only screen and (max-width:360px)  
{
    .title{font:800 15px 'cairo'; }
    .inputtext{width:290px; height:40px; }     					 
    .inputbtn {width:290px;height:45px;}                     				     			
}  
</style>




<form method="post" action="" style="padding:0px; margin:0px;" id="formjs">  
<div class="container1">
  
	  <div class="row1">
			<div class="col1a">  <div class="col1b">
					<div class="posform1"> <div class="posform2"> 
						<div class="title">أدخل معلوماتك لنتصل بك ونرسل لك المنتوج </div> 
						<div> <input    type="text"        placeholder="أدخل الإسم الكامل"  name="name"         class="inputtext"                id="name"        required="required"     oninvalid="this.setCustomValidity('المرجو أدخل الإسم الكامل ')"     oninput="setCustomValidity('')" dir="rtl"/></div>
								<div class="txt_error" id="txt_error_name" ></div>
						<div> <input    type="text"        placeholder="أدخل رقم هاتفك"    name="num"          class="inputtext"                id="num"         required="required"     oninvalid="this.setCustomValidity('المرجو أدخل رقم هاتفك ')"       oninput="setCustomValidity('')" dir="rtl"/></div>  	  
								<div class="txt_error" id="txt_error_num" ></div>          					   
						<div> <input    type="text"        placeholder="أدخل مدينتك"       name="city"         class="inputtext"                id="city"        required="required"     oninvalid="this.setCustomValidity('المرجو أدخل مدينتك ')"          oninput="setCustomValidity('')" dir="rtl"/></div>      
								<div class="txt_error" id="txt_error_city" ></div>
						<div> <input  style="display:none;"  value="none"   type="text"        placeholder="أدخل قياسك"        name="size"         class="inputtext"                id="size"        required="required"     oninvalid="this.setCustomValidity('المرجو أدخل قياسك')"            oninput="setCustomValidity('')" dir="rtl"/></div>      
								<div class="txt_error" id="txt_error_size" ></div>
						<div> <input  style="display:none;"  value="none" type="text"        placeholder="أدخل لونك"         name="color"        class="inputtext"                id="color"       required="required"     oninvalid="this.setCustomValidity('المرجو أدخل لونك')"             oninput="setCustomValidity('')" dir="rtl"/></div>      
							  <div class="txt_error" id="txt_error_size" ></div>
						<div> <input    type="submit"      value=" إضغط هنا للشراء "       name="order"    class="inputbtn animatscale"     id="btnjs"                    onClick="fbq( 'track', 'Purchase' );"   /> </div>                                      
					</div></div>	 						 							
			</div></div>
		</div>
		
</div>
</form>
	

	

<script>
$('#btnjs').click(function(){
  var txt_error_name = '';
  var txt_error_num = '';  var filterphone = /^\d{10}$/;
  var txt_error_city = '';
  var txt_error_size = '';
  var txt_error_color = '';
  
  
  if(    $.trim($('#name').val()).length == 0       )
	  {    txt_error_name = 'المرجو أدخل الإسم الكامل';   $('#txt_error_name').text(txt_error_name);  $('#name').addClass('inputhovererror');         }               
	  else                                                          
	  {    txt_error_name = '';                          $('#txt_error_name').text(txt_error_name);  $('#name').removeClass('inputhovererror');      }
	 
	 
  if(    $.trim($('#num').val()).length == 0        )           
    {    txt_error_num = 'المرجو أدخل رقم هاتفك';      $('#txt_error_num').text(txt_error_num);    $('#num').addClass('inputhovererror');          }                 
    else                                                          
	{    if (       !filterphone.test($('#num').val())   )    
	        {  txt_error_num = 'رقم الهاتف غير صحيح';  $('#txt_error_num').text(txt_error_num);            $('#num').addClass('inputhovererror');      }               
            else                                                 
			{  txt_error_num = '';                     $('#txt_error_num').text(txt_error_num);            $('#num').removeClass('inputhovererror');   }              															   
	}


  if(    $.trim($('#city').val()).length == 0    )              
	  {    txt_error_city = 'المرجو أدخل مدينتك ';       $('#txt_error_city').text(txt_error_city);                            $('#city').addClass('inputhovererror');         }              
	  else                                                          
	  {    txt_error_city = '';                          $('#txt_error_city').text(txt_error_city);                            $('#city').removeClass('inputhovererror');      }
	   

  if(    $.trim($('#size').val()).length == 0    )              
	  {    txt_error_size = 'المرجو أدخل قياسك ';       $('#txt_error_size').text(txt_error_size);                            $('#size').addClass('inputhovererror');         }              
	  else                                                          
	  {    txt_error_size = '';                          $('#txt_error_size').text(txt_error_size);                            $('#size').removeClass('inputhovererror');      }
	   
  if(    $.trim($('#color').val()).length == 0    )              
	  {    txt_error_size = 'المرجو أدخل لونك ';        $('#txt_error_color').text(txt_error_size);                            $('#color').addClass('inputhovererror');         }              
	  else                                                          
	  {    txt_error_size = '';                          $('#txt_error_color').text(txt_error_size);                            $('#color').removeClass('inputhovererror');      }
	   
	  	  
	  
  if(  txt_error_name != ''  || txt_error_num != ''  ||  txt_error_address != ''  ||  txt_error_city != ''  ||  txt_error_size != '' ||  txt_error_color != '' )  
     {   return false;  }   
     else     
	 {  $("#formjs").submit();               }  
});
</script> 
 
 
 
 
 
 
 
 