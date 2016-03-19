  var app=angular.module('MyApp',[]);
  app.controller('mainCtrl',function ($scope,$http){ //controller
      
      $scope.submit=function()
      {
        var str2=$scope.pnr;
        var str3=$scope.mobileNo;
       if(str2.length!=10||str3.length!=10)
         {
          alert("Mobile Number and PNR Number should be of 10 Digit");
          return;

         }
         for(i=0;i<10;++i)
           { if(str2[i]<'0'||str2[i]>'9'||str3[i]<'0'||str3[i]>'9')
            {
              alert("Mobile Number and PNR Number should be of Digits");
              break;
              return;
            }
          }
       var inputData={
        "pnr":$scope.pnr,
        "mobileNo":$scope.mobileNo
      };

 			$http.post("bin/inputData.php",inputData)
 			.success(function(data,status){
 				$scope.result=angular.fromJson(data); 
 				if($scope.result.status==1)
 					{		
          var str1="Hi, ";
          str1=str1.concat($scope.mobileNo," .'Your Service is activated for 10 Hour. \nHappy journey!!");
          alert(str1);
					$scope.pnr="";
          $scope.mobileNo="";
 					}
 				else if($scope.result.status==0)
 					{
 					alert("Please Try Again Later.\n Maintenance is going on!");
 					}

 			}).error(function(){
 					alert("Please Try After Some Time");
 			});
      }		
});