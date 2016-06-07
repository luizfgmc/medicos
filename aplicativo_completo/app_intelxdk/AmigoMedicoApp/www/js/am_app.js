
var app = angular.module('amigoMedico',[]); 

	app.config(function ($httpProvider) {
	  $httpProvider.defaults.headers.common = {};
	  $httpProvider.defaults.headers.post = {};
	  $httpProvider.defaults.headers.put = {};
	  $httpProvider.defaults.headers.patch = {};
    $httpProvider.defaults.headers.post['token'] = window.localStorage.getItem("token");

	});
	
	app.factory('restful', function($http, $q) {

		return {
	   	    	
	         getAgendas: function(token) {
	     
				 var config = {headers:{'token': token}};
				
	             var def = $q.defer(); 	

	             $http.get("http://localhost:8000/api/amigomedico/agendas", config).success(function(data) {
                  //$http.get("http://amigomedico.herokuapp.com/api/amigomedico/agendas", config).success(function(data) {
                 
                 
          
                    def.resolve(data);
                })
                .error(function() {
                    def.reject("erro");
                });
           	
           		 return def.promise;

	        },

	         login: function(login, senha) {
	           
               var data = {
                login:login,
                senha:senha
               };
               
	             var def = $q.defer(); 	
                 //$http.post("http://amigomedico.herokuapp.com/api/amigomedico/login", data).success(function(data){
               
                 $http.post("http://localhost:8000/api/amigomedico/login", data).success(function(data) {
               
                    def.resolve(data);
                })
                .error(function() {
                    def.reject("erro");
                });
           	
           		 return def.promise;

	        },
			
			 getConsultas: function(token) {
	          
				 var config = {
                	headers :{'token': token}
                };
				 
	             var def = $q.defer(); 	
            
	               $http.get("http://localhost:8000/api/amigomedico/consultas", config).success(function(data) {
                  //$http.get("http://amigomedico.herokuapp.com/api/amigomedico/consultas", config).success(function(data) {
          
                    def.resolve(data);
                })
                .error(function() {
                    def.reject("erro");
                });
           	
           		 return def.promise;

	        },

	         responderSolicitacaoConsulta: function(token, data) {
	           	
				//var config = {headers:{'token': token}};
                 var def = $q.defer(); 	
                    
	               $http.post("http://localhost:8000/api/amigomedico/responderSolicitacaoConsulta", data).success(function(data) {
                 
                 //$http.post("http://amigomedico.herokuapp.com/api/amigomedico/responderSolicitacaoConsulta", data).success(function(data) {
                 
                 
          
                    def.resolve(data);
                })
                .error(function() {
                    def.reject("erro");
                });
           	
           		 return def.promise;

	        },
            
            getQtdConsultas: function(token, data){
                 
                 var config = {
                	headers :{'token': token}
                 };
				 
                 var def = $q.defer(); 	
                    
	           $http.get("http://localhost:8000/api/amigomedico/qtd_consultas",config, data).success(function(data) {
                 
                 //$http.get("http://amigomedico.herokuapp.com/api/amigomedico/qtd_consultas",config, data).success(function(data) {
                 
                    def.resolve(data);
                })
                .error(function() {
                    def.reject("erro");
                });
           	
           		 return def.promise;

        
            }

      };

	});



app.controller('AmController',['$scope', 'restful',function($scope,restful){
  // location.href= "home.html";
    $scope.logar = function(){
        
        $('#erroLogin').remove();
        
		restful.login($scope.email, $scope.senha).then(function(data){
    		
			if(data != "0"){
                
			  window.localStorage.setItem("token", data[0]);
			  window.localStorage.setItem("email", data[1]);
			  
			  location.href= "home.html";
			
			}else{
				$('#formLogin').after("<p id='erroLogin'>Login ou senha inválido.</p>")
				
			}
		});
        
    };
    
   
 
}]);

app.controller('ConsultaController',['$scope', 'restful',function($scope,restful){
  
  var email = window.localStorage.getItem("email");
  var token = window.localStorage.getItem("token");
  $scope.email = email;
  var idConsulta;
  
    $scope.redirecionaParaAprovacao = function(dadosConsulta){ 
        
        
        var dados = dadosConsulta.data+"-"+dadosConsulta.instituicao+"-"+dadosConsulta.paciente+"-"+dadosConsulta.descricao;
        
        window.localStorage.setItem("arrayConsulta", dados);
        window.location.href = "aprovar_consulta.html?dados="+dadosConsulta.id;
    }
    
    $scope.getConsultas = function(){
		restful.getConsultas(token).then(function(data){
		      
                if($.isArray(data))
                    $scope.consultas = data;
                else    
                    //$("#consultas").html(data);
                    location.href="index.html";
            
  		});
	}
    
    $scope.getQtdConsultas = function(){
        restful.getQtdConsultas(token).then(function(data){
            
            $scope.QtdConsultas = data[0].qtd;
            
        });
    }
    
    
    $scope.getDadosConsulta = function(){
       var dados = window.localStorage.getItem('arrayConsulta');
       var dadosSplit = dados.split("-")
  
         $scope.data = dadosSplit[0];
         $scope.instituicao = dadosSplit[1];
         $scope.paciente = dadosSplit[2];
         $scope.descricao = dadosSplit[3];

    }
    
    $scope.responderSolicitacaoConsulta = function(resposta){
        
        
        $("#aprovar_consulta").html("");
        $("#dadosConsulta").html("");
        $("#respostaSolicitacao").html("");
        $("#respostaSolicitacao").html("Aguarde...");
        
         id = obterIdDaUrl(location.search);
        var data;
        
		if(resposta == 1){

            data = {
		       status:resposta,
		       data:$scope.data,
		       hora:$scope.hora,
		       id:id
		   };
		
		}else{
             data = {
			  status:0,
			  id:id
			};
		}
	   
		restful.responderSolicitacaoConsulta(token, data).then(function(data){
            $("#aprovar_consulta").html("");
            $('#dadosConsulta').html(""); 
            $("#respostaSolicitacao").html("");
            $("#respostaSolicitacao").html("<center>"+data+"</center>");
		});
	       
    
        function obterIdDaUrl(string){
            
            var id = string.substr(string.indexOf("=")+1, string.length);
            return id;
            
            
        }
        
        
    }
  
}]); 


app.controller('AgendaController',['$scope', 'restful',function($scope,restful){
	 	
	 	var token = window.localStorage.getItem("token");
  		$scope.getAgendas = function(){

			 restful.getAgendas(token).then(function(data){
				 
                 if($.isArray(data))
                    $scope.agendas = data;
			     else
                    // $("#agendas").html(data);
                     location.href="index.html";
             });
			
		}
	

 }]);

app.controller('LogOffController', ['$scope', function($scope){
    
    $scope.sair = function(){
        window.localStorage.clear();
        location.href="index.html";
    }
}]);

