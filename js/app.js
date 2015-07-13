var x2js = new X2JS();
var app = angular.module('rssReader', []);

app.controller("rssfeed", ['$scope','$http', function($scope, $http){

	$scope.currentlink = {"name": "It Programming", "url":"https://www.elance.com/r/rss/jobs/cat-it-programming/sct-web-programming-10224"};
	var lastBuildDate = null;
	var lastguid = null;
	$scope.feedData = new Array();



	var getRssData = function(first)
	{
		$http.get("php/getrssurl.php?url="+$scope.currentlink.url).success(function(data){
			data = x2js.xml_str2json(data);
			console.log(data);
			if(lastBuildDate==null || Date(data.rss.channel.lastBuildDate) > Date(lastBuildDate))
			{
				var items = data.rss.channel.item;
				for(var i=0; i<items.length; i++)
				{
					if(lastguid!=items[i].guid)
					{
						if(i==0)
						{
							lastguid = items[i].guid;
						}
							items[i].read = false;
							if(first==true)
							{$scope.feedData.push(items[i]);}
							else{$scope.feedData.unshift(items[i]);}
					}
					else
					{
						break;
					}
				}
			}
		});
	}

	
	getRssData(true);
	var intervl = setInterval(function(){getRssData(false)},10000);
}]);

app.controller("rsslinks", ['$scope', function($scope){

	$scope.links = [];

	$scope.links[0] = {"name": "It Programming", "url":"https://www.elance.com/r/rss/jobs/cat-it-programming/sct-web-programming-10224"};

}]);




app.filter('to_trusted', ['$sce', function($sce){
        return function(text) {
            return $sce.trustAsHtml(text);
        };
    }]);