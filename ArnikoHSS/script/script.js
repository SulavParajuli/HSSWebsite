function loadResult() {
        var resultWhose = document.getElementById("ResultWhose").value;
        var resWhose = resultWhose.toString();
        //console.log(resWhose);
        var request = new Request("result.php?symbol="+resWhose);
        fetch(request).then(function(response) {
            return response.text();
        }).then(function(text) {
            document.getElementById("outputRes").innerHTML = text;
      });
      
      } 