function tagifyInputText(inputId, resourceUrl, mapFunction, maxtags) {
  var tagifyInput = new Tagify(
    document.getElementById(inputId), 
    { enforceWhitelist : true, maxTags: maxtags || Infinity }
  );
  
  tagifyInput.settings.dropdown.fuzzySearch = true;

  
  tagifyInput.on('input', function (evt) {
    
    var inputText = evt.detail;
    fetch(resourceUrl + inputText)
    .then(function (response) {
      if(response.ok)
        return response.text();
    })
    .then(function (text) {
      var data =  JSON.parse(text);
      tagifyInput.settings.whitelist = data.map(mapFunction);
    });
  });
  
}

